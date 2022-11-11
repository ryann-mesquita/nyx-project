@extends('admin.master.master')

@section('content')
<div style="flex-basis: 100%;">
    <section class="dash_content_app">
        <header class="dash_content_app_header">
            <h2 class="icon-tachometer">Dashboard</h2>
        </header>


    </section>

    <section class="dash_content_app" style="margin-top: 40px;">
        <header class="dash_content_app_header">
            <h2 class="icon-tachometer">Últimos Contratos Cadastrados</h2>
        </header>

        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th class="sorting">Filme</th>
                        <th>Nome Locatário</th>
                        <th>E-mail Locatário</th>
                        <th>Data de aluguel</th>
                        <th>Expira em</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies_rented as $movie )
                        <tr>
                            <td>{{ $movie->movie_name }}</td>
                            <td>{{ $movie->name }}</td>
                            <td>{{ $movie->email }}</td>
                            <td>{{ date('d-m-Y', strtotime($movie->created_at)) }} </td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($movie->created_at.'+ 2 days')) }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
    <script>

    </script>
@endsection
