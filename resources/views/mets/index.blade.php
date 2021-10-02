@extends('layouts.master')
@section('content')

<head><link rel="stylesheet" type="text/css" href="storage/front/css/style.css"></head>

{{-- <section class="product-prev-sec product-list-sec"> --}}
        {{-- <div class="container"> --}}
            <div class="product-rev-wrap">
                <h3 class="text-center">Categories</h3>
                <div class="cat-aside-wrap">
                    <a href="product/5.html" class="cat-check border-top-no ">
                        <img src='storage/image/category/category-60fbb2f21a69e.png' alt=""><p>Sandwich</p>
                    </a>

                    <a href="product/1.html" class="cat-check border-top-no ">
                        <img src='storage/image/category/category-60fbb0bdc3fac.png' alt=""><p>Starter</p>
                    </a>

                    <a href="product/2.html" class="cat-check border-top-no ">
                        <img src='storage/image/category/category-60fbb1dceee78.png' alt=""><p>Soup</p>
                    </a>

                    <a href="product/3.html" class="cat-check border-top-no ">
                        <img src='storage/image/category/category-60fbb237f02fd.png' alt=""><p>Pizza</p>
                    </a>

                    <a href="product/4.html" class="cat-check border-top-no ">
                        <img src='storage/image/category/category-60fbb28929c4d.png' alt=""><p>Burger</p>
                    </a>

                    <a href="product/6.html" class="cat-check border-top-no ">
                        <img src='storage/image/category/category-60fbb36482548.png' alt=""> <p>Dosa</p>
                    </a>

                    <a href="product/7.html" class="cat-check border-top-no ">
                        <img src='storage/image/category/category-60fbb3dbedc17.png' alt=""><p>Chinese</p>
                    </a>

                    <a href="product/8.html" class="cat-check border-top-no ">
                        <img src='storage/image/category/category-60fbb46734e89.png' alt=""><p>Dessert</p>
                    </a>

                    <a href="product/9.html" class="cat-check border-top-no ">
                        <img src='storage/image/category/category-60fbb4a89483f.png' alt=""><p>Drink</p>
                    </a>
                </div>
            </div>
            <div class="cat-product">
                <div class="cart-pro-head">
                    <h3 class="sec-head">Mets</h3>
                </div>
            @foreach ($mets as $met)
                <div class="col-sm-6 col-xl-4 col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <h6 class="mb-0">{{$met->title}}</h6>
                <div class="mb-1 text-muted">{{$met->created_at->format('d/m/y')}}</div>
                {{-- <p class="mb-auto">{{$met->subtitle}}</p> --}}
                <strong style="color: red" class="mb-auto">{{$met->price}}</strong>

                {{-- <a  style="color: red" class="i fal fa-heart" href="{{route('mets.show', $met->title)}}">Details du mets</a> --}}


                <a href="{{route('mets.show', $met->title)}}" class="stretched-link btn btn-warning">Details du mets</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="/storage/images/{{$met->image}}" alt="" style = " height:70px; width:70px">
                 <p class="mb-auto">{{$met->category_id}}</p>

                </div>
                </div>
                </div>
                @endforeach
                </div>



@endsection




{{-- @extends('layouts.master')
@section('content')

<head><link rel="stylesheet" type="text/css" href="storage/front/css/style.css"></head>
 @foreach ($mets as $met)
<div class="col-md-6">
<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
<div class="col p-4 d-flex flex-column position-static">
  <h6 class="mb-0">{{$met->title}}</h6>
  <div class="mb-1 text-muted">{{$met->created_at->format('d/m/y')}}</div>
  <p class="mb-auto">{{$met->subtitle}}</p>
  <strong class="mb-auto">{{$met->price}}</strong>

  <a href="{{route('mets.show', $met->title)}}" class="stretched-link btn btn-warning">Details du mets</a>
</div>
<div class="col-auto d-none d-lg-block">
    <img src="/storage/images/{{$met->image}}" alt="" style = " height:70px; width:70px">
</div>
</div>
</div>
</div>
@endforeach



@endsection --}}







