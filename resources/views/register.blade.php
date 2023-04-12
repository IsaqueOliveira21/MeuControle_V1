<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>MC - Registrar</title>

    <meta name="description"
          content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/dashmix.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
</head>
<body>
<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url( {{ asset('assets/media/photos/balance.png') }} );">
            <div class="row g-0 justify-content-center bg-xsmooth-dark-op">
                <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                    <!-- Sign Up Block -->
                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div
                            class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
                            <!-- Header -->
                            <div class="mb-2 text-center">
                                <a class="link-fx fw-bold fs-1" href="{{ route('user.login') }}">
                                    <span class="text-dark">Meu</span><span class="text-xsmooth">Controle</span>
                                </a>
                                <p class="text-uppercase fw-bold fs-sm text-muted">Criar Conta</p>
                            </div>
                            <!-- END Header -->

                            <!-- Sign Up Form -->
                            <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signup" action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" id="nome"
                                               name="nome" placeholder="Nome">
                                        <span class="input-group-text">
                          <i class="fa fa-user-circle"></i>
                        </span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="input-group input-group-lg">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email">
                                        <span class="input-group-text">
                          <i class="fa fa-envelope-open"></i>
                        </span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="input-group input-group-lg">
                                        <input type="password" class="form-control" id="password"
                                               name="password" placeholder="Senha">
                                        <span class="input-group-text">
                          <i class="fa fa-asterisk"></i>
                        </span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="input-group input-group-lg">
                                        <input type="password" class="form-control" id="passwordConfirm"
                                               name="passwordConfirm" placeholder="Confirmar Senha">
                                        <span class="input-group-text">
                          <i class="fa fa-asterisk"></i>
                        </span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="input-group input-group-lg">
                                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="00/00/0000">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="d-sm-flex justify-content-sm-between align-items-sm-center mb-4 bg-body rounded py-2 px-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="signup-terms"
                                               name="signup-terms">
                                        <label class="form-check-label" for="signup-terms">Aceitar Termos</label>
                                    </div>
                                    <div class="fw-semibold fs-sm py-1">
                                        <a class="fw-semibold fs-sm text-xsmooth" href="#" data-bs-toggle="modal"
                                           data-bs-target="#modal-terms">Termos &amp; Condições</a>
                                    </div>
                                </div>
                                <div class="text-center mb-4">
                                    <button type="submit" class="btn btn-hero btn-lg bg-xpro-lighter">
                                        <i class="fa fa-fw fa-plus opacity-50 me-1"></i> REGISTRAR
                                    </button>
                                </div>
                                @if(isset($mensagem))
                                    <div class="alert alert-danger" role="alert">
                                        <p class="mb-0">{{$mensagem}}</p>
                                    </div>
                                @endif
                            </form>
                            <!-- END Sign Up Form -->
                        </div>
                    </div>
                </div>
                <!-- END Sign Up Block -->
            </div>

            <!-- Terms Modal -->
            <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-xpro-lighter">
                                <h3 class="block-title text-xsmooth">Termos &amp; Condições</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                            aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad
                                    feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante
                                    convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan
                                    adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames
                                    aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo
                                    turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis
                                    congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi
                                    viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                                <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad
                                    feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante
                                    convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan
                                    adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames
                                    aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo
                                    turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis
                                    congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi
                                    viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                            </div>
                            <div class="block-content block-content-full text-end bg-body ">
                                <button type="button" class="btn btn-sm btn-lg bg-xpro-lighter" data-bs-dismiss="modal">Entendido
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Terms Modal -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<!--
  Dashmix JS

  Core libraries and functionality
  webpack is putting everything together at assets/_js/main/app.js
-->
<script src="assets/js/dashmix.app.min.js"></script>

<!-- jQuery (required for jQuery Validation plugin) -->
<script src="assets/js/lib/jquery.min.js"></script>

<!-- Page JS Plugins -->
<script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script src="assets/js/pages/op_auth_signup.min.js"></script>
</body>
</html>
