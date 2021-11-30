<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class PayementController extends Controller
{

    public function success(){
        if (Cart::count()>0) {
            $lieu_livraison= '';
            $ville_livraison= '';
            $note='';
            if(session('deliveryInfo')){
                $lieu_livraison=session('deliveryInfo')['location'];
                $ville_livraison=session('deliveryInfo')['city'];
            }
            if(session('commande_note')){
                $note=session('commande_note');
            }
            foreach(Cart::content() as $met){
                Commande::create([
                    'user_id' => auth()->user()->id,
                    'lieu_livraison' => $lieu_livraison,
                    'ville_livraison' =>$ville_livraison,
                    'mets_title' =>$met->model->title,
                    'mets_price' =>$met->model->price,
                    'mets_quantity' =>$met->qty,
                    'mets_note' =>$note,
                    'compte_id' =>$met->model->compte_id,
                ]);
            }
            Cart::destroy();
        }
        return back();
    }
}
