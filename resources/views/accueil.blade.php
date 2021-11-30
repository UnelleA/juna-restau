@extends('layouts.master')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('storage/front/css/style.css')}}">

{{-- presentation des restaurants --}}
<section class="product-prev-sec product-list-sec">

    <div class="container center-block">
        <div class="text-accueil  text-center">Consultez les restaurants de votre choix et choisissez vos mets.</div>
<hr>
        <div class="product-rev-wrap">
            <div class="cat-product">
                    <div class="row">
                         @foreach ($companies as $company)
                         {{-- container text-center shadow-lg col-8 col-md-6 mb-5 py-4 --}}
                        <div class="col-xl-3 col-md-4">
                         <div class="pro-box card border border-warning">
                             <div class="pro-img">
                                    <img src='{{Storage::url($company->image)}}' alt="">

                               </div>
                            <div class="product-details-wrap">
                                <div class="product-details">
              <a href="{{route('resto.consulter', ['slug'=>$company->slug])}}"class="btn btn-warning w-100"><strong> {{$company->name}}</strong></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- $mets = $company->mets()->zinRandomOrder()->paginate(6); --}}
                    <div>
                        {!! $companies->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

{{-- card --}}
<div class="container center-block">
    <div class="row">
   <div class="col-md-4">
    <div class="card" style="width: 18rem; color: white">
        <img class="card-img-top" src="{{asset('storage/images/client.jfif')}}" alt="client">
        <div class="card-body bg-primary">
          <h5 class="card-title">Chers clients,</h5>
          <p class="card-text">faites vos commandes dans les restaurants de vos choix.</p>
        </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card" style="width: 18rem; color: white">
        <img class="card-img-top" src="{{asset('storage/images/restaurateur.jfif')}}" alt="Restaurateur">
        <div class="card-body bg-primary">
          <h5 class="card-title">Chers restaurateurs,</h5>
          <p class="card-text">inscrivez-vous pour devenir notre partenaire sur Juna Eats.</p>
        </div>
      </div>
   </div>

<div class="col-md-4">
   <div class="card" style="width: 18rem; color: white">
    <img class="card-img-top" src="{{asset('storage/images/livreur.png')}}" alt="Livreur">
    <div class="card-body bg-primary">
      <h5 class="card-title">Chers livreurs,</h5>
      <p class="card-text">inscrivez-vous pour rejoindre nos livreurs.</p>
    </div>
  </div>
</div>
</div>
</div>
<hr>

@endsection
