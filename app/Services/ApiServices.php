<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class ApiServices
{
//    protected string $baseUrl = 'http://erp.paysenzhost.xyz/apiv2';
    protected string $baseUrl = 'https://erp.gen-itech.com/apiv2';

    protected string $username = 'webuser';
    protected string $password = 'PayPass2025';
    protected string $text_token = 'test-token';

    public function login()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl . '/login', [
            'username' => $this->username,
            'password' => $this->password,
        ]);


        Log::info('Login Response Status: ' . $response->status());
        Log::info('Login Response Body: ' . $response->body());


        try {
            if ($response->successful()) {
                $data = $response->json();
                Cache::put('inventory_access_token', $data['data']['access_token'], now()->addMinutes(60));
                Cache::put('inventory_refresh_token', $data['data']['refresh_token'], now()->addMinutes(60));
                Log::info('Login Successful');
                return $data['data']['access_token'];
            }
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
        }

        throw new Exception('Login Failed');

    }

    public function refresh_token()
    {
        $refresh_token = Cache::get('inventory_refresh_token');

        $response = Http::post($this->baseUrl . '/refresh_token', [
            'refresh_token' => $refresh_token,
        ]);

        try {
            if ($response->successful()) {
                $data = $response->json();
                Cache::put('inventory_access_token', $data['data']['access_token'], now()->addMinutes(60));
                Log::info('Token Refreshed Successful');
                return $data['data']['access_token'];
            }
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
        }
        return $this->login();
    }

    protected function getAccessToken()
    {
        $token = Cache::get('inventory_access_token');
        return $token ?? $this->login();
    }

    public function secondLayerLogin($request){
        $token = $this->getAccessToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl . '/second_layer_login', [
            'username' => $request->username,
            'password' => $request->password,
            'fcm_token' => $request->fcm_token,
        ]);
        Log::info($request);
        Log::info('Login Response Status: ' . $response->status());
        Log::info('Login Response Body: ' . $response->body());

        $data = $response->json();

        return $data;
    }

    public function getSecondLayerToken(){
        $secondLayerToken = session()->get('second_layer_token');
        return $secondLayerToken;
    }

    public function customer_insert($request){
        $token = $this->getAccessToken();
        $file = $request->file('sales_permit');

        $http = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);


        $form_input = [
            [
                'name' => 'customer_name',
                'contents' => $request->customer_name,
            ],
            [
                'name' => 'email',
                'contents' => $request->email,
            ],
            [
                'name' => 'mobile',
                'contents' => $request->mobile,
            ],
            [
                'name' => 'fax',
                'contents' => $request->fax,
            ],
            [
                'name' => 'address',
                'contents' => $request->address,
            ],
            [
                'name' => 'address2',
                'contents' => $request->address2,
            ],
            [
                'name' => 'city',
                'contents' => $request->city,
            ],
            [
                'name' => 'state',
                'contents' => $request->state,
            ],
            [
                'name' => 'zip',
                'contents' => $request->zip,
            ],
            [
                'name' => 'country',
                'contents' => $request->country,
            ],

            [
                'name' => 'sales_permit_number',
                'contents' => $request->sales_permit_number,
            ],
            [
                'name' => 'password',
                'contents' => $request->password,
            ]
        ];

        if ($file) {
            $form_input[] = [
                'name' => 'sales_permit',
                'contents' => file_get_contents($file),
                'filename' => $file->getClientOriginalName()
            ];
        }

        Log::info('Form Input'. print_r($form_input, true));
        $response = $http->asMultipart()->post($this->baseUrl . '/insert_customer', $form_input);

        Log::info('Registration Response Status: ' . $response->status());
        Log::info('Registration Response Body: ' . $response->body());

        $data = $response->json();
        return $data;
    }

    public function getProfile(){
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
            'Content-Type' => 'application/json',
        ])->get($this->baseUrl . '/get_profile');
        Log::info('Login Response Status: ' . $response->status());
        Log::info('Login Response Body: ' . $response->body());

        if ($response->successful()) {
            $data = $response->json();
            $profile = (object)$data['data']['customer'];
//            dd($profile);
            $commission = (object)$data['data']['commission'];
//            dd($commission);
            session()->put('customer_name', $profile->customer_name);
            session()->put('email', $profile->email_address);
            session()->put('address', $profile->customer_address);
            session()->put('address2', $profile->address2);

            session()->put('commission', $commission->commision_value);
            session()->put('commission_type', $commission->comission_type);

            return $profile;
        }
        else{
            Log::info('Login Response Status: ' . $response->status());
            Log::info('Login Response Body: ' . $response->body());
            return (object)[
                'error_msg' => 'Login Expired'
            ];
        }

    }


    public function updateProfile($request){

        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $file = $request->file('sales_permit');

        $http = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
        ]);


        $form_input = [
            [
                'name' => 'customer_name',
                'contents' => $request->customer_name,
            ],
            [
                'name' => 'email_address',
                'contents' => $request->email_address,
            ],
            [
                'name' => 'contact',
                'contents' => $request->contact,
            ],
            [
                'name' => 'phone',
                'contents' => $request->phone,
            ],
            [
                'name' => 'fax',
                'contents' => $request->fax,
            ],
            [
                'name' => 'address',
                'contents' => $request->address,
            ],
            [
                'name' => 'address2',
                'contents' => $request->address2,
            ],
            [
                'name' => 'city',
                'contents' => $request->city,
            ],
            [
                'name' => 'state',
                'contents' => $request->state,
            ],
            [
                'name' => 'zip',
                'contents' => $request->zip,
            ],
            [
                'name' => 'country',
                'contents' => $request->country,
            ],

            [
                'name' => 'sales_permit_number',
                'contents' => $request->sales_permit_number,
            ],
        ];

        if ($file) {
            $form_input[] = [
                'name' => 'sales_permit',
                'contents' => file_get_contents($file),
                'filename' => $file->getClientOriginalName()
            ];
        }

        Log::info('Form Input'. print_r($form_input, true));
        $response = $http->asMultipart()->post($this->baseUrl . '/profile_update', $form_input);

        Log::info('Registration Response Status: ' . $response->status());
        Log::info('Registration Response Body: ' . $response->body());

        $data = $response->json();
        return $data;
    }



    public function secondLayerLogout(){
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
        ])->get($this->baseUrl . '/second_layer_logout');
    }

    public function deleteProfile(){
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $profile = $this->getProfile();
        $customer_email = $profile->customer_email;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
        ])->get($this->baseUrl . '/delete_customer', [
            "customer_email" => $customer_email
        ]);

        if ($response->successful()) {
            Log::info('Registration Response Status: ' . $response->status());
            Log::info('Registration Response Body: ' . $response->body());
            $data = $response->json();
            return [
                'success_msg' => $data,
            ];
        }else{
            Log::info('Registration Response Status: ' . $response->status());
            Log::info('Registration Response Body: ' . $response->body());
            $error_msg = 'Failed to delete profile';
            return [
                'error_msg' => $error_msg,
            ];
        }
    }

    public function changePassword($request){
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl . '/customer_password_change', [
            'old_password' => $request->old_password,
            'new_password' => $request->new_password,
        ]);
        $data = $response->json();
        return $data;
    }

    public function getPaymentMethods(){
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
        ])->get($this->baseUrl . '/get_payment_methods');
        return $response->json();
    }

    public function checkout($request){
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $file = $request->file('payment_ref_doc');
//        dd($file);

        $http = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
        ]);


        $form_input = [
            [
                'name' => 'cart_id',
                'contents' => $request->cart_id,
            ],
            [
                'name' => 'payment_ref',
                'contents' => $request->payment_ref,
            ],
        ];

        $grand_total = $request->input('grand_total');
        $paid_amount = $request->input('paid_amount');
        if ($grand_total > $paid_amount){
            $form_input[] = [
                'name' => 'payment_type',
                'contents' => '0',
            ];
        }else{
            $form_input[] = [
                'name' => 'payment_type',
                'contents' => $request->payment_type,
            ];
        }

        $form_input[] = [
            'name' => 'paid_amount',
            'contents' => $request->paid_amount,
        ];


        if ($file) {
            $form_input[] = [
                'name' => 'payment_ref_doc',
                'contents' => file_get_contents($file),
                'filename' => $file->getClientOriginalName()
            ];
        }

