@extends('layouts.master')
@section('content')
<div class="container text-center shadow-lg col-8 col-md-6 mb-5 py-4">
    <div class="contact-content">
        <h3>Contactez-nous</h3>
        <hr>
        <img src="{{asset('img/border.png')}}" alt="" />
        <div class="contact-info d-flex align-items-center shadow">
            <div class="icon"><i class="icofont-phone"></i></div>
            <div class="info">
                <a href="#">+229 94183073</a>
                <a href="#">+229 51929617</a>
            </div>
        </div>
        <div class="contact-info d-flex align-items-center shadow">
            <div class="icon"><i class="icofont-email"></i></div>
            <div class="info">
                <a href="#">unelamous16@gmail.com</a>
                <a href="#">junaeats17@gmail.com</a>
            </div>
        </div>
        <div class="contact-info d-flex align-items-center shadow">
            <div class="icon"><i class="icofont-google-map"></i></div>
            <div class="info">
                <a href="#">Benin/ Abomey-Calavi</a>
            </div>
        </div>
    </div>
</div>
@endsection
