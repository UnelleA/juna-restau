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

                    <div id="table_data">
                        @include('new.pagination_data')
                       </div>
        </div>
    </div></div>
<div class="d-flex justify-content-center my-3">
  <a href="{{ route('reservations.index')}}" class="btn btn-success rounded col-8 py-3 text-uppercase">Finalisez votre reservation</a>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<!-- Javascript Files -->

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

{{-- Pagination --}}
<script>
    $(document).ready(function(){

     $(document).on('click', '.pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
     });

     function fetch_data(page)
     {
      $.ajax({
       url:"/{$company}/pagination/fetch_data?page="+page,
       success:function(data)
       {
        $('#table_data').html(data);
       }
      });
     }

    });
    </script>
@endsection






















