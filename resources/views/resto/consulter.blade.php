@extends('layouts.master')
@section('content')

<div class="container shadow">
    <div class="card">
        <div class="card-body">

          <h5 class="card-title text-center">Bienvenu(e) sur notre restaurant.</h5>
          <hr class="w-25 mx-auto">
          <div class="row">
            <div class="d-none d-md-block col-md-6 border-right text-center col-md-4">
                <div class="row my-4 d-flex justify-content-center align-items-center">

                    <div >
                        <img src="{{Storage::url($company->image)}}" class="rounded-circle" alt="..." style="width: 200px; height:200px">
                    </div>
                    <div class="ml-3">
                        <h3 class="card-title" style="color: blue;" class="fs-1">{{$company->name}}</h3></div>
                        </div>
                      <div text-center>
                        <p class="card-text"><h4>Description:</h4> <br> {{$company->description}}</p>
                        <hr>
                        <p class="card-text"><h4>Spécialités culinaires:</h4> <br> {{$company->specialite}}</p>
                      </div>
                    </div>

                    <div class="d-md-none  text-center">
                        <div class="row my-4 d-flex justify-content-center align-items-center">

                    <div class="ml-3">
                        <h3 class="card-title" style="color: blue;" class="fs-1">{{$company->name}}</h3></div>                </div>
                         <p class="card-text">{{$company->description}}</p>
                          <p class="card-text">{{$company->specialite}}</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p>Cliquez sur le boutton <strong>Menu du jour</strong> pour voir le menu du restaurant.</p>
                        <hr>
                        {{-- <p>Cliquez sur le boutton <strong>S'abonner</strong> pour vous abonner à ce restaurant. <br> Vous recevrez les notifications des menus de ce restaurant tous les jours dans votre mail.</p> --}}
                        <hr>
                        <p>Cliquez sur le boutton <strong>Voir en 3D</strong> pour voir ce restaurant en 3D.</p>
                    </div>
                    {{-- <div >
                        <img src="{{Storage::url($company->video)}}" class="rounded-circle" alt="Votre logo" style="width: 90px; height:90px">
                    </div> --}}
          </div>
       <div class="row">
        <div class="col-md-4"><a href="{{route('mets.index',['slug'=>$company->slug])}}" class="btn btn-warning">Menu du jour</a></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"><a href="{{route('resto.show_resto' ,['slug'=>$company->slug])}}" class="btn btn-primary">Voir en 3D</a></div>
       </div>
        </div>

      </div>
</div>

@endsection
