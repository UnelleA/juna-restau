<html class="no-js" lang="fr"><!-- Mirrored from live.envalab.com/html/hotte/error.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Sep 2021 11:09:11 GMT --><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juna Resto</title>
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon"> --}}
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="css/icofont.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="css/venobox.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style.css">
    {{-- <link rel="stylesheet" type="text/css" href="storage/front/css/style.css"> --}}

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <!-- Goto TOP -->
    <div id="top-btn">
        <button class="btn top-btn" style="display: none;"><i class="icofont-arrow-up"></i></button>
    </div>
    <header>
        <div class="header py-1 sticky">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light px-0 py-0">
                    <a class="navbar-brand" href="/">
                        <div class="logo">
                            <img src="storage/images/logoJR.png" alt="" style="margin-top: -22px; width:60px; heigth:60px" />
                        </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                     aria-expanded="false" aria-label="Toggle navigation">
                        <i class="icofont-navigation-menu"></i>
                    </button>

                    <div style="margin-left: 550px; margin-top: 20px; height:30px;" class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav navbar-custom">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Accueil </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Restaurants</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">Chez Dadje</a>
                                    <a class="dropdown-item" href="">Resto la vie</a>
                                    <a class="dropdown-item" href="">Resto la joie</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact.index')}}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register">s'inscrire</a>
                            </li>
                        </ul>
                    </div>
                    <div class="open-time">
                        <span style="color: white">{{Cart::count()}}<a class="icofont-cart" href="{{route('cart.index')}}" style="color: white"> Panier</a></span>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- HEADER PART END -->

    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif

    <!-- HERO SECTION START -->
 <div class="offer-section" style="margin-top:-100px">

    <div class="row">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:15%">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" style="height: 450px">
              <div class="item active">
                <img src="storage/images/r2.jpg" alt="Chania">
                <div class="carousel-caption">
                  <h3>Toutes mes specialités culinaires</h3>
                  <p>J'adore Juna Resto</p>
                </div>
              </div>

              <div class="item">
                <img src="storage/images/r4.jpg" alt="Chicago">
                <div class="carousel-caption">
                  <h3>Salade!!! Miam miam!!!</h3>
                  <p>Plus de soucis pour mon ventre</p>
                </div>
              </div>

              <div class="item">
                <img src="storage/images/r3.jpg" alt="New York">
                <div class="carousel-caption">
                  <h3>Riz créole</h3>
                  <p>Mangez sain</p>
                </div>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Precedent</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Suivant</span>
            </a>
          </div>
    </div>
 </div>



    <!-- HERO SECTION END -->

    <div class="row mb-2">
        @yield('content')
      </div>
  {{-- @yield('donnee') --}}


<footer>

    <div id="container">
        <div id="part1">
            <div id="companyinfo" class="col"> <a id="slink" href="{{route('mets.index')}}">
                <img src="storage/images/logoJR.png" alt="" width="50" height="50"></a>
               <p id="title">Juna Resto &hearts;</p>
                <p id="detail">Votre satisfaction est notre tranquillité!!!</p>
            </div>
            <div id="explore">
                <p id="txt1">Votre choix</p>
                 <a class="link" href="{{route('mets.index')}}">Vos Restaurants</a>
                <a class="link" href="/register">S'inscrire</a>
                <a class="link" href="{{route('mets.index')}}">Contactez-nous</a>
            </div>
            <div id="visit">
                <p id="txt2">Adresse</p>
                <p class="text">Benin/Abomey-Calavi </p>
            </div>
            <div id="legal">
                <p id="txt3">Legal</p> <a class="link1" href="#">Termes et Conditions
                </a> <a class="link1" href="/login">Se connecter</a>
            </div>
            <div id="subscribe">
                {{-- <p id="txt4">S'inscrire</p>
                <form> <input id="email" type="email" placeholder="Email"> </form>
                 <a class="waves-effect waves-light btn">Subscribe</a> --}}
                <p id="txt5">Se connecter à nos compte</p> <i class="fab fa-facebook-square social fa-2x"></i>
                <i class="fab fa-linkedin social fa-2x"></i> <i class="fab fa-twitter-square social fa-2x"></i>
            </div>
        </div>
        <div id="part2">
            <p id="txt6"><i class="material-icons tiny">
                 copyright</i>Copyright {{date('Y')}} - Tous les droits privés
                 {{-- &copy; Copyright {{date('Y')}} --}}
                {{-- &middot; <a href="{{route('mets.index')}}">A Propos</a>     --}}
            </p>
        </div>
    </div>
</footer>


    <!-- jQuery JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>
    <!-- Venobox JS -->
    <script src="js/venobox.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- main.js -->
    <script src="js/main.js"></script>


<!-- Mirrored from live.envalab.com/html/hotte/error.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Sep 2021 11:09:11 GMT -->
</body></html>
