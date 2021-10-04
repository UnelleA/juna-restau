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

    <form action="{{route('menu.store')}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Nom du mets</label>
            <input type="text" class="form-control" value="{{ old('title')}}" id="title" name="title" placeholder="Nom du mets">
            @error('title')
            {{ $errors->first('title')}}
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description du mets</label>
            <input type="text" class="form-control" id="description" value="{{ old('description')}}" name="description" placeholder="Description du mets">
            @error('description')
            {{ $errors->first('description')}}
            @enderror
        </div>
        <div class="form-group">
            <label for="text">Catégorie du mets</label>
            {{-- <input type="text" class="form-control" id="text" name="title" placeholder="Catégorie du mets"> --}}
            <select name="category_id" id="category_id" value="{{ old('category_id')}}" class="custom-select" id="inputGroupSelect03">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name}}</option>
                @endforeach
              </select>
            @error('category_id')
            {{ $errors->first('category_id')}}
            @enderror
        </div>
    <div class="form-group">
        <label for="price">Prix du mets</label>
        <input type="number" class="form-control" value="{{ old('price')}}" id="price" name="price" placeholder="Prix du mets">
        @error('price')
        {{ $errors->first('price')}}
        @enderror
    </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Choisissez l'image du mets</label>
            <input type="file" class="form-control-file" value="{{ old('image')}}" id="exampleFormControlFile1" name="image">
            @error('image')
            {{ $errors->first('image')}}
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>

@endsection
