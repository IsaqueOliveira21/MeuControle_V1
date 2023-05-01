
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>MeuControle</title>

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="Isaque">
    <meta name="robots" content="noindex, nofollow">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/dashmix.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/xdream.min.css') }}">


    <!-- END Stylesheets -->
</head>
<body>
<div id="page-loader" class="show bg-xsmooth"></div>
<div id="page-container" class="sidebar-o side-scroll page-header-fixed page-header-dark main-content-boxed">
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header (mini Sidebar mode) -->
        <div class="smini-visible-block">
            <div class="content-header bg-header-dark">
                <!-- Logo -->
                <a class="fw-semibold text-white tracking-wide" href="#">
                    D<span class="opacity-75">x</span>
                </a>
                <!-- END Logo -->
            </div>
        </div>
        <!-- END Side Header (mini Sidebar mode) -->

        <!-- Side Header (normal Sidebar mode) -->
        <div class="smini-hidden">
            <div class="content-header justify-content-lg-center bg-header-dark">
                <!-- Logo -->
                <a class="fw-semibold text-white tracking-wide" href="index.html">
                    Meu<span class="opacity-75">Controle</span>
                    <span class="fw-normal">Finanças</span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div class="d-lg-none">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times-circle"></i>
                    </button>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
        </div>
        <!-- END Side Header (normal Sidebar mode) -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side Actions -->
            <div class="content-side content-side-full text-center bg-body-light">
                <div class="smini-hide">
                    <img class="img-avatar" src="{{ !isset(\Illuminate\Support\Facades\Auth::user()->photo) ? asset('assets/media/avatars/avatar10.jpg') : asset('/storage/fotos/'.\Illuminate\Support\Facades\Auth::user()->photo) }}" alt="">
                    <div class="mt-3 fw-semibold">{{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                </div>
            </div>
            <!-- END Side Actions -->

            <!-- Side Navigation -->
            <div class="content-side">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ Route('user.dashboard') }}">
                            <i class="nav-main-link-icon fa fa-rocket"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Financeiro</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-piggy-bank"></i>
                            <span class="nav-main-link-name">Contas</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ Route('conta.index') }}">
                                    <span class="nav-main-link-name">Ver</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-money-bill"></i>
                            <span class="nav-main-link-name">Movimentações</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ Route('movimentacoes.index') }}">
                                    <span class="nav-main-link-name">Ver</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ Route('movimentacoes.recorrentes') }}">
                                    <span class="nav-main-link-name">Recorrentes</span>
                                    <span class="nav-main-link-badge badge rounded-pill bg-primary">{{ \App\Models\Movimentacao::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->where('recorrencia', '<>', 'NAO RECORRENTE')->count() }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-heading">SOCIAL</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ Route('amigos.index') }}">
                            <i class="nav-main-link-icon fa fa-user-circle"></i>
                            <span class="nav-main-link-name">Amigos</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div>
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-stream fa-flip-horizontal"></i>
                </button>
                <!-- END Toggle Sidebar -->

            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <!-- Notifications Dropdown
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-fw fa-flag"></i>
                        <span class="badge bg-success rounded-pill">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                        <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                            Notifications
                        </div>
                        <ul class="nav-items my-2">
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-fw fa-coins text-danger"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">You’ve made a payment of $49 to Adobe Inc.</div>
                                        <div class="text-muted">5 min ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-fw fa-coins text-danger"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">Recurring payment of $29 to Dropbox was successful.</div>
                                        <div class="text-muted">30 min ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-fw fa-coins text-success"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">Incoming payment of <strong>$499</strong> from John Taylor!</div>
                                        <div class="text-muted">2 hrs ago</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="p-2 border-top text-center">
                            <a class="btn btn-alt-primary w-100" href="javascript:void(0)">
                                <i class="fa fa-fw fa-eye opacity-50 me-1"></i> View All
                            </a>
                        </div>
                    </div>
                </div>
                 END Notifications Dropdown -->

                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-fw fa-user-circle"></i>
                        <i class="fa fa-fw fa-angle-down d-none opacity-50 d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                            <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ !isset(\Illuminate\Support\Facades\Auth::user()->photo) ? asset('assets/media/avatars/avatar10.jpg') : asset('/storage/fotos/'.\Illuminate\Support\Facades\Auth::user()->photo) }}" alt="">
                            <div class="pt-2">
                                <a class="text-white fw-semibold" href="#">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                            </div>
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item" href="{{ Route('user.perfil') }}">
                                <i class="fa fa-fw fa-cog me-1"></i> Configurações
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ Route('user.logout') }}">
                                <i class="fa fa-fw fa-arrow-alt-circle-left me-1"></i> Sair
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-dark">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <h2 class="content-heading">
                <i class="text-muted me-1"></i> @yield('titulo')
            </h2>
            @yield('conteudo')
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body">
        <div class="content py-0">
            <div class="row fs-sm">
                <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
                    Desenvolvido por <a class="fw-semibold" href="#" target="_blank">Isaque Oliveira</a>
                </div>
                <div class="col-sm-6 order-sm-1 text-center text-sm-start">
                    <a class="fw-semibold" href="#" target="_blank">MeuControle 1.0</a> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- MODAL DELETE -->

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideleft" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-danger">
                    <h3 class="block-title">Excluir</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p id="nomeConta"></p>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" id="btnModalDelete" class="btn btn-sm btn-danger">Sim</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MODAL DELETE -->

<!--
  Dashmix JS

  Core libraries and functionality
  webpack is putting everything together at assets/_js/main/app.js
-->
<script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script>Dashmix.helpersOnLoad(['jq-notify', 'jq-select2', 'jq-datepicker', 'js-flatpickr']);</script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
    $(document).ready(function () {
        $("#data").mask("99/99/9999", {placeholder:"0"});
        $("#telefone").mask("(99) 99999-9999", {placeholder:"0"});
        $('#modalDelete').on('show.bs.modal', function (event) {
            let params = $(event.relatedTarget)
            let id = params.data('id')
            let item = params.data('item')
            let url = params.data('url')
            let modal = $(this)
            modal.find('#nomeConta').html(item);
            modal.find('#btnModalDelete').attr('href', url + '?id=' + id);
        });
        $('#modalDetalheAmigo').on('show.bs.modal', function (event) {
            let params = $(event.relatedTarget)
            let id = params.data('id')
            let item = params.data('item')
            let url = params.data('url')
            let modal = $(this)
            modal.find('#detalheAmigo').html(item);
            modal.find('#btnModalEdit').attr('href', url + '?id=' + id);
        })
    });
</script>

@if(Route::currentRouteName() === 'user.dashboard')
    @include('usuario.dashboard.graficos.gastosGanhos')
    @include('usuario.dashboard.graficos.gastosGanhosColuna')
@endif
</body>
</html>


