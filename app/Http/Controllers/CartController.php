<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use App\Models\met;
use App\Models\Ville;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->put('redirectback', route('cart.index'));
        // dd(Cart::count());
        //$ville =  Ville::all();

        $ville = [];
        if (Cart::count() > 0) {
            $met = Cart::content()->first();
            $ville = DB::table('villes')->join('livraisons', 'villes.id', '=', 'livraisons.ville_id')->where('restaurant_id', $met->model->compte_id)->get();
        }

        return view('cart.index', compact('ville'));
    }

    public function deliverIsNo()
    {
        $amount = Cart::total();

        return $amount;
    }

    public function deliverIsYes(Request $request)
    {
        $deliveries = Livraison::where('id', $request->city)->first();
        $deliveryFees = $deliveries != null ? $deliveries->cout : 0;
        if($deliveries){
            $city = Ville::find($deliveries->ville_id);
            session()->put('deliveryInfo', [
                    'city' => $city->nom,
                    'location' => $request->location,
                    'amount' => $deliveryFees,
                ]);
        }

        $amount = Cart::subtotal() + $deliveryFees;

        return response()->json(['deliveryFees' => $deliveryFees, 'totalAmount' => $amount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    //    dd($request->id, $request->title, $request->price);
       $duplicate = Cart::search(function ($cartItem, $rowId) use ($request) { //rechercher un mets dans notre panier
            return $cartItem->id == $request->met_id;
       });
        if ($duplicate->isNotEmpty()) {
            return response()->json(['modif' => 'Ce met est ajouté déjà']);
        }
        //   dd($request->p_id);
        $met = met::find($request->met_id);
        Cart::add($met->id, $met->title, 1, $met->price)
        ->associate('App\Models\met');
        $request->session()->flash('showModal', 1);

        return response()->json(['success' => 'Le met a été bien ajouté']);
    }

    // fonction  publique modifier ()
    // {
    //     toast ( 'Post édité !' );
    //     return  redirect ( route ( 'posts.list' ));
    // };

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->json()->all();
        Cart::update($request->Id, (int) $request->qty);
        $subtotal = getPrice(Cart::subtotal());
        // dd($request->qty);

        return response()->json(['success' => 'La quantité du produit a ete mise ajout', 'subtotal' => $subtotal]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return back()->with('sucess', 'Le met a ete supprime');
    }

    // les mets ajoutes

    public function empty()
    {
        Cart::destroy();

        return back();
    }
}
