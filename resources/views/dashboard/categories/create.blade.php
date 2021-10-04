@extends('dashboard.app')
@section('content')
<style>

    .container form {

border: 1px solid white;
box-shadow:box-shadow: 10px 10px 10px white;
margin-left: 280px;
background-color: dark-gray;
width: 500px;
/* height: 200px; */

}

.form-group{
text-align: center;

}
.btn{
margin-left: 170px;
}
</style>
<div class="container">
    <div style="margin-top: 120px">
        <form action="{{route('categories.store')}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="text">Nom de la categorie de repas</label>
            <input type="text" class="form-control" id="text" name="name" placeholder="Nom de la categorie de repas">
            @error('name')
            {{ $errors->first('name')}}
            @enderror
        </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Choisissez l'image de la categorie</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
            @error('image')
            {{ $errors->first('image')}}
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection
