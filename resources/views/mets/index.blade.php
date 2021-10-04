@extends('layouts.master')
@section('content')
<!-- CSS Files -->
<link rel="stylesheet" href="{{('assets/css/animate.css')}}">
<link rel="stylesheet" href="{{('assets/css/meanmenu.min.css')}}">
<link rel="stylesheet" href="{{('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{('assets/css/font-awsome-all.min.css')}}">
<link rel="stylesheet" href="{{('assets/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{('assets/css/slick.css')}}">
<link rel="stylesheet" href="{{('assets/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{('assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="storage/front/css/style.css">

{{-- <section class="product-prev-sec product-list-sec"> --}}
        <div class="container d-flex justify-content-between">

            <div class="product-rev-wrap">
                <h3 class="text-center">Categories</h3>
                <div class="cat-aside-wrap">
                   @foreach ($categories as $category)
                   {{-- <a href="{{route('categories.show', $category)}}" class="cat-check border-top-no "> --}}
                   <a href="{{route('mets.index', $category)}}" class="cat-check border-top-no ">
                    <img src='{{ Storage::url($category->image)}}' alt=""><p>{{ $category->name}}</p>
                </a>
                   @endforeach
                </div>
            </div>
{{--
            <div class="">
                    <h3 class="">Mets</h3>
                </div>
            @foreach ($mets as $met)
                <div class="col-sm-6 col-xl-4 col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <h6 class="mb-0">{{$met->title}}</h6>
                <div class="mb-1 text-muted">{{$met->created_at->format('d/m/y')}}</div>
                <strong style="color: red" class="mb-auto">{{$met->price}}</strong>

                <form action="{{route('cart.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="met_id" value="{{$met->id}}">
                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                </form>

                </div>
                </div>
                </div>
@endforeach --}}

            <div class="tab-content" id="nav-tabContent col-md-3">
                            <h3 class="">Mets</h3>
                            <div class=" col-md-12 col-sm-3 d-flex justify-content-between">
                                <div class="row d-flex justify-content-between">
                                <div class="d-flex justify-content-between">
                            @foreach ($mets as $met)
                                    <div class="col-lg-3 d-flex justify-content-between"  style="border: 1px solid gray;">
                                      <div>{{$met->created_at->format('d/m/y')}}</div>
                                        <div class="single-menu-item">
                                            <div class="menu-img">
                                                <img src="{{Storage::url($met->image)}}" alt="" class="mw-100">
                                            </div>
                                            <div class="menu-content">
                                                <strong>{{$met->title}}</strong>
                                                <p>{{$met->description}}</p>
                                                <span style="color: red">{{$met->price}}</span>
                                                <form action="{{route('cart.store')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="met_id" value="{{$met->id}}">
                                                    <button style="margin-top: 10px" type="submit" class="btn btn-primary">Ajouter au panier</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                                </div>

                            </div>
                        {{-- </div> --}}
                            {{-- </div> --}}
                        </div>
</div>
    </div>

{{-- </section> --}}
 </div>

<!-- Javascript Files -->
<script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.meanmenu.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/slick.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/counterup.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/countdown.js')}}"></script>
<script src="{{asset('assets/js/vendor/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/vendor/easing.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/wow.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection
