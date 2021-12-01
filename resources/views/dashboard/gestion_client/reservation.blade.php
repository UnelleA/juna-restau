@extends('dashboard.app')
@section('content')
<div class="container">
   {{-- @php
        dd($categories);
   @endphp --}}
       <div class="card-box mb-30">
           <div class="pd-20">
               <h4 class="text-blue" style="text-align: center">Liste des réservations des clients.</h4>
           </div>
           <div class="pb-20 table-responsive">
               <table class="table hover multiple-select-row nowrap">
                <thead>
                    <tr class="row100 head">
                        <th class="cell100 column1">Num reserv</th>
                        <th class="cell100 column2">Date debut</th>
                        <th class="cell100 column14">Date fin</th>
                        <th class="cell100 column3">Nom du client</th>
                        <th class="cell100 column4">Contact du client</th>
                        <th class="cell100 column5">Lieu de livraison</th>
                        <th class="cell100 column6">Ville</th>
                        <th class="cell100 column7">Département</th>
                        <th class="cell100 column8">Nom du met</th>
                        <th class="cell100 column9">Prix Unitaire</th>
                        <th class="cell100 column10">Quantité du mets</th>
                        <th class="cell100 column11">Note ajoutéé</th>
                        <th class="cell100 column12">Montant</th>
                        {{-- <th class="cell100 column13">Action</th> --}}
                    </tr>
                </thead>
                       <tbody>

                       </tbody>
               </table>
           </div>
       </div>


   @endsection



