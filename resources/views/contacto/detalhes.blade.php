
@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Detalhes do Contacto</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .row -->

    {{--<div class="row">--}}

        {{--<div class="col-sm-12 col-md-12">--}}
            {{--<div class="panel-group" id="accordion6">--}}
                {{--<div class="card panel">--}}
                    {{--<div class="card-head style-primary-light collapsed" data-toggle="collapse" data-parent="#accordion6" data-target="#accordion6-0">--}}
                        {{--<header>Dados do Contacto</header>--}}
                        {{--<div class="tools">--}}
                            {{--<a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="accordion6-0" class="collapse">--}}
                        {{--<div class="card-body">--}}
                            {{--<dl class="dl">-horizontal--}}
                                {{--<div class="col-md-4 col-sm-4">--}}
                                    {{--<dt>Tipo :</dt>--}}
                                    {{--<dd>{{$contactos->tipo_contacto}}</dd>--}}
                                    {{--<dt>Estado :</dt>--}}
                                    {{--<dd>{{$contactos->estado_contacto}}</dd>--}}
                                    {{--<dt>Resumo :</dt>--}}
                                    {{--<dd>{{$contactos->resumo_contacto}}</dd>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 col-sm-4">--}}
                                    {{--<dt>Impressao do(a) Atendente :</dt>--}}
                                    {{--<dd>{{$contactos->impressao_atendente}}</dd>--}}
                                    {{--<dt>Motivo :</dt>--}}
                                    {{--<dd>{{$contactos->motivo->motivonome}}</dd>--}}
                                    {{--<dt>Registado por :</dt>--}}
                                    {{--<dd>{{$contactos->user->nome}}</dd>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 col-sm-4">--}}
                                    {{--<dt>Criado a :</dt>--}}
                                    {{--<dd>{{$contactos->created_at}}</dd>--}}
                                    {{--<dt>Descricao de Antecedentes :</dt>--}}
                                    {{--<dd>{{$contactos->desc_antecedentes}}</dd>--}}
                                    {{--<dt>Caso :</dt>--}}
                                    {{--@if($contactos->caso_id>0)--}}
                                    {{--<dd>{{$contactos->caso_id}}</dd>--}}
                                        {{--@else--}}
                                    {{--<dd></dd>--}}
                                        {{--@endif--}}
                                {{--</div>--}}

                            {{--</dl>--}}


                        {{--</div>--}}
                {{--</div><!--end .panel -->--}}
                    {{--@foreach ($contactos->utente as $utent)--}}
                {{--<div class="card panel">--}}
                    {{--<div class="card-head style-default collapsed" data-toggle="collapse" data-parent="#accordion6" data-target="#accordion6-{{$utent->id}}">--}}
                        {{--<img src="/img/modules/materialadmin/avatar2666b.jpg?1422538624" alt="" style="width: 30px!important;height: 30px!important;border-radius: 30px!important;vertical-align: middle!important;border: 0;!important;margin-left: 10px!important;"/>--}}
                        {{--<header>{{$utent->tipo_utente}}</header>--}}
                        {{--<div class="tools">--}}
                            {{--<a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="accordion6-{{$utent->id}}" class="collapse">--}}
                        {{--<div class="card-body">--}}
                            {{--<dl class="dl-horizontal">--}}
                                {{--<div class="col-md-4 col-sm-4">--}}
                                    {{--<dt>Nome :</dt>--}}
                                    {{--<dd>{{$utent->nome}}</dd>--}}
                                    {{--<dt>Provincia :</dt>--}}
                                    {{--@if($utent->provincia_id)--}}
                                    {{--<dd>{{$utent->provincia->provincianome}}</dd>--}}
                                        {{--@else--}}
                                        {{--<dd></dd>--}}
                                    {{--@endif--}}
                                    {{--<dt>Idioma :</dt>--}}
                                    {{--<dd>{{$utent->idioma}}</dd>--}}
                                    {{--<dt>Idade :</dt>--}}
                                    {{--<dd>{{$utent->idade}}</dd>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 col-sm-4">--}}
                                    {{--<dt>Apelido :</dt>--}}
                                    {{--<dd>{{$utent->apelido}}</dd>--}}
                                    {{--<dt>Distrito :</dt>--}}
                                    {{--@if($utent->distrito_id)--}}
                                    {{--<dd>{{$utent->distrito->distritonome}}</dd>--}}
                                    {{--@else--}}
                                        {{--<dd></dd>--}}
                                    {{--@endif--}}
                                    {{--<dt>Cell princi. :</dt>--}}
                                    {{--<dd>{{$utent->cell1}}</dd>--}}
                                    {{--<dt>Situacao Educacio. :</dt>--}}
                                    {{--<dd>{{$utent->situacao_educacional}}</dd>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 col-sm-4">--}}
                                    {{--<dt>Genero :</dt>--}}
                                    {{--<dd>{{$utent->genero}}</dd>--}}
                                    {{--<dt>Localidade :</dt>--}}
                                    {{--@if($utent->localidade_id)--}}
                                    {{--<dd>{{$utent->localidade->localidadenome}}</dd>--}}
                                    {{--@else--}}
                                        {{--<dd></dd>--}}
                                    {{--@endif--}}
                                    {{--<dt>Cell altern. :</dt>--}}
                                    {{--<dd>{{$utent->cell2}}</dd>--}}
                                    {{--<dt>Relacao vitim. :</dt>--}}
                                    {{--<dd>{{$utent->relacao_vitima}}</dd>--}}
                                {{--</div>--}}
                            {{--</dl>--}}




                        {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                        {{--@endforeach--}}
                {{--</div><!--end .panel -->--}}
            {{--</div><!--end .panel-group -->--}}
        {{--</div><!--end .col -->--}}
    {{--</div><!--end .row -->--}}
    <!-- END COLORS -->
    <div class="row">

        <div class="col-sm-12 col-md-12">
            <div class="panel-group" id="accordion7">
                <div class="card panel">
                    <div class="card-head style-primary-light collapsed" data-toggle="collapse" data-parent="#accordion7" data-target="#accordion7-1">
                        <header>Dados do Contacto</header>
                        <div class="tools">
                            <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                    <div id="accordion7-1" class="collapse in">
                        <div class="card-body">
                            <dl class="dl">            {{--horizontal--}}
                                <div class="col-md-4 col-sm-4">
                                    <dt>Tipo :</dt>
                                    <dd>{{$contactos->tipo_contacto}}</dd>
                                    <dt>Estado :</dt>
                                    <dd>{{$contactos->estado_contacto}}</dd>
                                    <dt>Resumo :</dt>
                                    <dd>{{$contactos->resumo_contacto}}</dd>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <dt>Impressao do(a) Atendente :</dt>
                                    <dd>{{$contactos->impressao_atendente}}</dd>
                                    <dt>Motivo :</dt>
                                    <dd>{{$contactos->motivo->motivonome}}</dd>
                                    <dt>Registado por :</dt>
                                    <dd>{{$contactos->user->nome}}</dd>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <dt>Criado a :</dt>
                                    <dd>{{$contactos->created_at}}</dd>
                                    <dt>Descricao de Antecedentes :</dt>
                                    <dd>{{$contactos->desc_antecedentes}}</dd>
                                    <dt>Caso :</dt>
                                    <dd>{{$contactos->caso_id ? $contactos->caso_id:''}}</dd>
                                    <dt>Estado do caso :</dt>
                                    <dd>{{$contactos->caso_id ? $contactos->caso->estado_caso:''}}</dd>
                                </div>

                            </dl>

                        </div>
                    </div>
                </div><!--end .panel -->
                @foreach ($contactos->utente as $utent)
                <div class="card panel">
                    <div class="card-head style-default collapsed" data-toggle="collapse" data-parent="#accordion7" data-target="#accordion7-{{$utent->id}}">
                        <header>{{$utent->tipo_utente}}</header>
                        <div class="tools">
                            <a class="btn btn-icon-toggle"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div id="accordion7-{{$utent->id}}" class="collapse">
                        <div class="card-body">
                            <dl class="dl-horizontal">
                                <div class="col-md-4 col-sm-4">
                                    <dt>Nome :</dt>
                                    <dd>{{$utent->nome}}</dd>
                                    <dt>Provincia :</dt>
                                    @if($utent->provincia_id)
                                        <dd>{{$utent->provincia->provincianome}}</dd>
                                    @else
                                        <dd></dd>
                                    @endif
                                    <dt>Idioma :</dt>
                                    <dd>{{$utent->idioma}}</dd>
                                    <dt>Idade :</dt>
                                    <dd>{{$utent->idade}}</dd>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <dt>Apelido :</dt>
                                    <dd>{{$utent->apelido}}</dd>
                                    <dt>Distrito :</dt>
                                    @if($utent->distrito_id)
                                        <dd>{{$utent->distrito->distritonome}}</dd>
                                    @else
                                        <dd></dd>
                                    @endif
                                    <dt>Cell princi. :</dt>
                                    <dd>{{$utent->cell1}}</dd>
                                    <dt>Situacao Educacio. :</dt>
                                    <dd>{{$utent->situacao_educacional}}</dd>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <dt>Genero :</dt>
                                    <dd>{{$utent->genero}}</dd>
                                    <dt>Localidade :</dt>
                                    @if($utent->localidade_id)
                                        <dd>{{$utent->localidade->localidadenome}}</dd>
                                    @else
                                        <dd></dd>
                                    @endif
                                    <dt>Cell altern. :</dt>
                                    <dd>{{$utent->cell2}}</dd>
                                    <dt>Relacao vitim. :</dt>
                                    <dd>{{$utent->relacao_vitima}}</dd>
                                </div>
                            </dl>

                        </div>
                    </div>
                </div>
                @endforeach
            </div><!--end .panel-group -->
        </div><!--end .col -->
    </div><!--end .row -->


@endsection