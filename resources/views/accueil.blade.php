@extends('layouts.master')
@section('content')

<div class="text-accueil">Consultez les restaurants de votre choix et choisissez vos mets.</div>

{{-- presentation des restaurants --}}
<div class="container">
   <div class="row h-100 align-items-center">
    <div class="col-sm-3">
        <div class="card border border-warning" style="width: 18rem;">
   @foreach ($companies as $company)

            <img src="{{Storage::url($company->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h3 class="card-title">{{$company->name}}</h3>
              <hr>
              <p class="card-text">{{$company->description}}</p>
              <hr>
              <p class="card-text">{{$company->specialite}}</p>

              <a href="{{route('mets.index')}}" class="btn btn-warning">Menu du jour</a>

            </div>
            @endforeach
          </div>
    </div>
            </div>

              </div>
        </div>

    </div>

</div>

@endsection
