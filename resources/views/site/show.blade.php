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
        body {
    padding-top: 50px; /* Padding for .navbar-fixed-top. Change value if navbar height changes. Remove if using .navbar-static-top. */
}

.navbar{
    border-color: black;
    background-color: black;
    top: 0;
    border-width: 0 0 1px;
    margin-top: -50px;
}

.portfolio-item {
    margin-bottom: 25px;
}

.footer-blurb {
    padding: 30px 0;
	text-align: center;
    background-color: lightskyblue;
}

.footer-blurb h3 {
    color: midnightblue;
    }

.footer-blurb-item {
    padding: 30px 0;
    }

.copyright {
	background-color: #fff;
	text-align: center;
	padding: 30px 0;
}
</style>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <span class="glyphicon glyphicon-fire"></span>
                    Nyx Technology
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li>
                <a href="#">About</a>
                </li>
                <li>
                <a href="#">Services</a>
                </li>
                <li class="active">
                <a href="#">Portfolio</a>
                </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li>
                <a href="#">Contact</a>
                </li>
                </ul>
            </div>

        </div>

    </nav>

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Projeto Filmes
                <small>Nyx</small>
                </h1>
                <hr size=5>
                </div>
            </div>

            <div class="row">
                    <div class="col-6 col-md-4" style="padding: 20px;">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ 'https://image.tmdb.org/t/p/w200/'.$movie['poster_path'] }}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">{{$movie['original_title']}}</h5>
                            <p class="card-text"><b>Ano: {{ (isset($movie['release_date'])) ? date('Y', strtotime($movie['release_date'])) : ''}}</b></p>
                            <p class="card-text">{{str_limit(strip_tags($movie['overview']), 100)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-8" style="padding: 20px;">
                        <form name="login" action="{{ route('site.store') }}" method="post" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nome</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                            </div>

                            <input type="hidden" class="form-control" id="exampleInputPassword1" name="movie_id" value="{{$movie['id']}}">
                            <input type="hidden" class="form-control" id="exampleInputPassword1" name="movie_name" value="{{$movie['original_title']}}">
                            <button type="submit" class="btn btn-primary" style="margin-left: 493px;">Confirmar Aluguel</button>
                            <a href="{{ URL::previous() }}" class="btn btn-secondary">Voltar</a>
                        </form>
                    </div>
            </div>

        </div>

        <footer>
            <div class="footer-blurb">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 footer-blurb-item">
                            Footer
                        </div>
                        <div class="col-sm-4 footer-blurb-item">

                        </div>
                        <div class="col-sm-4 footer-blurb-item">

                        </div>
                    </div>

                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>Copyright © Ryann Mesquita 2022</p>
                </div>
            </div>
        </footer>


</body>
</html>
