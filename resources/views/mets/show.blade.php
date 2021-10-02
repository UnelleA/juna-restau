@extends('layouts.master')
@section('content')
<head><link rel="stylesheet" type="text/css" href="storage/front/css/style.css"></head>

<div class="col-md-12">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        {{-- <strong class="d-inline-block mb-2 text-success">Design</strong> --}}
        <h6 class="mb-0">{{$met->title}}</h6>
        <div class="mb-1 text-muted">{{$met->created_at->format('d/m/y')}}</div>
        <p class="mb-auto">{{$met->description}}</p>
        <strong class="mb-auto">{{$met->price}}</strong>
        <form action="{{route('cart.store')}}" method="post">
            @csrf
            <input type="hidden" name="met_id" value="{{$met->id}}">

            <button type="submit" class="btn btn-warning">Ajouter au panier</button>
        </form>

      </div>
      <div class="col-auto d-none d-lg-block">
        <img src="/storage/images/{{$met->image}}" alt="" style = " height:50px; width:50px">
      </div>
    </div>
  </div>

@endsection

