@extends('layouts.master')
@section('content')
<header>
  {{-- <script src="assets/jquery.min.js"></script>
<script src="dist/js/bootstrap.bundle.min.js"></script>
</header>
<div class="d-grid gap-2 col-6 mx-auto" style="color: ">
    <button class="btn btn-warning" type="button">Commander</button>
    <button class="btn btn-warning" type="button">Reserver</button>
    <button class="btn btn-warning" type="button">Voir le panier</button>
    <button class="btn btn-warning" type="button">Continuer vos achats</button>
  </div> --}}

  <div class="container">

    <button id="open" type="button" class="btn btn-primary">Informations</button>
    <div class="modal" id="infos">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Plus d'informations</h4>
            <button type="button" class="close closemodal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Le Tigre (Panthera tigris) est un mammifère carnivore de la famille des félidés...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary closemodal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script>
    $(function(){
      $('#open').click(function() {
        $('.modal').modal('show')
      })
      $('.closemodal').click(function() {
        $('.modal').modal('hide')
      })
    })
  </script>

<style>

    .modal{
  display: block;
  position: relative;
}
</style>
@endsection
