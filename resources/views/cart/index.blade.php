@extends('layouts.master')
@section('content')
@if(Cart::count() > 0)
{{-- @include('laravel-bootstrap-toasts::message') --}}
<div class="px-4 px-lg-0">
    <div class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

            <!-- Shopping cart table -->
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th class="p-name">Nom du mets</th>
                        <th>Prix unitaire</th>
                        <th>Quantité</th>
                        <th>Montant</th>
                        <th>Supprimé</th>

                        <th><i class="ti-close"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @if(Cart::count()>0)
                    @foreach(Cart::content() as $met)
                    <tr>
                    <td>
        <img src="{{Storage::url($met->model->image)}}" alt="" style = " height:70px; width:70px">
                    </td>
                    <td class="cart-title first-row">
                        <h5>{{ $met->model->title }}</h5>
                    </td>
                      <td class="p-price first-row">{{ $met->model->price}} F CFA</td>
                      <td class="cart-title first-row" ><input type="number" min="1" value="{{ $met->qty}}" name="qty" class="qty col-3" data-id="{{ $met->rowId}}"
                         class="custom-select" id="inputGroupSelect03">

                      <p class="item-price" data-price="{{ $met->model->price}}"></p>
                    </td>
                          {{-- mettre ajout la quantite du panier --}}

                    <td class="sous-total-{{ $met->rowId}}">
        {{ $met->model->price *  $met->qty}}
                    </td>
                      <form action="{{ route('cart.destroy', $met->rowId) }}" method="post">
                            @csrf
                            @method('DELETE')
        <td class="close-td" style="color: red"><button type="submit" class="icofont-delete">
            </button></td>
        {{-- <td class="close-td"><button type="submit"><i class="ti-close text-danger"></i></button></td> --}}
                    </form>
                    <th>
                        <button type="button" class="btn btn-primary btn-note" data-id="{{ $met->model->id}}" data-toggle="modal" data-target="#exampleModal">Ajouter une note</button>
                    </th>
                  </tr>
                    @endforeach
                    @else
                        <h3 class="text-danger">Aucun mets ajouté au panier</h3>
                    @endif
                    <tr>
                        <th colspan="4" class="h4">


                                 </th>
                                 <th colspan="3" >
                                    Sous-total
                                     <span class="sous-total ml-4">{{getPrice(Cart::subtotal())}}</span>
                                 </th>
                    </tr>
                </tbody>

            </table>

  <!-- Modal ajout de note -->
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
                <a href="{{ route('cart.empty')}}" class="btn btn-danger rounded">Videz le panier</a>
            </div>
            </div>
            <!-- End -->
          </div>
        </div>
            <div class="col-lg-8 d-grid gap-2 d-flex justify-content-between row">
                <button class="btn btn-primary" type="button"><a href="{{route('home')}}" style="color: white">Continuer mes achats</a></button>

                {{--livraison  --}}


                @auth
                <span>Voulez-vous etre livré ?</span>
                <button type="button" class="btn btn-primary btn-sm" data-id="{{ $met->model->id}}"data-toggle="modal" data-target="#confirmCmd">oui</button>
                    <button type="button" style="color: white" class="btn btn-secondary btn-sm btn-non" data-id="" data-toggle="modal" data-target="#non">non</button>
                @endauth

                @guest
                <a href="{{ route('login')}}" class="btn btn-primary btn-sm" >Connectez-vous pour finaliser votre achat</a>

                @endguest

     {{-- modal du oui --}}
  <div class="modal fade" id="confirmCmd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 90000">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Veuillez remplir les champs suivants:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
       <form action="">
            @csrf
            <div>
                <small class="message-error" class="text-danger text-italic"></small>
            </div>
            <div class="form-group row">
                <label for="lieu" class="col-md-4 col-form-label text-md-right">{{ __('Lieu de livraison') }}</label>

                <div class="col-md-6">
                    <input id="lieu" type="text" class="form-control @error('lieu') is-invalid @enderror"
                     name="name" value="{{ old('lieu') }}" required autocomplete="name" autofocus>

                    @error('lieu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>



            <div class="form-group row">
                <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville du lieu') }}</label>

                <div class="col-md-6">
                    <select id="ville" class="form-control @error('ville') is-invalid @enderror"
                     name="ville" value="{{ old('ville') }}" required autocomplete="ville" autofocus>

                    <option value="">Choisissez la ville</option>
                                        @foreach($ville as $Ville)
                    <option value="{{$Ville->id}}" >{{$Ville->nom}}</option>
                                        @endforeach
                                    </select>
                                        @error('ville')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>
            </div>
        </form>


        </div>
        <div class="modal-footer">
            {{-- faire sortir la facture de sa commande avec lieu de livraison --}}
            <button type="summit" style="color: white"  class="btn btn-secondary btn-sm btn-soumet" data-id="" data-toggle="modal" data-target="#soumet">Soumettre</button>
        </div>
      </div>
    </div>
  </div>

  {{-- modal du boutton soumettre --}}
  <div class="modal fade" id="soumet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 90000">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Procéder au paiement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center" >
            <p>Sous-total du panier: <strong> {{ Cart::subtotal() }} </strong></p>
            <p>Frais de livraison: <strong id="delivery-fees"> </strong></p>
            <p>Montant total à payer : <strong id="total-amount"></strong></p>
            <p>
                {{-- <strong id="modal-non"></strong> --}}
            </p>
            <p>
        <button style="margin-left: 800px" type="button"  class="kkiapay-button btn btn-primary rounded mx-auto my-4 payment-btn disabled" >Passez au paiement</button>
            </p>
            <div>
                <i class="message-error" class="text-danger text-italic"></i>
            </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

{{-- modal du non --}}
  <div class="modal fade" id="non" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 90000">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Procéder au paiement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center" >
            <p>Montant total à payer :</p>
            <p>
                <strong id="modal-non"></strong>
            </p>
            <p>
        <button style="margin-left: 800px" type="button"  class="kkiapay-button btn btn-primary rounded mx-auto my-4">Passez au paiement</button>
            </p>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


@else
<div class="container text-center shadow-lg col-8 col-md-6 mb-5 py-4">
    <h4 class="mb-3">Votre panier est vide.</h4>
<p>Vous pouvez visiter un restaurant de votre choix pour faire vos achats.</p>
<p><a href=" {{route('home')}}" class="btn btn-primary my-4 rounded">Visitez maintenant </a></p>
</div>

@endif

{{-- sdk kkiapay --}}


<script id="paymentOperator" amount=""
    callback="{{ route('payement.reussi') }}"
    data=""
    {{-- name="{{ auth()->user()->name ?? '' }}" --}}
    {{-- phone="{{ auth()->user()->contact ?? '' }}"
    url="{{asset('storage/images/logoJR.png')}}" --}}
    position="center"
    theme="#00FF"
    sandbox="true"
    key="042121e0216011ec9d3a81cf5faf6ca6"
    src="https://cdn.kkiapay.me/k.js">
</script>
<script src="https://cdn.kkiapay.me/k.js"></script>

@endsection



