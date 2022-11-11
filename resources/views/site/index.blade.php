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

#divBusca{
  background-color:#E0EEEE;
  border:solid 2px #1a75dd;
  border-radius:10px;
  width:300px;
  height:32px;
}

#txtBusca{
  float:left;
  background-color:transparent;
  padding-left:5px;
  font-size:18px;
  border:none;
  height:32px;
  width:191px;
}

#btnBusca{
  border:none;
  float:left;
  height:28px;
  border-radius:0 7px 7px 0;
  width:105px;
  font-weight:bold;
  background:#0612c0;
  color: white
}

</style>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('admin.login') }}">Login</a>">
                </a>
            </div>

            <form name="login" action="{{ route('site.search') }}" method="post" autocomplete="off">
                @csrf
                <div id="divBusca">
                    <input type="text" name="search" id="txtBusca" placeholder="Buscar..."/>
                    <button id="btnBusca">Buscar</button>
                </div>
            </form>

        </div>

    </nav>

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Projeto Filmes
                <small> Nyx Technology</small>
                </h1>
                <hr size=5>
                </div>
            </div>
            @if(session('mensagem'))
                <div class="alert alert-success">
                    <p>{{session('mensagem')}}</p>
                </div>
            @endif
            <div class="row">
                @foreach ($movies as $movie)
                    <div class="col-6 col-md-4" style="padding: 20px;">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ 'https://image.tmdb.org/t/p/w200/'.$movie['poster_path'] }}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">{{$movie['original_title']}}</h5>
                            <p class="card-text"><b>Ano: {{ (isset($movie['release_date'])) ? date('Y', strtotime($movie['release_date'])) : ''}}</b></p>
                            <p class="card-text">{{str_limit(strip_tags($movie['overview']), 100)}}</p>
                            <a href="{{route('site.show', $movie['id'])}}" class="btn btn-primary">Alugar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
