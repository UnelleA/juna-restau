@extends('layouts.master')
@section('content')
@if(Cart::count() > 0)

<div class="px-4 px-lg-0">
    <div class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

            <!-- Shopping cart table -->
            <div class="table-responsive">

              <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th class="p-name">mets title</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Sous-total</th>
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
                        {{-- <td class="cart-pic first-row"><img src="{{ asset('images/2.jpg') }}" width="100" height="100" alt=""></td> --}}
                      <td class="cart-title first-row">
                          <h5>{{ $met->model->title }}</h5>
                      </td>
                      <td class="p-price first-row">{{ $met->model->price}}</td>

                          {{-- mettre ajout la quantite du panier --}}

                      <td class="cart-title first-row" ><select name="qty" id="qty" data-id="{{$met->rowId}}"
                         class="custom-select" id="inputGroupSelect03">
                        @for($i = 1; $i <=1000; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                      </select>
                    </td>
                      {{-- <td class="border-0 align-middle"> --}}

                          {{-- mettre ajout la quantite du panier --}}

                    <td>
        {{( $met->model->price)}}

        {{-- {{getPrice(Cart::subtotal())}} --}}
                    </td>
                      {{-- <td class="total-price first-row">$60.00</td> --}}
                      <form action="{{ route('cart.destroy', $met->rowId) }}" method="post">
                            @csrf
                            @method('DELETE')
        <td class="close-td" style="color: red"><button type="submit" class="icofont-delete">
            </button></td>
        {{-- <td class="close-td"><button type="submit"><i class="ti-close text-danger"></i></button></td> --}}
                    </form>
                  </tr>
                    @endforeach
                    @else
                        <h3 class="text-danger">Aucun mets ajouté au panier</h3>
                    @endif
                </tbody>
            </table>

            </div>
            <!-- End -->
          </div>
        </div>

        <div class="row py-5 p-4 bg-white rounded shadow-sm">
          <div class="col-lg-6">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" style="text-align: center" class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Les précisions sur votre commande</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
          </div>
          <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold" style="text-align: center">Détails de la commande </div>
            <div class="p-4">
              <ul class="list-unstyled mb-4">
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-total </strong><strong>{{getPrice(Cart::subtotal())}}</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe de livraison</strong>
                    <strong>{{getPrice(Cart::tax())}}</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                  <h5 class="font-weight-bold">{{getPrice(Cart::total())}}</h5>
                </li>
              </ul>
        </div>
            </div>
            <div class="col-lg-8 d-grid gap-2 d-flex justify-content-between row">
                <button class="btn btn-primary" type="button"><a href="menu.index" style="color: white">Continuer mes achats</a></button>
                <button class="btn btn-primary" type="button"><a href="/reservation" style="color: white">Reserver</a></button>
                <button type="button"  class="kkiapay-button btn btn-primary">Payer votre facture</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


@else
<div class="col-md-12">
    <h5>Votre panier est vide.</h5>
<p>Vous pouvez visiter un <a href=" {{route('menu.index')}}">restaurant </a>de votre choix pour faire vos achats.</p>
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
