<div class="cat-product" style="margin-left: 300px; margin-top: -200px">
    <div class="cart-pro-head">
        <h2 class="sec-head">Mets</h2>
    </div>
    <div class="row" id="list_product">
        

             {{-- <div class="col-xl-4 col-md-6"> --}}
            <div class="col-xl-4 col-md-4">
             <div class="pro-box">
                <h4 style="text-align: center">{{$met->title}}</h4>
                 <div class="pro-img">
                        <img src="{{Storage::url($met->image)}}" alt="">
                     </div>
                <div class="product-details-wrap">
                    <div class="product-details">
                            <span>{{$met->created_at->format('d/m/y')}}</span>
                            <hr>

                            <hr>
                        <p class="pro-pricing">
                            {{$met->price}}
                        </p>
                    </div>
                    <hr>
                    <div class="product-details">
                        <p>{{$met->description}}</p>
                    </div>

                </div>
                {{-- <form id="myformcart"  novalidate="">
                    @csrf
                    <input type="hidden" name="met_id" value="{{$met->id}}">--}}
                    <div class="row d-flex justify-content-around">
                        <button  class=" mx-0 btn btn-sm btn-primary ajout" id="ajout{{$met->id}}" data-id="{{$met->id}}" style="margin-top: 20px; margin-left: 50px" >Ajouter au panier</button>
                    <button  class=" mx-0 btn btn-sm btn-success reservation" id="reservation{{$met->id}}" data-id="{{$met->id}}" style="margin-top: 20px; margin-left: 50px" >Réserver</button>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
        @endforeach

    </div>
</?php>
{!! $mets->render() !!}