//        dd($form_input);

        Log::info('Form Input'. print_r($form_input, true));
        $response = $http->asMultipart()->post($this->baseUrl . '/check_out', $form_input);

        Log::info('Registration Response Status: ' . $response->status());
        Log::info('Registration Response Body: ' . $response->body());

        $data = $response->json();
//        dd($data);
        return $data;
    }

    public function getCategories()
    {
        $token = $this->getAccessToken();
        Log::info('Access Token: ' . $token);
        Log::info('Get Categories......');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($this->baseUrl . '/category_list');

        if ($response->unauthorized()) {
            Log::info('Access Unauthorized');
            Log::info('Starting New Token Generation...');
            $token = $this->refresh_token();
            Log::info('New Access Token: ' . $token);

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])->get($this->baseUrl . '/category_list');
            Log::info($response->body());
        }
        Log::info($response->body());
        return $response->json();
    }

//    make a tree structure, where sub-category is child of parent category and child category is
//    child of sub category
    public function getFormattedCategoryTree()
    {
        // Fetch categories from the ERP API
        Log::info('Fetch Categories.....');
        $categories = $this->getCategories(); // This calls your existing API method
        $rawCategories = $categories['response']['categories'];
        Log::info('Categories List \n'.print_r($rawCategories, true));

        // Create a map of all categories by ID for quick parent-child access
        $categoryMap = [];
        foreach ($rawCategories as $category) {
            $categoryMap[$category['category_id']] = $category;
        }


        $tree = [];

        Log::info('Generating Category Tree');
        // Loop through all categories
        foreach ($rawCategories as $category) {
            // Only process root categories (those with no parent_id)
            if ($category['parent_id'] === null) {
                // Build the full nested tree from this root node
                $tree[] = $this->buildCategoryNode($category, $categoryMap);
            }
        }

        return $tree;
    }

