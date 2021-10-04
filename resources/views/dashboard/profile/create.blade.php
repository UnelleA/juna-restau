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
         </div>

        @enderror
        </div>
          <button type="submit" class="btn btn-warning">Enregistrer</button>
        </div>
        </form>
</div>

@endsection
