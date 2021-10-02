@extends('dashboard.app')
@section('content')
<div style="margin-top: 120px">

    <form action="" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="text">Nom du mets</label>
        <input type="text" value="{{$met->title}}" class="form-control" id="text" name="title" placeholder="Nom du mets">
        @error('title')
        {{ $errors->first('title')}}
        @enderror
    </div>
    <div class="form-group">
        <label for="text">Description du mets</label>
        <input type="text" value="{{$met->description}}" class="form-control" id="text" name="description" placeholder="Description du mets">
        @error('description')
        {{ $errors->first('description')}}
        @enderror
    </div>
    <div class="form-group">
        <label for="text">Catégorie du mets</label>
        {{-- <input type="text" class="form-control" id="text" name="title" placeholder="Catégorie du mets"> --}}
        <select name="category_id" id="category_id" class="custom-select" id="inputGroupSelect03">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($category->id==$met->category()->id)
                selected
            @endif>{{ $category->name}}</option>
            @endforeach
          </select>
        @error('category_id')
        {{ $errors->first('category_id')}}
        @enderror
    </div>
</div>
<div class="form-group">
    <label for="text">Prix du mets</label>
    <input type="number" value="{{$met->price}}" class="form-control" id="text" name="price" placeholder="Prix du mets">
    @error('price')
    {{ $errors->first('price')}}
    @enderror
</div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Choisissez l'image du mets</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
        @error('image')
        {{ $errors->first('image')}}
        @enderror
      </div>
      <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
</div>
@endsection
