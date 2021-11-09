@extends('layouts.master')
@section('link')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
{{-- <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}"> --}}
<link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/font-awsome-all.min.css')}}">
{{-- <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}"> --}}
<link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('storage/front/css/style.css')}}">
<style>
    .bo{
        border: 4px solid red;
    }
</style>
@endsection

@section('content')
<!-- CSS Files -->



            <section class="product-prev-sec product-list-sec">
                <div class="container" style="margin-top: -100px;">
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

             <div class="cat-product" style="margin-left: 300px; margin-top: -200px">
                <div class="cart-pro-head">
                    <h2 class="sec-head">Mets</h2>
                </div>
                    <div class="row" id="list_product">
                @foreach ($mets as $met)

                         {{-- <div class="col-xl-4 col-md-6"> --}}
                        <div class="col-xl-4 col-md-4">
                         <div class="pro-box">
                            <h4 style="text-align: center">{{$met->title}}</h4>
                             <div class="pro-img">
                                    <img src="{{Storage::url($met->image)}}" alt="">
                                 </div>
                            <div class="product-details-wrap">
                                <div class="product-details">
                                        <span>{{$met->created_at->format('d/m/y')}}</span>
                                        <hr>

                                        <hr>
                                    <p class="pro-pricing">
                                        {{$met->price}}
                                    </p>
                                </div>
                                <hr>
                                <div class="product-details">
                                    <p>{{$met->description}}</p>
                                </div>

                            </div>
                            {{-- <form id="myformcart"  novalidate="">
                                @csrf
                                <input type="hidden" name="met_id" value="{{$met->id}}">--}}
                                <div class="row d-flex justify-content-around">
                                    <button  class=" mx-0 btn btn-sm btn-primary ajout" id="ajout{{$met->id}}" data-id="{{$met->id}}" style="margin-top: 20px; margin-left: 50px" >Ajouter au panier</button>
                                <button  class=" mx-0 btn btn-sm btn-success reservation" id="reservation{{$met->id}}" data-id="{{$met->id}}" style="margin-top: 20px; margin-left: 50px" >Réserver</button>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                    @endforeach
                    <div>
                        {!! $mets->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div></div>
@endsection
@section('script')
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






















