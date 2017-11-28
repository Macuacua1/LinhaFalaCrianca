<!DOCTYPE html>
<html lang="en">
<head>
    <title>Encaminhamento do Caso</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 {{--<style>--}}
    {{--fieldset.scheduler-border {--}}
    {{--border: 1px groove #ddd !important;--}}
    {{--padding: 0 1.4em 1.4em 1.4em !important;--}}
    {{--margin: 100px 0 1.5em 0 !important;--}}
    {{---webkit-box-shadow:  0px 0px 0px 0px #000;--}}
    {{--box-shadow:  0px 0px 0px 0px #000;--}}
    {{--height: auto;--}}
    {{--width: 100%;--}}
    {{--}--}}

    {{--legend.scheduler-border {--}}
    {{--font-size: 1.2em !important;--}}
    {{--font-weight: bold !important;--}}
    {{--text-align: left !important;--}}
    {{--width:auto;--}}
    {{--padding:0 10px;--}}
    {{--border-bottom:none;--}}
    {{--}--}}
    {{--</style>--}}
</head>
<body>
<div class="container">
    <h2 style="color: #2ca02c">Linha Fala Criança</h2>
    <p><em><b>Ficha de Caso</b></em></p>
    {{--<table class="table table-condensed">--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th>Tipo de Utente</th>--}}
            {{--<th>Nome</th>--}}
            {{--<th>Genero</th>--}}
            {{--<th>Idade</th>--}}
            {{--<th>Provincia</th>--}}
            {{--<th>Distrito</th>--}}
            {{--<th>Localidade</th>--}}
            {{--<th>Idioma</th>--}}
            {{--<th>Contacto</th>--}}
            {{--<th>Relacao-Vitima</th>--}}
            {{--<th>Vive com</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@foreach ($contacto->utente as $utent)--}}
        {{--<tr>--}}
            {{--<td>{{$utent->tipo_utente}}</td>--}}
            {{--<td>{{$utent->nome}} {{$utent->apelido}}</td>--}}
            {{--<td>{{$utent->genero}}</td>--}}
            {{--<td>{{$utent->idade}}</td>--}}
            {{--<td>{{$utent->provincia_id ? $utent->provincia->provincianome:''}}</td>--}}
            {{--<td>{{$utent->distrito_id ? $utent->distrito->distritonome:''}}</td>--}}
            {{--<td>{{$utent->localidade_id ? $utent->localidade->localidadenome:''}}</td>--}}
            {{--<td>{{$utent->idioma}}</td>--}}
            {{--<td>{{$utent->cell1}}</td>--}}
            {{--<td>{{$utent->relacao_vitima}}</td>--}}
            {{--<td>{{$utent->vive_com}}</td>--}}
        {{--</tr>--}}
            {{--@endforeach--}}
        {{--</tbody>--}}
    {{--</table>--}}
    <div class="row" style="margin-bottom: 50px">
        <div class="col-md-4 col-sm-4"></div>
        <div class="col-md-4 col-sm-4"  >
            {{--<center> <img class="img-circle" style="width: 100px;" src="/img/lfc_logo.png" alt="" />--}}
            {{--<h2 style="color: #2ca02c">Linha Fala Criança</h2>--}}
            {{--</center>--}}
            {{--<p style="margin-left: 80px;margin-top: 20px"><em><b>Ficha de Caso</b></em></p>--}}

        </div>
        <div class="col-md-4 col-sm-4" style="margin-top: 100px">
            <span style="margin-top: 100px"><b>Ref. Caso nº: </b> {{$contacto->caso_id}}</span><br>
            <span style="margin-top: 100px"><b>Data: </b> {{\Carbon\Carbon::now()}}</span>
        </div>

    </div>
    @foreach ($contacto->utente as $utent)
        <legend class="scheduler-border">Dados do/a {{$utent->tipo_utente}}</legend>
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <dl class="dl-horizontal">
                <dt>Nome: </dt>
                <dd>{{$utent->nome}}</dd>
                <dt>Provincia: </dt>
                <dd>{{$utent->provincia_id ? $utent->provincia->provincianome:''}}</dd>
                <dt>Idioma: </dt>
                <dd>{{$utent->idioma}}</dd>
            </dl>
        </div>
        <div class="col-md-4 col-sm-4">
            <dl class="dl-horizontal">
                <dt>Genero: </dt>
                <dd>{{$utent->genero}}</dd>
                <dt>Distrito: </dt>
                <dd>{{$utent->distrito_id ? $utent->distrito->distritonome:''}}</dd>
                <dt>Contacto: </dt>
                <dd>{{$utent->cell1}}</dd>
            </dl>
        </div>
        <div class="col-md-4 col-sm-4">
            <dl class="dl-horizontal">
                <dt>Idade: </dt>
                <dd>{{$utent->idade}}</dd>
                <dt>Localidade: </dt>
                <dd>{{$utent->localidade_id ? $utent->localidade->localidadenome:''}}</dd>
                @if($utent->tipo_utente == 'Vitima' or $utent->tipo_utente == 'Contactante+Vitima')
                    <dt>Relacao com a Vitima:  </dt>
                    <dd>{{$utent->relacao_vitima}}</dd>
                    <dt>Vive com:  </dt>
                    <dd>{{$utent->vive_com}}</dd>
                @endif
            </dl>
        </div>
    </div>
    @endforeach
    <legend class="scheduler-border">Dados do Contacto</legend>
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <dl>
                <dt>Motivo/Ocorrência: </dt>
                <dd>{{$contacto->resumo_contacto}}</dd>

            </dl>
        </div>
        <div class="col-md-4 col-sm-4">
            <dl>
                <dt>Observação/ Comentário do(a) Conselheiro(a):</dt>
                <dd>{{$contacto->impressao_atendente}}</dd>

            </dl>
        </div>
        <div class="col-md-4 col-sm-4">
            <dl>
                <dt>Referência/Encaminhamento: </dt>
                {{--<dd>{{$cas->responsavel->respnome}}</dd>--}}
                <dt>Conselheiro(a): </dt>
                <dd>{{Auth::user()->nome}}</dd>

            </dl>
        </div>
    </div>
</div>

</body>
</html>
