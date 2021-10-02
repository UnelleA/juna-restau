@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="row">
          <div class="col order-last">
            <span class="specialite">Specialités culinaires</span>
            <p>
                CUISINES
                Africaine
            </p>
          </div>

          <div class="col">
            <div class="border border-warning border border-5">
            <span class="menu-du-jour">Menu du jour</span>
            <span class="menu">Riz creole+Poulet</span>
            <span class="menu">Riz creole+Poulet</span>
            <span class="menu">Riz creole+Poulet</span>
            <span class="menu">Riz creole+Poulet</span>
            <span class="menu">Riz creole+Poulet</span>
            <span class="menu">Riz creole+Poulet</span>
            <span class="menu">Riz creole+Poulet</span>
            <span class="menu">Riz creole+Poulet</span>
            <span class="menu">Riz creole+Poulet</span>
            <span class="menu">Riz creole+Poulet</span>
            <span class="menu">Riz creole+Poulet</span>
            <div class="field">
                <div class="control">
                  <button class="button is-danger" type="submit" style="margin-left: 14em"><a href="{{route('mets.index')}}">Detail du menu</a></button>
                </div>
            </div>
            </div>
          </div>

          <div class="col order-first">
            <span class="description">Description</span>
            <p>
               <strong>Derrière l'ambassade d'Allemagne - Cotonou - Bénin</strong>
                REPAS
                Déjeuner, Dîner
                FONCTIONNALITÉS
                Réservations, Commandes
            </p>
          </div>
        </div>
      </div>

@endsection
