<?php

namespace App\Http\Controllers;

use App\Services\ApiServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ErpController extends Controller
{
    protected $erp;

    public function __construct(ApiServices $erp)
    {
        $this->erp = $erp;
    }

    public function showCategories()
    {
        $categories = $this->erp->getFormattedCategoryTree();
        return response()->json($categories);
    }


    public function homepage()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();
        return view('frontend.homepage', compact('categoryTree', 'warehouse_lists'));

    }

    public function getFormData(Request $request)
    {
        $id = $request->id;
        Log::info('Category ID:' . $id);

        $product_id = $request->product_id;
        Log::info('Product ID:' . $product_id);

        $page = $request->page;
        Log::info('Page No:' . $page);

        $limit = 9;
        Log::info('Page Limit:' . $limit);

        $min_price = $request->min_price;
        Log::info('min_price:' . $min_price);

        $max_price = $request->max_price;
        Log::info('max_price:' . $max_price);

        $search_keyword = $request->search_keyword;
        Log::info('search_keyword:' . $search_keyword);

        return (object)[
            'id' => $id,
            'product_id' => $product_id,
            'page' => $page,
            'limit' => $limit,
            'min_price' => $min_price,
            'max_price' => $max_price,
            'search_keyword' => $search_keyword
        ];
    }

    public function showProductsByCategory(Request $request)
    {
        $tokenExpire = session()->get('second_layer_token_expire_at');
        if (session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)) {
            $this->erp->getCartItems();
        }
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();

        Log::info('Category Tree:\n' . print_r($categoryTree, true));

        $formData = $this->getFormData($request);

        $filter = [
            'sort' => $request->sort,
        ];
        Log::info('filter input:' . print_r($filter, true));
        $product_data = $this->erp->getProductsByCategory($formData, $filter);
//        dd($product_data);
        Log::info('Final Product Data:' . print_r($product_data, true));
        if (isset($product_data['final_products'][0]['price'])) {
            $is_price = true;
        } else {
            $is_price = false;
        }
        $title = $product_data['level_3_category'][0]['category_name'] ?? null;
        $pages = $product_data['page_count'];
        Log::info('Pages:' . $pages);
        return view('frontend.productsByCategory',
            compact('product_data', 'categoryTree', 'title', 'formData', 'pages', 'is_price', 'warehouse_lists'));
    }

    public function showProducts(Request $request)
    {
        $tokenExpire = session()->get('second_layer_token_expire_at');
        if (session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)) {
            $this->erp->getCartItems();
        }
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();

        Log::info('Category Tree:\n' . print_r($categoryTree, true));

        $formData = $this->getFormData($request);

        $filter = [
            'sort' => $request->sort,
        ];
        Log::info('filter input:' . print_r($filter, true));
        $product_data = $this->erp->getProductsByCategory($formData, $filter);

//        dd($product_data);
        Log::info('Final Product Data:' . print_r($product_data, true));
        if (isset($product_data['final_products'][0]['price'])) {
            $is_price = true;
        } else {
            $is_price = false;
        }
        $title = 'Products';
        $pages = $product_data['page_count'];
        Log::info('Pages:' . $pages);
        return view('frontend.productsByCategory',
            compact('product_data', 'categoryTree', 'title', 'formData', 'pages', 'is_price', 'warehouse_lists'));
    }


    public function showProductDetails(Request $request)
    {
        $tokenExpire = session()->get('second_layer_token_expire_at');
        if (session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)) {
            $this->erp->getCartItems();
        }
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();

        $formData = $this->getFormData($request);
        $product = $this->erp->getProductDetails($formData);
//        dd($product);
        $title = $product->category_name;
        $subtitle = $product->product_name;
        $related_products = $this->erp->getRelatedProducts();
        return view('frontend.product_details',
            compact('categoryTree', 'product', 'title', 'subtitle', 'related_products', 'warehouse_lists'));
    }

    public function add_to_cart(Request $request)
    {
        $request->validate([
            'warehouse_data' => 'required',
        ], [
            'warehouse_data' => 'Please select a warehouse',
        ]);

        $data = $this->erp->addToCart($request);

        if (isset($data['error_msg'])) {
            return redirect()->back()->with([
                'message' => $data['error_msg'],
                'alert-type' => 'error'
            ]);
        } else {
            if ($data['status'] == 'token-error') {
                return redirect()->route('login')->with([
                    'message' => 'Login Expired',
                    'alert-type' => 'error'
                ]);
            } elseif ($data['status'] == 'error') {
                return redirect()->back()->with([
                    'message' => 'Failed to insert cart',
                    'alert-type' => 'error'
                ]);
            } else {
                return redirect()->back()->with([
                    'message' => 'Added to Cart',
                    'alert-type' => 'success'
                ]);
            }
        }
    }

    public function showCart()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();
        $data = $this->erp->getCartItems();
