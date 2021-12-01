@extends('layouts.master')
@section('content')
<div class="container shadow">
        <div class="card-body">

            <h3 class="card-title text-center" style="color: blue;" class="fs-1">{{$company->name}} restaurant en 3D.</h3></div>                </div>
          <hr>
<hr>

                    <div >
                        <img src="{{Storage::url($company->image)}}" class="rounded" alt="..." style="width: 500px; height:500px; margin-left: 500px">
                    </div>
                    {{-- <img style="height: 5rem; width:5rem" src="{{asset('storage/'.auth()->user()->compte->image )}}" alt="" class="light-logo"> --}}
        </div>

      </div>
<hr>

@endsection


