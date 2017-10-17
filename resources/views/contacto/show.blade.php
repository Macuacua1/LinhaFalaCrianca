@extends('layouts.master')
@section('content')
    <div class="row no-m-t no-m-b">
        <div class="col s12 m12 l12">
            {{--<a href="{{route('user.create')}}" class="btn-floating btn-small waves-effect waves-light primary right"><i class="material-icons right">add</i></a>--}}

            <div class="card invoices-card">
                <div class="card-content">
                    <div class="card-options">
                        <input type="text" class="expand-search" placeholder="Search" autocomplete="off">
                    </div>
                    <span class="card-title">Utentes</span>
                    <table id="example" class="display responsive-table datatable-example">
                        <thead>
                        <tr>
                            <th>Tipo de Utente</th>
                            <th>Apelido</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Genero</th>
                            <th>Situacao Educacional</th>
                            <th>Vive Com</th>
                            {{--<th>Inserido por</th>--}}
                            <th>Accao</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contacto->utente as $utent)
                            <tr>
                                <td>{{$utent->tipo_utente}}</td>
                                <td>{{$utent->apelido}}</td>
                                <td>{{$utent->nome}}</td>
                                <td>{{$utent->idade}}</td>
                                <td>{{$utent->genero}}</td>
                                <td>{{$utent->situacao_educacional}}</td>
                                <td>{{$utent->vive_com}}</td>

                                <td><a href="{{route('contacto.show',$contacto->id)}}" class="btn-floating btn-tiny waves-effect waves-light green"  style="width: 30px;height: 30px"><i class="material-icons" style="padding-bottom: 10px;margin-bottom: 10px">visibility</i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection