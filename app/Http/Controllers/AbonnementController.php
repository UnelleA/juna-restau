<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Compte;
use App\Models\Notification;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function index()
    {
        $companies=Compte::all();
        return view('dashboard.abonnement.index', compact('companies'));
    }

    public function store(Request $request)
    {
        if($request->transaction_id){
            auth()->user()->compte()->update(
                ['status'=>1]
            );
            //notification
            $company=auth()->user()->compte;
            $admin=User::where('type', 0)->first();
            Notification::create([
                'message'=>"La compagnie . $company->name. vient d'activer son compte",
                'sender'=>auth()->user()->id,
                'user_id'=> $admin->id ?? 1
            ]);
            Notification::create([
                'message'=>"Vous venez d'activer votre compte",
                'user_id'=> auth()->user()->id,
                'sender'=>auth()->user()->id,
            ]);
            // Envoie de mail pour compte activé

            return redirect()->route('dashboard')->with('success', 'Votre compte a été activé avec succès');
        }
        return back()->with('fail', 'Echec de l\'activation du compte');
        // return view('abonnement.abonner');
    }

    public function activer(Request $request)
    {
        $compte=Compte::findOrFail($request->company);

        $affected = \DB::table('comptes')
              ->where('id', $compte->id)
              ->update(['status' => 1]);
        return back();
    }
    public function desactiver(Request $request)
    {
        $compte=Compte::findOrFail($request->company);
        $affected = \DB::table('comptes')
              ->where('id', $compte->id)
              ->update(['status' => 0]);
        return back();
    }

    public function livreur()
    {
        return view('dashboard.abonnement.livreur');
    }
}
