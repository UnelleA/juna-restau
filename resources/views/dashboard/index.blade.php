@extends('dashboard.app')
@section('content')
@if (auth()->user()->type !=0)

<div class="pre-loader">
    <div class="pre-loader-box">

        <div class="loader-logo p-4 mb-3" style="border: 2px solid white; box-shadow: 0 0 5px rgba(0, 0, 0, .8)">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        @if(auth()->user()->compte)
                        <img src="{{asset('storage/'.auth()->user()->compte->image)}}" alt="logo ">
                        @else
                        <img src="{{asset('storage/images/10.jpg')}}" alt="default logo">
                        @endif
                    </div>
                    <div>
                        <h3 style="margin-top:10px; margin-left:35px; color: blue">
                            {{ auth()->user()->compte->name ?? 'Resto la joie'}}
                         </h3>
                    </div>
                </div>

           </div>
        <div class='loader-progress' id="progress_div">
            <div class='bar' id='bar1'></div>
        </div>
        <div class='percent' id='percent1'>0%</div>
        <div class="loading-text">
            Loading...
        </div>
    </div>
</div>
@else
<div class="pre-loader">
    <div class="pre-loader-box">

        <div class="loader-logo p-4 mb-3" style="border: 2px solid white; box-shadow: 0 0 5px rgba(0, 0, 0, .8)">
                <div class="d-flex justify-content-between align-items-center">
                    <div>

                        <img src="{{asset('storage/images/10.jpg')}}" alt="default logo">
                    </div>
                    <div>
                        <h3 style="margin-top:10px; margin-left:35px; color: blue">
                            TABLEAU DE BORD ADMINISTRATEUR
                         </h3>
                    </div>
                </div>

           </div>
        <div class='loader-progress' id="progress_div">
            <div class='bar' id='bar1'></div>
        </div>
        <div class='percent' id='percent1'>0%</div>
        <div class="loading-text">
            Loading...
        </div>
    </div>
</div>
@endif

@endsection
