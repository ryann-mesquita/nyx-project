<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>
</style>
<body>
    <div class="row">
    @foreach ($movies as $movie)
        <div class="col-6 col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ 'https://image.tmdb.org/t/p/w200/'.$movie['poster_path'] }}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{$movie['original_title']}}</h5>
                <p class="card-text">{{$movie['overview']}}</p>
                <a href="#" class="btn btn-primary">Alugar</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</body>
</html>
