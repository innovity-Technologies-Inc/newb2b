<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.structures.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="main_content">
        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="login_wrap row">
                            <div class="padding_eight_all bg-white col-xl-6 col-md-6">
                                <img src="<?php echo e(asset('frontend/assets/images/login.jpg')); ?>" alt="login">
                            </div>
                            <div class="padding_eight_all bg-white col-xl-6 col-md-6">
                                <div class="heading_s1">
                                    <h3>Login</h3>
                                </div>
                                <div class="">
                                    <?php $__errorArgs = ['fcm_token'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="badge badge-danger"><?php echo e($message); ?></small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <form action="<?php echo e(route('login.store')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group mb-3">
                                        <input type="text" required class="form-control" name="username"
                                               placeholder="Your Username">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control" required type="password" name="password"
                                               placeholder="Password" id="loginPasswordInput">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-check-input" type="checkbox" id="showPasswordCheck">
                                        <label class="form-check-label" for="showPasswordCheck">Show Password</label>
                                    </div>

                                    <input type="hidden" name="fcm_token" id="fcm_token">

                                    <div class="login_footer form-group mb-3">
                                        

                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in
                                        </button>
                                    </div>
                                </form>
                                <div class="form-note text-center">Don't Have an Account? <a
                                        href="<?php echo e(route('registration')); ?>">Sign up now</a></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    
    <!-- Compat (v8-style API) version to avoid Modular SDK issues -->
    <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging-compat.js"></script>


    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyDpyz07yb81sAJlZgWY-9KkF6-R9-8brM8",
            authDomain: "b2b-ecommerce-30f6a.firebaseapp.com",
            projectId: "b2b-ecommerce-30f6a",
            messagingSenderId: "464746571964",
            appId: "1:464746571964:web:484200847c66ae2f7d88b9",
        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        // ✅ Directly read Laravel session in Blade
        const hasSecondLayerToken = <?php echo e(session()->has('second_layer_token') ? 'true' : 'false'); ?>;

        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/firebase-messaging-sw.js')
                .then((registration) => {
                    console.log('✅ Service Worker registered');
                    toastr.options.timeOut = 3000;
                    toastr.error("Please Allow Notification");
                    var audio = new Audio('audio/audio.wav');
                    audio.play();
                    Notification.requestPermission().then((permission) => {
                        if (permission === 'granted') {
                            messaging.getToken({
                                vapidKey: "BDRVh0jqyxngwwOeNsvWFv9YcB05ONgUzpICjY1cIuCYcF04q2ppQH4uOrNpN3hd6Y5YbrhImmJ6qPIpuRMvOCA",
                                serviceWorkerRegistration: registration
                            }).then((currentToken) => {
                                if (currentToken) {
                                    console.log("✅ FCM Token:", currentToken);
                                    document.getElementById("fcm_token").value = currentToken;
                                } else {
                                    console.warn("⚠️ No FCM token available");
                                    toastr.options.timeOut = 3000;
                                    toastr.error("Please Allow Notification");
                                    var audio = new Audio('audio/audio.wav');
                                    audio.play();
                                }
                            }).catch((err) => {
                                console.error("❌ Error getting FCM token:", err);
                                toastr.options.timeOut = 3000;
                                toastr.error("Please Allow Notification");
                                var audio = new Audio('audio/audio.wav');
                                audio.play();
                            });
                        } else {
                            console.warn("⚠️ Notification permission denied");
                            toastr.options.timeOut = 3000;
                            toastr.error("Please Allow Notification");
                            var audio = new Audio('audio/audio.wav');
                            audio.play();
                        }
                    });

                    // ✅ Show notification only if session has the token
                    messaging.onMessage((payload) => {
                        console.log("📨 Foreground message received:", payload);

                        if (hasSecondLayerToken) {
                            const title = payload.notification?.title || 'Notification';
                            const body = payload.notification?.body || '';
                            const type = payload.data?.type || 'info';

                            toastr.options = {
                                timeOut: 3000,
                                escapeHtml: false,
                                closeButton: true,
                                progressBar: true
                            };
                            toastr[type](`<strong>${title}</strong><br>${body}`);

                            const audio = new Audio('/audio/audio.wav');
                            audio.play();
                        } else {
                            console.log('🚫 Session second_layer_token missing → No notification shown.');
                        }
                    });

                }).catch((err) => {
                console.error("❌ Service Worker registration failed:", err);
            });
        }
    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\authentication\login.blade.php ENDPATH**/ ?>