// Recursive function to build child nodes
    private function buildCategoryNode($category, $categoryMap)
    {
        Log::info('Building Category Node');
        $node = [
            'id' => $category['category_id'],
            'name' => $this->getFormattedName($category['category_name']),
            'parent_id' => $category['parent_id'],
            'children' => [],
        ];

        // Find and process all children of this category
        foreach ($categoryMap as $child) {
            if ($child['parent_id'] === $category['category_id']) {
                $node['children'][] = $this->buildCategoryNode($child, $categoryMap);
            }
        }

        return $node;
    }

// Extract only the last part of "Frozen Food->Beef->Small(1.5kg)"
    private function getFormattedName($rawName)
    {
        Log::info('Formating Category Name');
        $parts = explode('->', $rawName);
        return trim(end($parts));
    }


    public function getProducts()
    {
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        Log::info('Access Token: ' . $token);
        Log::info('Second Layer Token: ' . $secondLayerToken);
        Log::info('Get Products......');

        if(!empty($secondLayerToken)){
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'X-Second-Token' => $secondLayerToken,
            ])->get($this->baseUrl . '/product_list');
        }else{
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])->get($this->baseUrl . '/product_list');
        }

        if ($response->unauthorized()) {
            Log::info('Access Unauthorized');
            Log::info('Starting New Token Generation...');
            $token = $this->refresh_token();
            Log::info('New Access Token: ' . $token);
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => $token,
            ])->get($this->baseUrl . '/product_list');
            Log::info($response->body());
        }
        Log::info($response->body());
        return $response->json();
    }

    //find category from category list by category_id
    public function getFilteredCategory($categoryId)
    {
        $categories = $this->getCategories();
        $rawCategories = $categories['response']['categories'];

        Log::info('Filtering Category....');

        $filtered_category = array_filter($rawCategories, function ($item) use ($categoryId) {
            return $item['category_id'] == $categoryId;
        });

        return $filtered_category;
    }

    //find children of the selected category
    public function findCategoryChildren($categoryId)
    {
        Log::info('Finding Category Children....');
        $tree = $this->getFormattedCategoryTree();
        $result = [];
        $this->searchAndCollectChildren($tree, $categoryId, $result);
        return $result;
    }

    private function searchAndCollectChildren($nodes, $categoryId, &$result)
    {
        Log::info('Collecting Category Children');
        foreach ($nodes as $node) {
            if ($node['id'] == $categoryId) {
                $this->buildChildrenList($node, $result);
                return true;
            }
            if (!empty($node['children'])) {
                if ($this->searchAndCollectChildren($node['children'], $categoryId, $result)) {
                    return true;
                }
            }
        }
        return false;
    }

    //build an array of all categories related to the selected category_id
    private function buildChildrenList($node, &$result)
    {
        Log::info('Building Category Children');
        if (!isset($node['children']) || !is_array($node['children'])) {
            return;
        }

        foreach ($node['children'] as $child) {
            $result[] = [
                'id' => $child['id'],
                'name' => $child['name'],
            ];

            if (!empty($child['children'])) {
                $this->buildChildrenList($child, $result);
            }
        }
    }

    //find category details of all category from category list api
    public function findChildCategoryDetails($categoryIDs)
    {
        Log::info('Finding Category Children Details');
        $categories = $this->getCategories();
        $rawCategories = $categories['response']['categories'];
        $categoryDetails = [];
        foreach ($categoryIDs as $categoryID) {
            $category = array_filter($rawCategories, function ($item) use ($categoryID) {
                return $item['category_id'] == $categoryID;
            });
            $categoryDetails = array_merge($categoryDetails, $category);
        }
        return $categoryDetails;

    }

    //find products by category
    public function findProductsByCategory($categoryIDs)
    {
        Log::info('Finding Products By Category');
        $products = $this->getProducts();
        $rawProducts = $products['response']['product_list'];
        $filteredProducts = [];
        foreach ($categoryIDs as $categoryID) {
            $products = array_filter($rawProducts, function ($product) use ($categoryID) {
                return $product['category_id'] == $categoryID;
            });
            $filteredProducts = array_merge($filteredProducts, $products);
        }
        return $filteredProducts;
    }

    private function productSearching($formData){
        Log::info('Product Searching....');

        $params =  [];

        if(!empty($formData->id)){
            $params['category_id'] = $formData->id;
        }

        if(!empty($formData->search_keyword)){
            $params['product_name'] = $formData->search_keyword;
        }

        if(!empty($formData->product_id)){
            $params['product_id'] = $formData->product_id;
        }

        if(!empty($formData->page)){
            $params['page'] = $formData->page;
        }

        if(!empty($formData->limit)){
            $params['limit'] = $formData->limit;
        }

        if(!empty($formData->min_price) && !empty($formData->max_price)){
            $params['min_price'] = $formData->min_price;
            $params['max_price'] = $formData->max_price;
        }

        $tokenExpire = session()->get('second_layer_token_expire_at');

        if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire) && Cache::has('warehouse')){
            $params['warehouse_id'] = Cache::get('warehouse');
        }

