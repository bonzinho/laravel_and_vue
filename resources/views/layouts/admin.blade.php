<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <header>
        @if (Auth::check())
            <?php
            $menuConfig = [
                'name' => Auth::user()->name,
                'menus' => [
                    [
                        'name' => 'Notícias',
                        'url' => route('admin.noticias.index'),
                        'active' => isRouteActive('admin.noticias.index'),

                    ],
                    [
                        'name' => 'Eventos',
                        'url' => route('admin.eventos.index'),
                        'active' => isRouteActive('admin.eventos.index'),
                    ],
                    [
                        'name' => 'Destaque',
                        'url' => route('admin.notificacao.index'),
                        'active' => isRouteActive('admin.notificacao.index'),
                    ],
                    [
                        'name' => 'Segundo Destaque',
                        'url' => route('admin.second-notificacao.index'),
                        'active' => isRouteActive('admin.second-notificacao.index'),
                    ],
                    [
                        'name' => 'Instagram',
                        'url' => route('admin.instagram.index'),
                        'active' => isRouteActive('admin.instagram.index'),
                        'dropdownId' => 'listarFeeds'
                    ],
                    [
                        'name' => 'Newsletters',
                        'url' => route('admin.newsletter.index'),
                        'active' => isRouteActive('admin.newsletter.index'),
                    ],
                    [
                        'name' => 'Config',
                        'url' => route('admin.user_list'),
                        'active' => isRouteActive('admin.user_list'),
                    ],
                    [
                        'name' => 'Exportar Subscritores',
                        'url' => route('admin.export-subscribers'),
                        'active' => true,
                    ],
                ],
                'menusDropdown' => [
                    [
                        'id' => 'listarFeeds',
                        'items' => [
                            [
                                'name' => 'Selecionar Feed',
                                'url' => route('admin.instagram.index'),
                                'active' => isRouteActive('admin.instagram.index') // verifica se a rota está ativa ou nao com o helpers.php
                            ],
                            [
                                'name' => 'Listar Feeds anteriores',
                                'url' => route('admin.listFeeds'),
                                'active' => isRouteActive('admin.listFeeds') // verifica se a rota está ativa ou nao com o helpers.php
                            ],
                        ]
                    ]
                ],
                'urlLogout' => env('URL_ADMIN_LOGOUT'),
                'csrfToken' => csrf_token(),
            ];
            ?>
            <admin-menu :config="{{ json_encode($menuConfig) }}"></admin-menu>
        @endif
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                 {{ date('Y') }} <a href="https://www.fe.up.pt" class="grey-text text-lighten-4">FEUP</a>
            </div>
        </div>
    </footer>
</div>


<!-- Scripts -->

<script src="{{asset('build/admin.bundle.js')}}"></script>
@yield('javascript')
<script type="text/javascript">

    $(document).ready(function(){
        $('.carousel').carousel();

        $('[data-toggle="datepicker"]').datepicker({
            format: 'yyyy-mm-dd',
            days: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            daysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
        });

    });
</script>

</body>
</html>
