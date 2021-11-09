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
                      <td class="p-price first-row">{{ $met->model->price}}</td>
                      <td class="cart-title first-row" ><input type="number" min="1" value="1" name="qty" class="qty col-3" data-id="{{ $met->rowId}}"
                         class="custom-select" id="inputGroupSelect03">

                      <p class="item-price" data-price="{{ $met->model->price}}"></p>
                    </td>
                          {{-- mettre ajout la quantite du panier --}}

                    <td class="sous-total-{{ $met->rowId}}">
        {{( $met->model->price)}}
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
                <span>Voulez-vous etre livré ?</span>
  <button type="button" class="btn btn-primary btn-sm" data-id="{{ $met->model->id}}"data-toggle="modal"
     data-target="#confirmCmd">oui</button>
                <button type="button" class="btn btn-secondary btn-sm"><a href="{{route('login')}}"><span  style="color: white">non</span></a></button>
  <div class="modal fade" id="confirmCmd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 90000">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Veuillez renseignez un lieu de livraison.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            @csrf
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
        </form>
        </div>
        <div class="modal-footer">
            {{-- <button type="button"  class="kkiapay-button btn btn-primary">Validez</button> --}}
          <button type="button" class="btn btn-primary"><a href="{{route('login')}}"></a>Soumettre</button>
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