//        dd($params);
        /*if(!empty($secondLayerToken)){
            $params['limit'] = $formData->limit;
        }*/



        Log::info('Parameters: ' . print_r($params, true));

        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();

        Log::info('Access Token: ' . $token);
        Log::info('Second Layer Token: ' . $secondLayerToken);
        Log::info('Get Products......');

        if(!empty($secondLayerToken)){
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'X-Second-Token' => $secondLayerToken,
            ])->post($this->baseUrl . '/product_search', $params);
        }else{
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])->post($this->baseUrl . '/product_search', $params);
        }

        if ($response->unauthorized()) {
            Log::info('Access Unauthorized');
            Log::info('Starting New Token Generation...');
            $token = $this->refresh_token();
            Log::info('New Access Token: ' . $token);

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])->get($this->baseUrl . '/product_search', $params);
            Log::info($response->body());
        }
        Log::info($response->body());
        return $response->json();

    }

    private function sorting($collection, $filter){
        Log::info('Product Sorting');
        switch ($filter['sort']) {
            case 'oldest' :
                Log::info('Sorting by Oldest');
                $collection = $collection->sortBy('id');
                break;
            case 'latest' :
                Log::info('Sorting by Latest');
                $collection = $collection->sortByDesc('id');
                break;
            case 'price-asc' :
                Log::info('Sorting by Price Ascending');
                $collection = $collection->sortBy('price');
                break;
            case 'price-desc' :
                Log::info('Sorting by Price Descending');
                $collection = $collection->sortByDesc('price');
                break;
        }
        return $collection;
    }


    public function getProductsByCategory($formData,$filter)
    {
        $level_3_category = $this->getFilteredCategory($formData->id);
        Log::info('Products Searching Initialize.....');
        $search_result = $this->productSearching($formData);
//            dd($search_result);
        $collection = collect($search_result['response']['product_list']);
        Log::info('Searched Products:\n'.$collection);
        if(isset($search_result['response']['page_count'])){
            $page_count = ($search_result['response']['page_count']);
        }else{
            $page_count = 0;
        }

//            dd($page_count);

        if(!empty($filter['sort'])){
            $collection = $this->sorting($collection, $filter);
            Log::info('Sorted Products:\n'.$collection);
        }

        return [
            'final_products' => $collection,
            'level_3_category' => array_values($level_3_category) ?? Null,
            'category_id' => $formData->id,
            'page_count' => $page_count,
        ];

    }

    private function findProductsByID($id){
        Log::info('Finding Products.......');
        $products = $this->getProducts();
        $rawProducts = $products['response']['product_list'];
        $desired_product = array_filter($rawProducts, function ($item) use ($id) {
            return isset($id) && $item['id'] == $id;
        });
        Log::info('Desired Products:\n'.print_r($desired_product, true));
        return $desired_product;
    }

    public function getProductDetails($formData){
        Log::info('Fetching Product Details....');
        $product_result = $this->productSearching($formData);
        Log::info('Product Details:\n'.print_r($product_result, true));
        $productArray = $product_result['response']['product_list'][0];
        $productDetails = (object)$productArray;

        return $productDetails;
    }

    public function getRelatedProducts(){
        Log::info('Product List Api Accessing....');
        $products = $this->productSearching(null);
//        dd($products);
        $rawProducts = $products['response']['product_list'];
        $related_products = collect($rawProducts)->random(4);
        Log::info('Related Products:\n'.print_r($related_products, true));
        return $related_products;

    }

    public function addToCart($request){
        Log::info('Adding To Cart.....');
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $warehouse_data = $request->warehouse_data;
//        dd($warehouse_data);
        $splitting_parts = explode('!', $warehouse_data);
//        dd($splitting_parts);
        $warehouse_id = $splitting_parts[0];
        $batch_id = $splitting_parts[1];
        $cartItems = [
            [
                'product_id' => $request->product_id,
                'batch_id' => $batch_id,
                'warehouse_id' => $warehouse_id,
                'quantity' => $request->quantity,
            ]
        ];
//        dd($cartItems);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl . '/insert_cart', [
            'cart_items' => $cartItems,
        ]);

        if($response->successful()){
            $data = $response->json();
//            dd($response->body());
            Log::info($response->body());
            return $data;
        }else{
            Log::info($response->body());
//            dd($response->body());
            $data = [
                'error_msg' => "Failed to add to Cart.",
            ];
            return $data;
        }
    }

    public function getCartItems(){
        Log::info('Getting Cart Items....');
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
        ])->get($this->baseUrl . '/cart_list');
        if($response->successful()){
            Log::info('Successfully retrieved Cart Items.');
//            dd($response->body());
            $data = $response->json();
            $cart_items_count = collect($data['cart_items'])->count();
            session()->put('cart_items_count', $cart_items_count);
//            dd($cart_items_count);
            return $response->json();
        }
    }

    public function updateCartItems($request){
        Log::info('Updating Cart Items....');
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl . '/cart_update', [
            'cart_id' => $request->cart_id,
            'quantity' => $request->quantity,
            'note' => 'Increase quantity due to extra demand'
        ]);
