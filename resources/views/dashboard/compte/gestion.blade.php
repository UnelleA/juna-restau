@extends('dashboard.app')
@section('content')
<style>

    .container form {

border: 1px solid white;
box-shadow: 1px 1px 2px 2px black;
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
    <form action="{{ auth()->user()->compte ? route('compte.update',auth()->user()->compte ) : route('compte.store')}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @if (auth()->user()->compte)
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="text">Nom de votre restaurant:</label>
        @if ( auth()->user()->compte)
        <input type="text" class="form-control" id="text" name="name" value="{{ auth()->user()->compte->name ?? ''}}" placeholder="Nom de la compagnie">
        @else
        <input type="text" class="form-control" id="text" name="name" placeholder="Nom de la compagnie">

        @endif
        @error('name')
        {{ $errors->first('name')}}
        @enderror
    </div>

      <div class="form-group">
        <label for="text">Description</label>
        @if ( auth()->user()->compte)
        <input type="text" class="form-control" id="text" name="description" value=" {{auth()->user()->compte->description ?? '' }}" placeholder="Entrez votre adresse, contact, email">
        @else
        <input type="text" class="form-control" id="text" name="description"  placeholder="Entrez votre adresse, contact, email">
        @endif
        @error('description')
        {{ $errors->first('description')}}
        @enderror
      </div>

  <div class="form-group">
    <label for="text">Spécialités cullinaires:</label>
    @if ( auth()->user()->compte)
    <input type="text" class="form-control" id="text" name="specialite" value=" {{auth()->user()->compte->specialite ?? '' }}"  placeholder="Vos specialités cullinaires">
    @else
    <input type="text" class="form-control" id="text" name="specialite" placeholder="Vos specialités cullinaires">
    @endif
    @error('specialite')
    {{ $errors->first('specialite')}}
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Logo du restaurant:</label>
    @if ( auth()->user()->compte)
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" value="{{ auth()->user()->compte->image ?? ''}}">
    @else
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
    @endif
    @error('image')
    {{ $errors->first('image')}}
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Image du restaurant en 3D:</label>
    @if ( auth()->user()->compte)
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="video" value="{{ auth()->user()->compte->video ?? ''}}">
    @else
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="video">
    @endif
    @error('video')
    {{ $errors->first('video')}}
    @enderror
  </div>

  @if ( auth()->user()->compte)
  <button type="submit" class="btn btn-primary">Enregistrer Les Modifications</button>
  @else
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  @endif
    </form>
</div>
  </div>

@endsection
