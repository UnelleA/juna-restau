<html class="no-js" lang="fr"><!-- Mirrored from live.envalab.com/html/hotte/error.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Sep 2021 11:09:11 GMT --><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juna Eats</title>
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{asset('path/to/font-awesome/css/font-awesome.min.css')}}">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="{{asset('css/icofont.min.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{asset('css/venobox.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('link')
    {{-- <link rel="stylesheet" type="text/css" href="storage/front/css/style.css"> --}}

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
     <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css')}}">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

     <meta name="csrf-token" content="{{ csrf_token() }}" />

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
                    <a class="navbar-brand" href="#">
                        <div class="logo">
                            <img src="{{asset('storage/images/logoJR.png')}}" alt="" style="width:200px; heigth:200px; margin-top:-15px; margin-left:-100px" />
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
                                    {{-- <a class="dropdown-item" href="{{route('mets.index', )}}"></a> --}}
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact.index')}}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Connexion</a>
                            </li>
                        </ul>
                    </div>
                    {{-- panier --}}
                    <div class="open-time">
                        <span style="color: white"><label id="count">{{Cart::count()}}</label> <a class="icofont-cart" href="{{route('cart.index')}}" style="color: white"></a></span>
                    </div>
                    {{-- reservation --}}
                    <div class="open-time">
                        <span style="color: yellow; margin-left:3rem;  "><label id="count_reserver">
                            {{-- @php
                             echo count(session('reservation') );
                            @endphp --}}
                            </label> <a class="icofont-ticket" href="{{route('reservations.index')}}" style="color: yellow; margin-left:3rem; "></a></span>
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
                <img src="{{asset('storage/images/r2.jpg')}}" alt="Chania">
                <div class="carousel-caption">
                  <h3>Toutes mes specialités culinaires</h3>
                  <p>J'adore Juna Resto</p>
                </div>
              </div>

              <div class="item">
                <img src="{{asset('storage/images/r4.jpg')}}" alt="Chicago">
                <div class="carousel-caption">
                  <h3>Salade!!! Miam miam!!!</h3>
                  <p>Plus de soucis pour mon ventre</p>
                </div>
              </div>

              <div class="item">
                <img src="{{asset('storage/images/r3.jpg')}}" alt="New York">
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

{{-- begin footer --}}
<footer>

    <div id="container">
        <div id="part1">
            {{-- <p id="txt1">NOS SERVICES</p> --}}
            <div id="companyinfo" class="col"> <a id="slink" href="#">
                <img src="{{asset('storage/images/logoJR.png')}}" alt="" width="160" height="100"></a>
               <p id="title">Juna Eats &hearts;</p>
                <p id="detail">Votre satisfaction est notre tranquillité !!!</p>
            </div>
            {{-- <hr style="width: 1px; height: 20px; display: inline-block;"> --}}

            <div id="explore">
                <p id="txt1">NOS SERVICES</p>
                 <p id="detail">Divers plats culinaires pour nos clients.</p> <br>
                <p id="detail">Livraison presque gratuite.</p>  <br>
                <p id="detail">Ventes et achats de mets.</p>
            </div>
            {{-- <hr style="width: 1px; height: 20px; display: inline-block;"> --}}

            <div id="visit">
                <p id="txt2"></p>
                <p class="text"></p>
            </div>
            <div id="legal">
                <p id="txt3">NOS PARTENAIRES</p>
                <a class="link1" href="{{route('home')}}">Vos Restaurants</a>
                <a class="link1" href="/login">Se connecter</a>
                <a class="link1" href="{{route('dashboard')}}">Acceder au tableau de bord</a>
                <a class="link1" href="/login">Rejoignez nos livreurs</a>
            </div>
            <div id="subscribe">
                <p id="txt5">CONTACTS</p>

                            <div class="icon"><span class="icofont-phone"></span><a href="#" class=" link">+229 51929617</a></div>

                            <div class="icon"><span class="icofont-email"></span> <a href="#" class=" link">unelamous16@gmail.com</a></div>

                                <a href="#" class=" link">Benin/ Abomey-Calavi</a>
                                <div class="icon"><span class="icofont-google-map"></span></div>

                    </div>

        </div>
        <div id="part2">
            <p id="txt6"><i class="material-icons tiny">
            </i>Copyright {{date('Y')}} - Tous droits réservés | Juna Eats
            </p>
        </div>
    </div>
</footer>
{{-- end footer --}}

@yield('script')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- jQuery JS -->
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <!-- Popper JS -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- Venobox JS -->
    <script src="{{asset('js/venobox.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- main.js -->
    <script src="{{asset('js/main.js')}}"></script>
{{-- cart --}}
    <script>
        $('.qty').on('change', function(){
            var qty= $(this).val();
            var Id= $(this).attr('data-id');
            var price= $(this).siblings('.item-price').attr('data-price');
            var subtotal=qty *price;
            $('.sous-total-'+ Id).text(subtotal);
            $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
    });
            $.ajax({
                url: "{{ route('cart.update')}}",
                type: "post",
                dataType:"json",
                data:{
                    qty,
                    Id
                },
                success: function(response){
                    console.log(response);

                    $('.sous-total').text(response.subtotal);
                },
                error: function(error){
                    console.log(error);
                }
            })


        });
    </script>

{{-- reservation --}}
{{-- <script>
    $('.qty').on('change', function(){
        var qty= $(this).val();
        var Id= $(this).attr('data-id');
        var price= $(this).siblings('.item-price').attr('data-price');
        var subtotal=qty *price;
        $('.sous-total1-'+ Id).text(subtotal);
        $.ajaxSetup({
    headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
});
        $.ajax({
            url: "{{ route('reservations.update')}}",
            type: "post",
            dataType:"json",
            data:{
                qty,
                Id
            },
            success: function(response){
                console.log(response);

                $('.sous-total1').text(response.subtotal);
            },
            error: function(error){
                console.log(error);
            }
        })


    });
</script> --}}


<script>
    $(document).ready(function(){
$('.ajout').click(function(){
    var  id=$(this).data('id');
    var _token   = $('meta[name="csrf-token"]').attr('content');
   // alert(_token);
  // $("#myformcart").trigger("reset")
    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
    });
        $.ajax(
        {
            url:  "{{ route('cart.store')}}",
            type:'POST',
            data:{
            met_id:id,
            },
            success:function(response){
            if(response.success){

                $('#count').html(parseInt($('#count').html())+1);

               // alert(response.success);
            }else if(response.modif){
                //alert()
            }

            },

        }
    );

    });

    $('.reservation').click(function(){
    var  id=$(this).data('id');
    var _token   = $('meta[name="csrf-token"]').attr('content');
   // alert(_token);
  // $("#myformcart").trigger("reset")
    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
    });
        $.ajax(
        {
            url: "{{ route('reservations.store')}}",
            type:'POST',
            data:{
            met_id:id,
            },
            success:function(response){
            if(response.success){

                $('#count_reserver').html(parseInt($('#count_reserver').html())+1);



                alert(response.success);
            }else if(response.modif){
                alert(response.modif);
            }

            },

        }
    );

    });
});

</script>
    @yield('extra-js')

</body></html>
