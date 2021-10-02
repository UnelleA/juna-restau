@extends('dashboard.app')
@section('content')
<div style="margin-top: 120px">
    <form action="{{route('categories.update',$category)}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="text">Nom de la categorie de repas</label>
        <input type="text" value="{{$category->name}}" class="form-control" id="text" name="name" placeholder="Nom de la categorie de repas">
        @error('name')
        {{ $errors->first('name')}}
        @enderror
    </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Choisissez l'image de la categorie</label>
        <input type="file" value="{{$category->image}}" class="form-control-file" id="exampleFormControlFile1" name="image">
        @error('image')
        {{ $errors->first('image')}}
        @enderror
      </div>
      <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
</div>
@endsection
