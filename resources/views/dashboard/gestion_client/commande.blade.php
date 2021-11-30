@extends('dashboard.app')
@section('content')
<div class="container">
   {{-- @php
        dd($categories);
   @endphp --}}
       <div class="card-box mb-30">
           <div class="pd-20">
               <h4 class="text-blue" style="text-align: center">Liste des commandes des clients.</h4>
           </div>
           <div class="pb-20 table-responsive">
               <table class="table hover multiple-select-row nowrap">
                <thead>
                    <tr class="row100 head">
                        <th class="cell100 column1">Num cmd</th>
                        <th class="cell100 column2">Date cmd</th>
                        <th class="cell100 column3">Nom du client</th>
                        <th class="cell100 column4">Contact du client</th>
                        <th class="cell100 column5">Lieu de livraison</th>
                        <th class="cell100 column6">Ville</th>
                        <th class="cell100 column8">Nom du mets</th>
                        <th class="cell100 column9">Prix Unitaire</th>
                        <th class="cell100 column10">Quantité du mets</th>
                        <th class="cell100 column11">Note ajoutéé</th>
                        <th class="cell100 column12">Montant</th>
                        <th class="cell100 column13">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $commande)
                    <tr class="row100 body">
                        <td class="cell100 column1">{{$loop->index +1}}</td>
                        <td class="cell100 column2">{{$commande->created_at->format('d/m/y')}}</td>
                        <td class="cell100 column3">{{$commande->user->name}}</td>
                        <td class="cell100 column3">{{$commande->user->contact}}</td>
                        <td class="cell100 column3">{{$commande->lieu_livraison}}</td>
                        <td class="cell100 column3">{{$commande->ville_livraison}}</td>
                        <td class="cell100 column3">{{$commande->mets_title}}</td>
                        <td class="cell100 column3">{{$commande->mets_price}} F CFA</td>
                        <td class="cell100 column3">{{$commande->mets_quantity}}</td>
                        <td class="cell100 column3">{{$commande->mets_note}}</td>
                        <td class="cell100 column3">{{$commande->mets_price * $commande->mets_quantity}} F CFA</td>
                    </tr>
                    @endforeach
                </tbody>
               </table>
           </div>
       </div>


   @endsection
