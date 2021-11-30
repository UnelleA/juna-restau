@extends('layouts.master')
@section('content')

<div >
    <img src="{{Storage::url($company->video)}}" class="rounded" alt="..." style="width: 90px; height:90px">
</div>
@endsection

