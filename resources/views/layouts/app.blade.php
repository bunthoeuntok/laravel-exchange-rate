<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/switchery/switchery.min.css') }}" rel="stylesheet">

  
    <!-- Theme Styles -->
    <link href="{{ asset('css/concept.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="page-header-fixed page-sidebar-fixed">
    <div id="app">
        <!-- Page Content -->
        <div class="page-content">
            @include('layouts.partials.left-sidebar')
            <!-- Page Header -->
            @include('layouts.partials.top-header')
            <!-- Page Inner -->
            <div class="page-inner no-page-title">
                <div id="main-wrapper">
                    <div class="content-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-style-1">
                                <li class="breadcrumb-item"><a href="#">Layouts</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Fixed Sidebar &amp; Header</li>
                            </ol>
                        </nav>
                        <h1 class="page-title">Fixed Sidebar &amp; Header</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="ds-stat">
                                                <span class="ds-stat-name">Earnings</span>
                                                <h3 class="ds-stat-number">$67,856<span class="ds-stat-percent"><i class="fas fa-caret-up"></i>23%</span></h3>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="ds-stat">
                                                <span class="ds-stat-name">Visitors</span>
                                                <h3 class="ds-stat-number">104,679<span class="ds-stat-percent"><i class="fas fa-caret-down"></i>7%</span></h3>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="ds-stat">
                                                <span class="ds-stat-name">Support Questions</span>
                                                <h3 class="ds-stat-number">457<span class="ds-stat-percent"><i class="fas fa-caret-up"></i>31%</span></h3>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="ds-stat">
                                                <span class="ds-stat-name">Net Revenue</span>
                                                <h3 class="ds-stat-number">$53,980<span class="ds-stat-percent"><i class="fas fa-caret-up"></i>16%</span></h3>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem ducimus voluptatibus pariatur fugiat aliquid, recusandae accusamus dignissimos explicabo. Illum, rerum ipsa itaque exercitationem asperiores minima fuga laudantium reprehenderit? Ex non suscipit, neque blanditiis impedit vitae quis esse consequuntur quo laudantium, animi libero laborum autem magni in consequatur earum quas, ut quam fugit perspiciatis alias dolorem! Voluptate sequi corporis ea doloremque alias odio labore, iusto natus. Porro accusamus animi earum temporibus repellendus nemo vero quisquam perspiciatis harum, sed vitae rerum repellat nisi, sit. Totam molestias nobis nemo culpa eligendi, ab enim a hic beatae quas iste sapiente modi quos commodi, assumenda autem dicta sit veniam, voluptate. Explicabo, inventore, ipsum! Laborum sunt ipsam, aut architecto facere explicabo? Veritatis non modi laborum, tenetur beatae suscipit quas magni ipsa ullam quos incidunt nobis iusto tempora velit laudantium, reiciendis sapiente exercitationem, cupiditate aspernatur officia quaerat facere! Dolores, quisquam. Aut perspiciatis, in reprehenderit atque rerum facilis consequatur omnis, fugit nobis possimus eius optio suscipit soluta, recusandae eum, a! Perspiciatis repudiandae explicabo doloribus expedita sint velit harum similique odio provident optio minus fugit, amet placeat eligendi modi dolorum possimus. Temporibus officiis delectus sed dicta eum id provident, necessitatibus voluptatem. Facilis illo explicabo dolorem qui provident adipisci delectus harum, aut sequi ex officiis, ad nobis vero excepturi perferendis ullam nesciunt dolor ipsam minima, voluptates sint eligendi quas! Molestias quos consectetur explicabo laborum soluta! Neque vero optio expedita eum dolorum voluptatum, sit mollitia nobis dicta veritatis molestiae, ea reiciendis dignissimos? Modi non, voluptates similique facere dolore dolor cumque molestiae repudiandae, deserunt hic quos. Eaque, maiores. Quas quos, nemo at esse amet sit similique et quis odit quibusdam facere, maxime magni hic quidem deserunt, deleniti praesentium iusto enim dolorum omnis ut! Voluptatibus recusandae obcaecati laborum, provident nostrum repudiandae consequuntur debitis, aspernatur velit dolorem. Libero repellendus, nisi esse eos explicabo impedit asperiores accusamus reiciendis quaerat necessitatibus, aspernatur dolorum adipisci optio consectetur unde, modi magnam facilis quod sequi? Ex obcaecati cumque, voluptatum, molestiae ratione aliquid tempore, deleniti ullam laborum quas dolore similique fugiat repellendus odio? Veniam fugit vero quasi quae voluptatem corporis, ducimus qui, quaerat suscipit excepturi inventore doloremque, nesciunt voluptas. Possimus tempore temporibus aut eius corporis, odit, dolor illo ex, enim mollitia deserunt. Error, nobis. Blanditiis voluptas aut cupiditate dolorem dolore distinctio officia quam quos commodi sequi cum eligendi qui perspiciatis, fugit sit, nihil animi voluptatibus omnis quis voluptatum. Possimus incidunt quia minus enim voluptatum veritatis, dolor sequi amet illum rem cumque doloremque, magni fugit. Possimus tempore, quo! Repudiandae natus illum nam, quam atque dolores nihil corporis. Necessitatibus mollitia dicta veniam, fugit debitis quia distinctio molestiae quae voluptates laborum animi repudiandae quis, minima officia ipsum totam modi in at! Officia adipisci aliquid pariatur quo, mollitia accusamus eius recusandae omnis architecto atque doloremque cum nisi, ea assumenda dicta dolores voluptatem sapiente voluptatum quaerat optio tempora beatae. Consequatur, ea nulla quaerat? Aliquid ea architecto assumenda placeat molestiae! Fugiat quam sed quae alias tempora, nobis explicabo tenetur eveniet inventore, non unde, consequuntur voluptatibus excepturi. Pariatur quam eaque repellendus velit dignissimos atque rem quidem quae doloremque accusantium tempora nesciunt nemo animi ab neque cumque, eum ducimus voluptates aliquam voluptatibus blanditiis unde impedit consequatur. Sit expedita aut voluptatibus quidem libero, voluptatem cupiditate atque exercitationem facilis nihil necessitatibus ipsam rem, id facere, quae harum aliquam consequatur voluptatum porro illo in quos. A repellat possimus temporibus sapiente magnam ipsum quod fuga ut quia suscipit voluptate totam numquam accusamus eaque animi magni adipisci ipsa, maxime natus deserunt error sint, harum quaerat porro. Vitae quo quasi sunt deleniti quas perferendis architecto at fugit dolorem non enim harum nam, id nemo inventore veritatis, quibusdam placeat ratione mollitia hic maiores ab accusamus, cum. Harum quaerat, mollitia corporis reiciendis autem. Error officiis repellendus, dicta modi fugit numquam ullam autem nam. Ex ratione perferendis iusto id sunt, vel assumenda temporibus omnis architecto libero reiciendis sapiente voluptate repudiandae soluta est. Temporibus nemo quaerat, adipisci et nulla, soluta maiores qui voluptatum reprehenderit quo dolores nihil. Pariatur totam voluptas nemo, velit, labore deserunt quos ad dolor commodi quidem eaque vero quas! Sint non possimus illum magnam minima odit ducimus! Unde itaque, voluptatibus culpa voluptatem provident, at eaque? Qui nostrum tempore, doloremque sapiente! Incidunt obcaecati, nostrum minima voluptates expedita repellendus iure! Tempore necessitatibus quaerat reprehenderit deleniti, possimus itaque nobis earum saepe rerum esse nisi eligendi sit deserunt exercitationem quo mollitia iure fugit praesentium odit officiis. Ab possimus veniam iste id, placeat sit nesciunt animi pariatur aut eum quos vel hic officiis voluptatum culpa deleniti libero dolorum nisi laboriosam, optio assumenda incidunt quaerat voluptates voluptas! Maxime optio facere incidunt, iure aliquam ut tenetur et dolore adipisci. Assumenda dolores beatae maiores quibusdam fugit libero sunt quidem, culpa voluptates asperiores saepe natus repudiandae animi repellat ipsam porro quas velit at eum consequuntur impedit nam! Odio optio doloremque ab error. Perspiciatis cupiditate facere, odio eum voluptates sunt dolores laudantium nam sed, iste corporis molestiae dolor impedit facilis eligendi recusandae, quidem possimus aperiam, vitae debitis harum repellat. Porro ullam dignissimos, autem mollitia ipsum harum doloremque eligendi expedita maiores illo vel quidem! Iusto dolores atque modi illo minus aliquam esse earum mollitia cum nobis quo quisquam obcaecati nulla, aperiam cupiditate unde vero voluptatibus ipsam inventore reprehenderit similique, recusandae explicabo commodi optio a? Iusto quas repellendus ducimus tempora sequi non beatae veniam provident ad fugit reprehenderit a maxime incidunt, repudiandae quo eveniet aliquid voluptatem ab, minus libero. Repudiandae, aut sint, laboriosam illum eum unde odit officia est porro, aliquam eligendi modi. Voluptates eveniet repellat molestiae quia, distinctio quisquam aliquam ipsa quaerat magni amet a numquam molestias qui harum. Possimus impedit vitae sit qui repellendus aliquam quia soluta consequuntur assumenda, natus et iusto reprehenderit eius eveniet obcaecati asperiores odio ipsam, blanditiis molestias commodi culpa accusamus aspernatur. Obcaecati illo porro, qui quis nisi, placeat aliquam dolorem aliquid, nihil voluptatem maxime nesciunt quod est velit excepturi unde esse eos rem similique! Illum ullam quod nulla necessitatibus in, adipisci obcaecati. Sapiente tenetur aperiam laborum laudantium rerum labore dicta ratione quae quidem atque harum sunt reiciendis nostrum enim ipsam odio aliquid maiores, animi alias obcaecati sequi voluptates deleniti nulla, aut?</p>
                    </div>
                </div><!-- Main Wrapper -->

                
                <div class="page-footer">
                    <p>2019 &copy; stacks</p>
                </div>
            </div><!-- /Page Inner -->
            
            {{-- Right Sidebar --}}
            @include('layouts.partials.right-sidebar')
        </div>

        <!-- /Page Content -->
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>

     <!-- Javascripts -->
    <script src="{{ asset('plugins/jquery/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('js/concept.min.js') }}"></script>
</body>
</html>
