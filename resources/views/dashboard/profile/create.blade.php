@extends('dashboard.app')
@section('content')
<form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">

@csrf


  <div style="margin-top: 120px"style="margin-top: 120px">
<div class="form-group">
    <label for="text"></label>
    <input type="text" class="form-control" id="text" name="name" placeholder="Votre Pseudo">
    @error('name')
    {{ $errors->first('name')}}
    @enderror
  </div>
 <div class="form-group">
    <label for="exampleFormControlFile1"></label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" placeholder"Photo">
    @error('image')
    {{ $errors->first('image')}}
    @enderror
  </div>
  <button type="submit" class="btn btn-warning">Enregistrer</button>
</div>
</form>

@endsection
