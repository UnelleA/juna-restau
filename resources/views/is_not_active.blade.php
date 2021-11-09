<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>
<body>
<div class="container my-5 alert alert-danger text-center pt-5 " style="height: 100%;">
    <p class=" ">
        Désolé ! La compagnie <strong>{{ $company->name}}</strong> n'est pas encore active
    </p>
    <div class="my-3 mx-auto text-center">
        <a href="{{ route('home')}}"  class="btn btn-primary rounded">Retour</a>
    </div>
</div>
</body>
</html>
