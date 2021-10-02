@extends('layouts.master')
@section('content')

<div class="text-accueil">Consultez les restaurants de votre choix et choisissez votre mets.</div>

{{-- presentation des restaurants --}}
<div class="container">
    <div class="row py-4">
        <div class="col-sm">
            <div class="card border border-warning" style="width: 18rem;">
                <img src="storage/images/r1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Resto la joie.</h3>
                  <p class="card-text">Situé à Cotonou, non loin de Saint Michel.</p>
                  <a href="{{route('mets.menu')}}" class="btn btn-warning">Menu du jour</a>
                </div>
              </div>
        </div>

        <div class="col-sm">
            <div class="card border border-warning" style="width: 18rem;">
                <img src="storage/images/r3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Resto la vie.</h3>
                  <p class="card-text">Situé à Agla, non loin de petit à petit.</p>
                  <a href="{{route('mets.menu')}}" class="btn btn-warning">Menu du jour</a>

                </div>
              </div>
        </div>

        <div class="col-sm">
            <div class="card border border-warning" style="width: 18rem;">
                <img src="storage/images/r4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Resto la joie.</h3>
                  <p class="card-text">Situé à Cotonou, non loin de Saint Michel.</p>
                  <a href="{{route('mets.menu')}}" class="btn btn-warning">Menu du jour</a>

                </div>
              </div>
        </div>

        <div class="col-sm">
            <div class="card border border-warning" style="width: 18rem;">
                <img src="storage/images/r1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Resto la joie.</h3>
                  <p class="card-text">Situé à Cotonou, non loin de Saint Michel.</p>
                  <a href="{{route('mets.menu')}}" class="btn btn-warning">Menu du jour</a>

                </div>
              </div>
        </div>


        <div class="col-sm">
            <div class="card border border-warning" style="width: 18rem;">
                <img src="storage/images/r2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Resto la joie.</h3>
                  <p class="card-text">Situé à Cotonou, non loin de Saint Michel.</p>
                  <a href="{{route('mets.menu')}}" class="btn btn-warning">Menu du jour</a>

                </div>
              </div>
        </div>
    </div>

    <div class="row py-4">
        <div class="col-sm">
            <div class="card border border-warning" style="width: 18rem;">
                <img src="storage/images/r3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Resto la joie.</h3>
                  <p class="card-text">Situé à Cotonou, non loin de Saint Michel.</p>
                  <a href="{{route('mets.menu')}}" class="btn btn-warning">Menu du jour</a>

                </div>
              </div>
        </div>

        <div class="col-sm">
            <div class="card border border-warning" style="width: 18rem;">
                <img src="storage/images/r4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Resto la joie.</h3>
                  <p class="card-text">Situé à Cotonou, non loin de Saint Michel.</p>
                  <a href="{{route('mets.menu')}}" class="btn btn-warning">Menu du jour</a>

                </div>
              </div>
        </div>

        <div class="col-sm">
            <div class="card border border-warning" style="width: 18rem;">
                <img src="storage/images/r1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Resto la joie.</h3>
                  <p class="card-text">Situé à Cotonou, non loin de Saint Michel.</p>
                  <a href="{{route('mets.menu')}}" class="btn btn-warning">Menu du jour</a>

                </div>
              </div>
        </div>

        <div class="col-sm">
            <div class="card border border-warning" style="width: 18rem;">
                <img src="storage/images/r2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Resto la joie.</h3>
                  <p class="card-text">Situé à Cotonou, non loin de Saint Michel.</p>
                  <a href="{{route('mets.menu')}}" class="btn btn-warning">Menu du jour</a>

                </div>
              </div>
        </div>

        <div class="col-sm">
            <div class="card border border-warning" style="width: 18rem;">
                <img src="storage/images/r3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title">Resto la joie.</h3>
                  <p class="card-text">Situé à Cotonou, non loin de Saint Michel.</p>
                  <a href="{{route('mets.menu')}}" class="btn btn-warning">Menu du jour</a>

                </div>
              </div>
        </div>

    </div>

</div>

@endsection
