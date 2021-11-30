@extends('dashboard.app')
@section('content')
<style>

    .container form {

border: 1px solid white;
box-shadow:box-shadow: 10px 10px 10px white;
margin-left: 280px;
background-color: dark-gray;
width: 500px;
/* height: 200px; */

}

.form-group{
text-align: center;

}
.btn{
margin-left: 170px;
}
</style>
<div class="container">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">Activation de mon compte</h5>
          <hr class="w-25 mx-auto">
          <div class="row">
            <div class="d-none d-md-block col-md-6 border-right text-center">
                <div class="row my-4 d-flex justify-content-center align-items-center">

            <div >
                <img src="{{Storage::url($company->image)}}" class="rounded-circle" alt="..." style="width: 90px; height:90px">
            </div>
            <div class="ml-3">
                <h3 class="card-title" style="color: blue;" class="fs-1">{{$company->name}}</h3>

            </div>                </div>
                            <p class="card-text">{{$company->description}}</p>
                  <p class="card-text">{{$company->specialite}}</p>
            </div>

            <div class="d-md-none  text-center">
                <div class="row my-4 d-flex justify-content-center align-items-center">
            <div >
                <img src="{{Storage::url($company->image)}}" class="rounded-circle" alt="..." style="width: 90px; height:90px">
            </div>
            <div class="ml-3">
                <h3 class="card-title" style="color: blue;" class="fs-1">{{$company->name}}</h3>

            </div>                </div>
                            <p class="card-text">{{$company->description}}</p>
                  <p class="card-text">{{$company->specialite}}</p>
            </div>

            {{-- <div class="col-md-6">

            </div> --}}
          </div>
        <button style="margin-left: 800px" type="button"  class="kkiapay-button btn btn-primary">Activer maintenant</button>

        </div>

      </div>
</div>

<script amount="50000"
                    callback="{{route('abonnement.store')}}"
                      {{-- callback="{{ route('payement.reussi') }}" --}}
                    data=""
                    name="{{ auth()->user()->name ?? '' }}"
                    phone="{{ auth()->user()->contact ?? '' }}"
                    url="{{asset('storage/images/logoJR.png')}}"
                    position="center"
                    theme="#00FF"
                    sandbox="true"
                    key="042121e0216011ec9d3a81cf5faf6ca6"
                    src="https://cdn.kkiapay.me/k.js">
                </script>
                <script src="https://cdn.kkiapay.me/k.js">
            </script>
@endsection
