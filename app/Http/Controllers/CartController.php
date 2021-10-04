<?php

namespace App\Http\Controllers;

use App\Models\met;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
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
        // dd('ok');
        // dd(Cart::count());
        return view('cart.index');
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
       $duplicate = Cart::search(function ($cartItem, $rowId) use ($request) { //rechercher un metion dans notre panier
            return $cartItem->id == $request->met_id;
       });
        if ($duplicate->isNotEmpty()) {

            return redirect()->route('mets.index')->with('success', 'le mets a été deja ajouté');
        }
        //   dd($request->p_id);
        $met = met::find($request->met_id);
        Cart::add($met->id, $met->title, 1, $met->price)
        ->associate('App\Models\met');
        $request->session()->flash('showModal',1);
        return redirect()->route('mets.index')->with('success', 'le mets a été bien ajouté');
    }

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
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        $data= $request->json()->all();
        Cart::update($rowId, $data['qty']);
dd($request->qty);
        Session::flash('success', 'La quantité du produit est passé à'. $data['qty']);
        return response()->json(['success'=>'Cart quantity has been updated']);
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
    
    public function reservation()
    {
        return view('cart.reservation');
    }
}


