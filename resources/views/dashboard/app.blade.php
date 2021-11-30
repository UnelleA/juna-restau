<!DOCTYPE html>
<html>
<head>
    {{-- <link rel="stylesheet" href="https://github.com/FortAwesome/Font-Awesome"> --}}
    {{-- <style>
        .container .bo{
    border: 3px solid red !important;
        }
        </style> --}}

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Dashboard restaurateur</title>

    {{-- tables --}}
	<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>

    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css"')}}>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('css table/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css table/main.css')}}">
    <!--===============================================================================================-->
{{-- end tables --}}
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Rechercher ici...">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">From</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Rechercher</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow mr-3" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active ">{{auth()->user()->totalNotif() ?? ''}} </span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								@forelse (auth()->user()->notifications as $notification)
                                    @if(!$notification->status)
                                    <li>
                                        <a href="#">
                                            <p>{!! $notification->message !!}</p>
                                        </a>
                                    </li>
                                    @endif
                                    @empty
                                        Aucune nouvelle notification
                                @endforelse
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="{{asset('storage/images/c1.jfif')}}" alt="">
						</span>
						<span class="user-name" style="font-size: 2em">
						@auth()
							{{auth()->user()->name}}
						@endauth</span>

                        <span class="user-image">
                            @auth()
                                {{auth()->user()->image}}
                            @endauth</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="{{route('profile.index')}}"><i class="dw dw-user1"></i>Profile</a>
						{{-- <a class="dropdown-item" href="{{route('profile.html"')}}><i class="dw dw-settings2"></i> Setting</a> --}}
						<a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Se deconnecter') }}
                        </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
						</a>
					</div>
				</div>
			</div>
        </div>
    </div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo d-flex justify-content-between">
			@if (auth()->user()->type==0)
            <a href="#" class="text-uppercase text-center">Administrateur</a>
            @else
            <a href="{{route('dashboard')}}">
				{{-- <img src="{{asset('storage/images/11.jpg')}}" alt="" class="dark-logo"> --}}
                @if (auth()->user()->compte)
                <img style="height: 5rem; width:5rem" src="{{asset('storage/'.auth()->user()->compte->image )}}" alt="" class="light-logo">
                @else
                <img style="height: 4rem; width:5rem" src="{{asset('storage/images/food2.png')}}" alt="" class="light-logo">
                @endif
            <span  style="font-size: 0.7em" class="ml-4">{{ auth()->user()->compte->name ?? 'Nom du resto' }}</span>
            @endif
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="mtext">Aller à</span>
						</a>
						<ul class="submenu">
							<li><a href="{{route('home')}}"><span class="micon dw dw-house-1"></span> Accueil</a></li>

						</ul>
					</li>
					@if(auth()->user()->type ==2 )
                    @if(auth()->user()->hasActiveAccount())
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-ellipsis-v"></span><span class="mtext">Catégories</span>
						</a>
						<ul class="submenu">
							<li><a href="{{route('categories.create')}}">Ajouter une catégorie</a></li>
							<li><a href="{{route('categories.index')}}">Afficher toutes les catégories</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-bars"></span><span class="mtext">Menu du jour</span>
						</a>
						<ul class="submenu">
							<li><a href="{{route('menu.create')}}">Ajouter un mets</a></li>
							<li><a href="{{route('menu.index')}}">Afficher tous les mets</a></li>
						</ul>
                </li>

                {{-- <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-bars"></span><span class="mtext">Video</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('compte.create')}}">image resto</a></li>
                    </ul>
            </li> --}}

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-user"></span><span class="mtext">Gestion clients</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('gestion_client.commande')}}">Afficher les commandes</a></li>
                        <li><a href="{{route('gestion_client.reservation')}}">Afficher les réservations</a></li>
                    </ul>
            </li>

                    @endif
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-cutlery"></span><span class="mtext">Mon Restaurant</span>
						</a>
						<ul class="submenu">
							<li><a href="{{route('compte.gestion')}}">Gestion de mon espace</a></li>
                            @if ( auth()->user()->hasAccount() && !auth()->user()->hasActiveAccount())
							<li><a href="{{route('compte.activer')}}">Activer mon compte</a></li>
                            @endif
						</ul>
					</li>
                    @endif

                    @if(auth()->user()->type==0)
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user"></span><span class="mtext">Mes compagnies</span>
						</a>
						<ul class="submenu">
							{{-- <li><a href="{{route('abonnement.abonner')}}">Abonner une compagnie</a></li> --}}
							<li><a href="{{route('abonnement.index')}}">Listes des restaurants</a></li>
							<li><a href="{{route('abonnement.livreur')}}">Listes des liveurs</a></li>

						</ul>
					</li>
                    @endif
				</ul>

			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

    <div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-20rem">
 <!-- multiple select row Datatable start -->

				<!-- multiple select row Datatable End -->
				<!-- Checkbox select Datatable start -->

				<!-- Checkbox select Datatable End -->
				<!-- Export Datatable start -->

				<!-- Export Datatable End -->
			</div>
	@yield('content')
		</div>
	</div>

	<!-- js -->
	<script src="{{asset('vendors/scripts/core.js')}}"></script>
	<script src="{{asset('vendors/scripts/script.min.js')}}"></script>
	<script src="{{asset('vendors/scripts/process.js')}}"></script>
	<script src="{{asset('vendors/scripts/layout-settings.js')}}"></script>
	<script src="{{asset('src/plugins/apexcharts/apexcharts.min.js')}}"></script>
	<script src="{{asset('vendors/scripts/dashboard.js')}}"></script>
    <!--===============================================================================================-->
    	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script>
    <!--===============================================================================================-->
        <script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script>
            $('.js-pscroll').each(function(){
                var ps = new PerfectScrollbar(this);

                $(window).on('resize', function(){
                    ps.update();
                })
            });


        </script>

    <!--===============================================================================================-->
    <script src="{{asset('js table/main.js')}}"></script>
    <script src="{{asset('vendors/scripts/core.js')}}"></script>
    <script src="{{asset('vendors/scripts/script.min.js')}}"></script>
    <script src="{{asset('vendors/scripts/process.js')}}"></script>
    <script src="{{asset('vendors/scripts/layout-settings.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- buttons for Export datatable -->
    <script src="{{asset('src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/vfs_fonts.js')}}"></script>
    <!-- Datatable Setting js -->
    <script src="{{asset('vendors/scripts/datatable-setting.js')}}"></script>
    <link rel="{{asset('stylesheet" type="text/css" href="vendors/styles/core.css')}}">
    <link rel="{{asset('stylesheet" type="text/css" href="vendors/styles/icon-font.min.css')}}">
    <link rel="{{asset('stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="{{asset('stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
    <link rel="{{asset('stylesheet" type="text/css" href="vendors/styles/style.css')}}">

    <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-119386393-1');
        </script>


<script>
    // tooltip bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })

                $('.btn-delete').click(function(){
                    $(this).siblings('.delete-form').submit();
                });
</script>

</body>
</html>