//        dd($data);
        if ($data['status'] == '2nd-token-error') {
            return redirect()->route('login')->with([
                'message' => 'Login Expired',
                'alert-type' => 'error'
            ]);
        } elseif ($data['status'] == 'token-error') {
            return redirect()->route('login')->with([
                'message' => 'Login Expired',
                'alert-type' => 'error'
            ]);
        } else {
            $cart_items = collect($data['cart_items']);
//            dd($cart_items);
            $title = 'Cart';
            return view('frontend.cart', compact('cart_items', 'title', 'categoryTree', 'warehouse_lists'));
        }

    }

    public function update_cart(Request $request)
    {
        Log::info('Updating Cart Items....');
//        dd($request->all());
        $data = $this->erp->updateCartItems($request);
//        dd($data);
        if (isset($data['error_msg'])) {
            return redirect()->back()->with([
                'message' => $data['error_msg'],
                'alert-type' => 'error'
            ]);
        } else {
            if ($data['status'] == 'token-error') {
                return redirect()->route('login')->with([
                    'message' => 'Login Expired',
                    'alert-type' => 'error'
                ]);
            } elseif ($data['status'] == 'error') {
                return redirect()->back()->with([
                    'message' => 'Failed to update cart',
                    'alert-type' => 'error'
                ]);
            } else {
                return redirect()->back()->with([
                    'message' => 'Cart Updated Successfully',
                    'alert-type' => 'success'
                ]);
            }
        }

    }

    public function delete_cart(Request $request)
    {
        Log::info('Deleting Cart Items....');
        $data = $this->erp->removeFromCart($request);
        //        dd($data);
        if (isset($data['error_msg'])) {
            return redirect()->back()->with([
                'message' => $data['error_msg'],
                'alert-type' => 'error'
            ]);
        } else {
            if ($data['status'] == 'token-error') {
                return redirect()->route('login')->with([
                    'message' => 'Login Expired',
                    'alert-type' => 'error'
                ]);
            } elseif ($data['status'] == 'error') {
                return redirect()->back()->with([
                    'message' => 'Failed to Remove cart Item',
                    'alert-type' => 'error'
                ]);
            } else {
                return redirect()->back()->with([
                    'message' => 'Removed from Cart Successfully',
                    'alert-type' => 'success'
                ]);
            }
        }
    }

    public function checkout_form(Request $request)
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();

        $cart_ids = $request->input('cart_ids');
//        dd($cart_ids);
        $sub_total = $request->input('sub_total');
        $discount = $request->input('discount');
        $grand_total = $request->input('grand_total');

        $data = $this->erp->getCartItems();

        if ($data['status'] == '2nd-token-error') {
            return redirect()->route('login')->with([
                'message' => 'Login Expired',
                'alert-type' => 'error'
            ]);
        } elseif ($data['status'] == 'token-error') {
            return redirect()->route('login')->with([
                'message' => 'Login Expired',
                'alert-type' => 'error'
            ]);
        } else {
            $cart_items = collect($data['cart_items']);
//            dd($cart_items);
            $payment_methods = $this->erp->getPaymentMethods();
//            dd($payment_methods);
            $filteredMethods = collect($payment_methods['payment_methods'])->slice(3)->values()->all();
//        dd($filteredMethods);
            $title = 'Checkout Form';
            return view('frontend.checkout_form', compact('cart_ids', 'grand_total', 'cart_items', 'title', 'discount', 'sub_total', 'categoryTree', 'filteredMethods', 'warehouse_lists'));
        }

    }

    public function place_order(Request $request)
    {
//        dd($request->all());
        $data = $this->erp->checkout($request);
        if ($data['status'] == 'error') {
            return redirect()->route('login')->with([
                'message' => 'Login Expired',
                'alert-type' => 'error'
            ]);
        } else {
            return redirect()->route('order_complete')->with([
                'message' => 'Order Placed Successfully',
                'alert-type' => 'success'
            ]);
        }
    }

    public function order_complete()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();
        $this->erp->getCartItems();

        $title = 'Order Placed';
        return view('frontend.order_complete', compact('title', 'categoryTree', 'warehouse_lists'));
    }

    public function vision_mission_values()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();

        $title = 'Vision, Mission & Values';
        return view('frontend.vision_mission_values', compact('title', 'categoryTree', 'warehouse_lists'));
    }

    public function about_us()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();

        $title = 'About Us';
        return view('frontend.about_us', compact('title', 'categoryTree', 'warehouse_lists'));
    }

    public function contact()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();

        $title = 'Contact Us';
        return view('frontend.contact', compact('title', 'categoryTree', 'warehouse_lists'));
    }


    public function login_form()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $title = 'Login';
        return view('frontend.authentication.login', compact('title', 'categoryTree'));
    }

    public function login_store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
