<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Laravel CMS System</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/backend/assets/img/icon.ico" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="/backend/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/backend/assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="/backend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/backend/assets/css/custom.css">
    <link rel="stylesheet" href="/backend/assets/css/atlantis.min.css">
    <script src="https://cdn.ckeditor.com/4.25.0-lts/standard/ckeditor.js"></script>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/backend/assets/css/demo.css">
    <!--   Core JS Files   -->
    <script src="/backend/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/backend/assets/js/core/popper.min.js"></script>
    <script src="/backend/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="/backend/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/backend/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue">
            <a href="{{route('admin.home')}}" class="logo">
               <h2 class="mt-3">LARAVEL <b class="text-light ">CMS</b></h2>
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="icon-menu"></i>
                </button>
            </div>
        </div>
        <!-- End Logo Header -->
        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
            <div class="container-fluid">
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="/backend/images/users/{{Auth::user()->user_file}}" alt="user-profile" class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="/backend/images/users/{{Auth::user()->user_file}}" alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4>{{Auth::user()->name}}</h4>
                                            <p class="text-muted">{{Auth::user()->email}}</p><a href="{{route('user.edit',Auth::user()->id)}}" class="btn btn-xs btn-secondary btn-sm">Profil</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('settings.index')}}">Ayarlar</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('admin.logout')}}">Çıkış</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <div class="user">
                    <div class="avatar-sm float-left mr-2">
                        <img src="/backend/images/users/{{Auth::user()->user_file}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
								{{Auth::user()->name}}
									<span class="user-level">Yönetici</span>
									<span class="caret"></span>
								</span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#profile">
                                        <span class="link-collapse">Profil</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('user.edit',Auth::user()->id)}}">
                                        <span class="link-collapse">Profil Güncelle</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-primary">
                    <li class="nav-item active">
                        <a  href="{{route('admin.home')}}" >
                            <i class="fas fa-home"></i>
                            <p>Anasayfa</p>
                           </a>

                    </li>
                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">Menu</h4>
                    </li>

                    <li class="nav-item">
                        <a  href="{{route('settings.index')}}">
                            <i class="fas fa-cog"></i>
                            <p>Ayarlar</p>
                            <span class="caret"></span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a  href="{{route('blog.index')}}">
                            <i class="fas fa-layer-group"></i>
                            <p>Blog</p>
                            <span class="caret"></span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a  href="{{route('slider.index')}}">
                            <i class="fas fa-images"></i>
                            <p>Slider</p>
                            <span class="caret"></span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a  href="{{route('page.index')}}">
                            <i class="fas fa-file-alt"></i>
                            <p>Sayfalar</p>
                            <span class="caret"></span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a  href="{{route('user.index')}}">
                            <i class="fas fa-users"></i>
                            <p>Kullanıcılar</p>
                            <span class="caret"></span>
                        </a>

                    </li>
                    <li class="mx-4 mt-2">
                        <a href="halilakarsu.com" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-heart"></i> </span>Buy Pro</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->
 @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                   <div class="copyright">
                    2024, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.halilakarsu.com">halilakarsu.com</a>
                </div>
            </div>
        </footer>
    </div>

</div>

<!-- jQuery Scrollbar -->
<script src="/backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="/backend/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="/backend/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="/backend/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="/backend/assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="/backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="/backend/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="/backend/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="/backend/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="/backend/assets/js/atlantis.min.js"></script>
@if(session()->has('success'))
    <script>alertify.success('{{session('success')}}')</script>
@endif
@if(session()->has('error'))
    <script>alertify.error('{{session('error')}}')</script>
@endif
@foreach($errors->all() as $error)
    <script>
       alertify.error('{{$error}}');
    </script>
@endforeach
</body>
</html>
