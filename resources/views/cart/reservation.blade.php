@extends('layouts.master')
@section('content')
@if($count >0)
@include('laravel-bootstrap-toasts::message')
<div class="px-4 px-lg-0">
    <div class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

            <!-- Shopping reservations table -->
            <div class="table-responsive">

              <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th class="p-name">Nom du mets</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Montant</th>
                        <th>Supprimé</th>
                        {{-- <th><i class="ti-close"></i></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if($count >0)
                    @php
                        $somme=0;
                    @endphp
                    @foreach($reservations as $met)
                    @php
                        $somme += $met->price;
                    @endphp
                    <tr>
                    <td>

        <img src="{{Storage::url($met->image)}}" alt="" style = " height:70px; width:70px">
                    </td>
                    <td class="reservations-title first-row">
                        <h5>{{ $met->title }}</h5>
                    </td>
                      <td class="p-price first-row">{{ $met->price}}</td>
                    </td>
                    <td class="p-price first-row">{{ $met->price}}</td>
                    <td class="reservations-title first-row" ><input type="number" min="1" value="1" name="qty" class="qty col-3" data-id="{{ $met->id}}"
                       class="custom-select" id="inputGroupSelect03">


                    <p class="item-price" data-price="{{ $met->price}}"></p>
                  </td>
                      <p class="item-price" data-price="{{ $met->price}}"></p>
                    </td>
                      {{-- <td class="border-0 align-middle"> --}}

                          {{-- mettre ajout la quantite du panier --}}

                    <td class="sous-total-{{ $met->id}}">
        {{( $met->price)}}

        {{-- {{getPrice(Reservations::subtotal())}} --}}
                    </td>
                      {{-- <td class="total-price first-row">$60.00</td> --}}
                      <form action="{{ route('reservations.destroy', $loop->index ) }}" method="post">
                            @csrf
                            @method('DELETE')
        <td class="close-td" style="color: red"><button type="submit" class="icofont-delete">
            </button></td>
        {{-- <td class="close-td"><button type="submit"><i class="ti-close text-danger"></i></button></td> --}}
                    </form>
                    <th>
                        <button type="button" class="btn btn-primary btn-note" data-id="{{ $met->id}}" data-toggle="modal" data-target="#exampleModal">Ajouter une note</button>

                    </th>
                  </tr>
                    @endforeach
                    @else
                        <h3 class="text-danger">Aucun mets n'est réservé pour le moment</h3>
                    @endif
                    <tr>
                        <th colspan="4" class="h4">


                                 </th>
                                 <th colspan="3" >
                                    Sous-total
                                     <span class="sous-total1 ml-4">{{$somme}}</span>
                                 </th>
                    </tr>
                </tbody>

            </table>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 90000">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Une note pour votre commande</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="note"></textarea>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button> --}}
          <button type="button" class="btn btn-primary">Ajouter</button>
        </div>
      </div>
    </div>
  </div>

                <div class="text-center my-3">
                    <a href="{{ route('reservations.cancel')}}" class="btn btn-danger rounded">Annuler toutes les réservations</a>
                </div>
            </div>
            <!-- End -->
          </div>
        </div>

        <div class="col-lg-8 d-grid gap-2 d-flex justify-content-between row">
            <button class="btn btn-primary" type="button"><a href="{{route('home')}}" style="color: white">Continuer mes achats</a></button>
            {{-- <button class="btn btn-primary" type="button"><a href="{{route('reservations.reservation')}}" style="color: white">Reserver</a></button> --}}
            <button type="button"  class="kkiapay-button btn btn-primary">Payer votre facture</button>
        </div>
      </div>
    </div>

  </div>
</div>
</div>

@else
<div class="container text-center shadow-lg col-8 col-md-6 mb-5 py-4">
    <h4 class="mb-3">Vous n'avez aucune réservation active.</h4>
<p>Vous pouvez visiter un restaurant de votre choix pour faire vos réservations.</p>
<p><a href=" {{route('home')}}" class="btn btn-primary my-4 rounded">Visitez maintenant </a></p>
</div>
@endif

{{-- sdk kkiapay --}}
<script src="https://cdn.kkiapay.me/k.js"></script>

<script amount="250"
    callback=""
    data=""
    url=""
    position="center"
    theme="#0000FF"
    sandbox="true"
    key="042121e0216011ec9d3a81cf5faf6ca6"
    src="https://cdn.kkiapay.me/k.js">
</script>

{{-- end sdk kkiapay --}}
@endsection