//        dd($response->status());
        if($response->successful()){
            Log::info('Successfully updated Cart Items.');
            $data = $response->json();
            return $data;
        }else{
            $data = $response->json();
            Log::info($data['message']);
            $data = [
                'error_msg' => 'Unexpected error while updating Cart Items.',
            ];
            return $data;
        }
    }

    public function removeFromCart($request){
        Log::info('Removing Cart Items....');
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl . '/remove_cart_item_by_id', [
            'cart_id' => $request->cart_id,
        ]);

        if($response->successful()){
            Log::info($response->body());
            $data = $response->json();
            return $data;
        }else{
            $data = $response->json();
            Log::info($data['message']);
            $data = [
                'error_msg' => 'Unexpected error while Removing Cart Item',
            ];
            return $data;
        }
    }

    public function getWarehouses(){
        Log::info('Getting Warehouses....');
            $token = $this->getAccessToken();
            $secondLayerToken = $this->getSecondLayerToken();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'X-Second-Token' => $secondLayerToken,
                'Content-Type' => 'application/json',
            ])->get($this->baseUrl . '/warehouse_list');
            $data = $response->json();
            return $data;
    }

    public function contactStore($request){
        $token = $this->getAccessToken();
        $form_input = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            ];
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post($this->baseUrl . '/insert_contact', $form_input);
        $data = $response->json();

        if($response->successful()){
            Log::info($response->body());
            $data = [
                'status' => "success",
                'data' => $data,
            ];
            return $data;

        }else{
            Log::info($response->body());
            $data = [
                'status' => "error",
                'data' => $data,
            ];
            return $data;
        }
    }

    public function getInvoiceList(){
        Log::info('Getting Invoice List...');
        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
        ])->get($this->baseUrl . '/invoice_list');
        if($response->successful()){
            Log::info($response->body());
            $data = $response->json();
//            dd($data);
            $data = [
                'status' => "success",
                'data' => $data,
            ];
            return $data;
        }else{
            Log::info($response->body());
            $data = $response->json();
            $data = [
                'status' => "error",
                'data' => $data,
            ];
            return $data;
        }
    }

    public function getInvoiceDetails($invoice_id){
        Log::info('Getting Invoice Details....');

        $token = $this->getAccessToken();
        $secondLayerToken = $this->getSecondLayerToken();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'X-Second-Token' => $secondLayerToken,
        ])->get($this->baseUrl . '/invoice_details', [
            'invoice_id' => $invoice_id,
        ]);
        if($response->successful()){
            Log::info($response->body());
            $data = $response->json();
//            dd($data);
            return [
                'status' => "success",
                'data' => $data,
            ];
        }else{
            Log::info($response->body());
            $data = $response->json();
            return [
                'status' => "error",
                'data' => $data,
            ];
        }
    }

}
