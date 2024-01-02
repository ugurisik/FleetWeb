<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title><?= $this->lang->get('login_page.title') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?= $this->lang->get('site_description') ?>" name="description" />
    <meta content="<?= $this->lang->get('site_author') ?>" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= ASSET_PATH ?>/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="<?= ASSET_PATH ?>/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= ASSET_PATH ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= ASSET_PATH ?>/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= ASSET_PATH ?>/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= ASSET_PATH ?>/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="<?= SITE_URL ?>" class="d-inline-block auth-logo">
                                    <img src="<?= ASSET_PATH ?>/images/safarifleet.png" alt="" height="45">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium"><?= $this->lang->get('login_page.subtitle') ?>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary"><?= $this->lang->get('login_page.welcome') ?></h5>
                                    <p class="text-muted"><?= $this->lang->get('login_page.welcome_sub') ?></p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form name="formData">

                                        <div class="mb-3">
                                            <label for="username" class="form-label"><?= $this->lang->get('login_page.username') ?></label>
                                            <input type="text" class="form-control" name="username" placeholder="<?= $this->lang->get('login_page.username_placeholder') ?>">
                                        </div>

                                        <div class="mb-3">
                                            <!-- <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                            </div> -->
                                            <label class="form-label" for="password-input"><?= $this->lang->get('login_page.password') ?></label>
                                            <input type="password" class="form-control pe-5 password-input" placeholder="<?= $this->lang->get('login_page.password_placeholder') ?>" name="password">
                                        </div>

                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div> -->

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="button" onclick="login()"><?= $this->lang->get('login_page.login') ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="auth-signup-basic.html" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                        </div> -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy; 2016 -
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Design & Developed <i class="mdi mdi-heart text-danger"></i> by Safari GPS
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= ASSET_PATH ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= ASSET_PATH ?>/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= ASSET_PATH ?>/libs/node-waves/waves.min.js"></script>
    <script src="<?= ASSET_PATH ?>/libs/feather-icons/feather.min.js"></script>
    <script src="<?= ASSET_PATH ?>/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= ASSET_PATH ?>/js/plugins.js"></script>

    <!-- particles js -->
    <script src="<?= ASSET_PATH ?>/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="<?= ASSET_PATH ?>/js/pages/particles.app.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function login() {
        var formData = $('form[name="formData"]').serializeArray();
        $.ajax({
            type: "POST",
            url: "<?= SITE_URL ?>/login",
            data: formData,
            success: function(response) {
                var obj = JSON.parse(response)
                if (obj.type == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: '<?= $this->lang->get('alert.success') ?>',
                        text: obj.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href = "<?= SITE_URL ?>/fleet";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: '<?= $this->lang->get('alert.error') ?>',
                        text: obj.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
    }
</script>


</html>