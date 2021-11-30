<?php

namespace App\Http\Controllers;

use App\Models\met;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




     public function index()
    {
        $count=0;
        $reservations=[];
        if(session('reservation')){
            $reservations=session('reservation');
            $count=count($reservations);
        }
        return view('cart.reservation', compact('count', 'reservations'));
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

        //   dd($request->p_id);
        $met = met::find($request->met_id);
        if(session('reservation')){
            $reservations=session('reservation');
            $cont=0;
            foreach($reservations as $reservation){
                if($reservation->id != $request->met_id){
                    $cont +=1;


                }else{
                    // toast('message', 'title');
                    return response()->json(['modif'=>'Le mets est déjà reservé']);

                }
                if($cont == count(session('reservation')) ){
                    session()->push('reservation', $met);
                }
            }

        }else{
            session()->put('reservation',[ $met]);
        }

        return response()->json(['success'=>'Le mets a été bien reservé']);


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
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $Id)
    // {
    //     $data = $request->json()->all();
    //     Cart::update($Id, $request->qty);
    //     // dd($request->qty);
    //     Session::flash('success_message', 'La quantité du produit a ete mise ajout');

    //     return response()->json(['success'=>true]);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        if (session('reservation')) {
            $size=count(session('reservation'));
        if($rowId >=0 && $rowId < $size){
            $tmp=session()->pull('reservation');
            array_splice($tmp, $rowId, 1);
            session(['reservation'=> $tmp]);
            unset($tmp);
        return back()->with('sucess', 'Le met a ete supprime');

        }
        }

        return back();
    }

    // les mets ajoutes

    public function empty()
    {
        session()->forget('reservation');
        return back();
    }

    public function update(Request $request)
    {
        $data = $request->json()->all();
        Cart::update($request->Id, $request->qty);
        $subtotal=getPrice(Cart::subtotal());
        // dd($request->qty);

        return response()->json(['success'=>'La quantité du produit a ete mise ajout', 'subtotal'=>$subtotal]);
    }
}