//            'fcm_token' => 'required'
        ]);
//        $this->erp->getProfile();
        $data = $this->erp->secondLayerLogin($request);
//        $email = $request->username;
//        $this->erp->getCommission($email);
        if ($data['status'] == 'success') {
            $second_layer_token = $data['data']['second_layer_token'];
            // dd($second_layer_token);
            session()->put('second_layer_token', $second_layer_token);
            session()->put('second_layer_token_expire_at', now()->addMinutes(50));

            $this->erp->getProfile();
            return redirect()->route('user.dashboard')->with([
                'message' => 'Login Successful',
                'alert-type' => 'success'
            ]);
        } elseif ($data['status'] == 'error') {
            return redirect()->route('login')->with([
                'message' => $data['message'] . 'Login Failed. Please try again',
                'alert-type' => 'error'
            ]);
        } else {
            return redirect()->route('login')->with([
                'message' => $data['message'] . 'Login Failed. Please try again',
                'alert-type' => 'error'
            ]);
        }
    }

    public function registration_form()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $title = 'Registration';
        return view('frontend.authentication.registration', compact('title', 'categoryTree'));
    }

    public function registration_store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|min:3|regex:/^[A-Za-z\s]+$/',
            'mobile' => 'required|regex:/^1[2-9][0-9]{9}$/',
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[!@#$%^&*(),.?":{}|<>]/',  // At least one special character
            ],
            'terms' => 'accepted'
        ],
            [
                'customer_name.required' => 'Please enter your name',
                'customer_name.min' => 'Your name must be at least 3 characters long',
                'customer_name.regex' => 'Your Name can only contain letters',
                'password.regex' => 'Please enter at least one special character',
                'mobile.required' => 'Please enter your mobile number',
                'mobile.regex' => 'Please enter a valid USA mobile number with country code and area code without + symbol',
                'email.required' => 'Please enter your email address',
                'password.min' => 'Please enter at least 8 characters',
                'mobile.digits_between' => 'Please enter only digits between 3 and 17 characters',
                'terms.accepted' => 'please accept terms and conditions',
            ], [
                'customer_name' => 'Full Name',
                'mobile' => 'Mobile No',
                'email' => 'Email Address',
                'password' => 'Password',
            ]);

        $data = $this->erp->customer_insert($request);
        if (isset($data['status']) && $data['status'] === 'error') {
            return redirect()->back()->with([
                'error_message' => $data['message'],
                'message' => 'Registration Failed. Please try again',
                'alert-type' => 'error'
            ]);
        } else {
            return redirect()->route('registration.complete')->with([
                'message' => 'Registration Successful',
                'alert-type' => 'success'
            ]);
        }
    }

    public function dashboard()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();

        $this->erp->getProfile();
        $this->erp->getCartItems();
        $title = 'User Dashboard';
        return view('frontend.user_dashboard', compact('title', 'categoryTree', 'warehouse_lists'));
    }

    public function logout()
    {
        session()->forget('second_layer_token');
        session()->forget('customer_name');
        session()->forget('commission');
        session()->forget('commission_type');

        Log::info('Second Layer Token Logout');
        return redirect()->route('homepage')->with([
            'message' => 'Logout Successful',
            'alert-type' => 'success'
        ]);
    }

    public function customer_profile()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();

        $title = 'Dashboard';
        $subtitle = 'Manage Profile';
        Log::info('Retrieving Profile.......');
        $profile = $this->erp->getProfile();
        if (isset($profile->error_msg)) {
            return redirect()->route('login')->with([
                'message' => $profile->error_msg,
                'alert-type' => 'error'
            ]);
        }
        return view('frontend.manage_profile', compact('categoryTree', 'title', 'profile', 'subtitle', 'warehouse_lists'));
    }

    public function profile_update(Request $request)
    {
        $data = $this->erp->updateProfile($request);
        return redirect()->back()->with([
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function change_password()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();
        $title = 'Change Password';
        return view('frontend.change_password', compact('title', 'categoryTree', 'warehouse_lists'));
    }

    public function password_update(Request $request)
    {
        $data = $this->erp->changePassword($request);
        if ($data['status'] === 'success') {
            return redirect()->route('user.change_password')->with([
                'message' => $data['message'],
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->route('user.change_password')->with([
                'message' => $data['message'],
                'alert-type' => 'error'
            ]);
        }
    }

    public function registration_complete()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();
        $title = 'Registration';
        return view('frontend.authentication.registration_complete', compact('title', 'categoryTree', 'warehouse_lists'));
    }

    public function customer_delete()
    {
        $data = $this->erp->deleteProfile();
        if (isset($data['error_msg'])) {
            return redirect()->back()->with([
                'message' => $data['error_msg'],
                'alert-type' => 'error'
            ]);
        } else {
            $this->erp->secondLayerLogout();
            session()->forget('second_layer_token');
            return redirect()->route('homepage')->with([
                'message' => 'Customer Deleted Successfully',
                'alert-type' => 'success'
            ]);
        }

    }

    public function warehouse_store(Request $request)
    {
        $request->validate([
            'warehouse' => 'required',
        ], [
            'warehouse' => 'Please select a warehouse',
        ]);
        $warehouse_data = $request->warehouse;
        if (isset($warehouse_data)) {
//            dd('data_set');
            $splitting_parts = explode('!', $warehouse_data);
            $warehouse_id = $splitting_parts[0];
            $warehouse_name = $splitting_parts[1];
            Cache::put('warehouse', $warehouse_id, null);
            Cache::put('warehouse_name', $warehouse_name, null);
            return redirect()->route('products')->with([
                'message' => 'Warehouse Saved Successfully',
                'alert-type' => 'success'
            ]);
        } else {
//            dd('nothing');
            if (Cache::has('warehouse')) {
                Cache::forget('warehouse');
                Cache::forget('warehouse_name');
                Cache::put('warehouse_skip', true, null);
            }
            return redirect()->route('products')->with([
                'message' => 'Skipped Warehouse Selection',
                'alert-type' => 'success'
            ]);
        }
    }

    public function warehouse_list()
    {
        $data = $this->erp->getWarehouses();

        if ($data['status'] == 'success') {
            $warehouses = $data['warehouses'];
//                dd($warehouses);
            return $warehouses;
        } else {
            $warehouses = [];
            return $warehouses;
        }
    }

    public function contact_message_store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $data = $this->erp->contactStore($request);
//        dd($data);
        if ($data['status'] === 'success') {
            return redirect()->back()->with([
                'message' => $data['data']['response']['message'],
                'alert-type' => 'success'
            ]);
        } elseif ($data['status'] === 'error') {
            return redirect()->back()->with([
                'message' => $data['data']['message'],
                'alert-type' => 'error'
            ]);
        }
    }

    public function purchase_history()
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();

        $this->erp->getCartItems();
        $title = 'Purchase History';

        $data = $this->erp->getInvoiceList();
//        dd($data);
        if ($data['status'] === 'success') {
            if ($data['data']['status'] === 'success') {
                $invoice_lists = $data['data']['data'];
//                dd($invoice_lists);
                return view('frontend.purchase_history', compact('title', 'categoryTree', 'warehouse_lists', 'invoice_lists'));
            } else {
                return redirect()->back()->with([
                    'message' => 'Failed to fetched Purchase History. Try Again',
                    'alert-type' => 'error'
                ]);
            }

        } elseif ($data['status'] === 'error') {
            return redirect()->back()->with([
                'message' => 'Failed to fetched Purchase History. Try Again',
                'alert-type' => 'error'
            ]);
        }
    }

    public function invoice_details($invoice_id)
    {
        $categoryTree = $this->erp->getFormattedCategoryTree();
        $warehouse_lists = $this->warehouse_list();
        $this->erp->getCartItems();
        $title = 'Purchase History';
        $subtitle = 'Invoice #' . $invoice_id;
        $data = $this->erp->getInvoiceDetails($invoice_id);
        if ($data['status'] === 'success') {
            if ($data['data']['status'] === 'success') {
                $invoice_details = $data['data']['details'];
//                dd($invoice_details);
                return view('frontend.invoice_details', compact('title', 'subtitle', 'categoryTree', 'warehouse_lists', 'invoice_details'));
            } else {
                return redirect()->back()->with([
                    'message' => 'Failed to fetched Invoice Details. Try Again',
                    'alert-type' => 'error'
                ]);
            }

        } elseif ($data['status'] === 'error') {
            return redirect()->back()->with([
                'message' => 'Failed to fetched Invoice Details. Try Again',
                'alert-type' => 'error'
            ]);
        }

    }

}
