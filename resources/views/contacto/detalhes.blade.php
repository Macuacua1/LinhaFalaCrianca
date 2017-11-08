
@extends('layouts.master')
@section('style')
    <style type="text/css">
        fieldset
        {
            border: 1px solid #ddd !important;
            margin: 0;
            color: green;
            border-color: #4caf50;
            xmin-width: 0;
            padding: 10px;
            position: relative;
            border-radius:4px;
            background-color:#f5f5f5;
            padding-left:10px!important;
        }

        legend
        {
            font-size:14px;
            font-weight:bold;
            margin-bottom: 0px;
            width: 35%;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px 5px 5px 10px;
            background-color: #ffffff;
        }
        label{
            font-size: 16px!important;
        }
    </style>

    @endsection
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
        {{--<div class="col-md-10 col-sm-10"></div>--}}
        {{--<div class="col-md-2 col-sm-2">--}}
            {{--<button class="btn btn-success" type="submit" id="add_new_utente" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Adicionar novo Utente">--}}
                {{--<span class="glyphicon glyphicon-plus"></span> Utente--}}
            {{--</button>--}}
        {{--</div>--}}
    {{--</div>--}}

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
                            <div class="row">
                                <div class="col-md-8 col-sm-8">

                                    <form id="form_edit_contacto">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                           <select id="tipo_contacto" name="tipo_contacto" class="form-control">
                                                    <option value="{{$contactos->tipo_contacto}}"  selected>{{$contactos->tipo_contacto}}</option>
                                               @if($contactos->tipo_contacto =='Telefone')
                                                    {{--<option value="Telefone">Telefone</option>--}}
                                                    <option value="Email">Email</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Whatsapp">Whatsapp</option>
                                                    <option value="Website">Website</option>
                                                    <option value="Outro">Outro</option>
                                                   @endif
                                               @if($contactos->tipo_contacto =='Email')
                                                   <option value="Telefone">Telefone</option>
                                                   {{--<option value="Email">Email</option>--}}
                                                   <option value="Facebook">Facebook</option>
                                                   <option value="Whatsapp">Whatsapp</option>
                                                   <option value="Website">Website</option>
                                                   <option value="Outro">Outro</option>
                                               @endif
                                               @if($contactos->tipo_contacto =='Facebook')
                                                   <option value="Telefone">Telefone</option>
                                                   <option value="Email">Email</option>
                                                   {{--<option value="Facebook">Facebook</option>--}}
                                                   <option value="Whatsapp">Whatsapp</option>
                                                   <option value="Website">Website</option>
                                                   <option value="Outro">Outro</option>
                                               @endif
                                               @if($contactos->tipo_contacto =='Whatsapp')
                                                   <option value="Telefone">Telefone</option>
                                                   <option value="Email">Email</option>
                                                   <option value="Facebook">Facebook</option>
                                                   {{--<option value="Whatsapp">Whatsapp</option>--}}
                                                   <option value="Website">Website</option>
                                                   <option value="Outro">Outro</option>
                                               @endif
                                               @if($contactos->tipo_contacto =='Website')
                                                   <option value="Telefone">Telefone</option>
                                                   <option value="Email">Email</option>
                                                   <option value="Facebook">Facebook</option>
                                                   <option value="Whatsapp">Whatsapp</option>
                                                   {{--<option value="Website">Website</option>--}}
                                                   <option value="Outro">Outro</option>
                                               @endif
                                               @if($contactos->tipo_contacto =='Outro')
                                                   <option value="Telefone">Telefone</option>
                                                   <option value="Email">Email</option>
                                                   <option value="Facebook">Facebook</option>
                                                   <option value="Whatsapp">Whatsapp</option>
                                                   <option value="Website">Website</option>
                                                   {{--<option value="Outro">Outro</option>--}}
                                               @endif
                                                </select>

                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group floating-label">
                                                <select name="tipo_motivo_id" id="categoriamotivo" class="form-control categoriamotivo">
                                                    <option value="" disabled selected>--Categoria do Motivo--</option>
                                                    @foreach($tipomotivos as $tipomotivo)
                                                        <option value="{{$tipomotivo->id}}">{{$tipomotivo->tipomotivonome}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group floating-label">
                                                <select id="motivo"  class="form-control motivonome" name="motivo_id">
                                                    <option value="{{$contactos->motivo_id}}"  selected="true">{{$contactos->motivo->motivonome}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <input type="hidden" name="contacto_id" id="contacto_id" class="form-control" value="{{$contactos->id}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <textarea name="resumo_contacto" id="resumo_contacto" class="form-control" rows="3">{{$contactos->resumo_contacto}}</textarea>
                                                <label>Resumo do Contacto</label>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="impressao_atendente" id="impressao_atendente" class="form-control" rows="3">{{$contactos->impressao_atendente}}</textarea>
                                                <label>Impressao do atendente</label>
                                            </div>
                                        </div>

                                        {{--<div class="col-md-4 col-sm-4">--}}
                                        {{--</div>--}}

                                    </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4"></div>
                                        <div class="col-md-4 col-sm-4"></div>
                                        <div class="col-md-4 col-sm-4">
                                            <button class="btn btn-success" type="submit" id="edit_contacto" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Actualizar dados" style="margin-left: 100px">
                                                <span class="glyphicon glyphicon-refresh"></span> Actualizar
                                            </button>
                                        </div>
                                    </div>


                                </div>
                                   <div class="col-md-4 col-sm-4" style="height: auto;border-color: #4caf50;">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <dl class="dl-horizontal">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label for="apelido">Registado por : &emsp;</label>
                                                        <input type="text" name="apelido" value="{{$contactos->user->nome}}" class="form-control " disabled>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group floating-label">
                                                            <label for="apelido">Criado a :</label>
                                                            <input type="text" name="apelido" value="{{$contactos->created_at}}" class="form-control " disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group floating-label">
                                                            <label for="apelido">Numero do caso :</label>
                                                            <input type="text" name="caso_id"  id="caso_id" value="{{$contactos->caso_id ? $contactos->caso_id:''}}" class="form-control " disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <label for="apelido">Estado do Caso :</label>
                                                        <input type="text" name="apelido" value="{{$contactos->caso_id ? $contactos->caso->estado_caso:''}}" class="form-control " disabled>
                                                    </div>
                                                </dl>
                                            </div>

                                        </div>
                                    </div>

                                {{--</fieldset>--}}

                            </div>
                            </div>

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
                            <form class="form-edit-utente" id="form_edit_utente">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <select id="tipo_utente" name="tipo_utente[]" class="form-control">
                                                <option value="" disabled selected>Tipo de Utente</option>
                                                <option value="{{$utent->tipo_utente}}"  selected>{{$utent->tipo_utente}}</option>
                                                @if($utent->tipo_utente =='Contactante')
                                                    {{--<option value="Contactante">Contactante</option>--}}
                                                    <option value="Contactante+Vitima">Contactante+Vitima</option>
                                                    <option value="Contactante+Perpetrador">Contactante+Perpetrador</option>
                                                    <option value="Vitima">Vitima</option>
                                                    <option value="Perpetrador">Perpetrador</option>
                                                @endif
                                                @if($utent->tipo_utente =='Contactante+Vitima')
                                                    <option value="Contactante">Contactante</option>
                                                    {{--<option value="Contactante+Vitima">Contactante+Vitima</option>--}}
                                                    <option value="Contactante+Perpetrador">Contactante+Perpetrador</option>
                                                    <option value="Vitima">Vitima</option>
                                                    <option value="Perpetrador">Perpetrador</option>
                                                @endif
                                                @if($utent->tipo_utente =='Contactante+Perpetrador')
                                                    <option value="Contactante">Contactante</option>
                                                    <option value="Contactante+Vitima">Contactante+Vitima</option>
                                                    {{--<option value="Contactante+Perpetrador">Contactante+Perpetrador</option>--}}
                                                    <option value="Vitima">Vitima</option>
                                                    <option value="Perpetrador">Perpetrador</option>
                                                @endif
                                                @if($utent->tipo_utente =='Vitima')
                                                    <option value="Contactante">Contactante</option>
                                                    <option value="Contactante+Vitima">Contactante+Vitima</option>
                                                    <option value="Contactante+Perpetrador">Contactante+Perpetrador</option>
                                                    {{--<option value="Vitima">Vitima</option>--}}
                                                    <option value="Perpetrador">Perpetrador</option>
                                                @endif
                                                @if($utent->tipo_utente =='Perpetrador')
                                                    <option value="Contactante">Contactante</option>
                                                    <option value="Contactante+Vitima">Contactante+Vitima</option>
                                                    <option value="Contactante+Perpetrador">Contactante+Perpetrador</option>
                                                    <option value="Vitima">Vitima</option>
                                                    {{--<option value="Perpetrador">Perpetrador</option>--}}
                                                @endif
                                            </select>
                                            {{--<label for="tipo_utente">Tipo de Utente</label>--}}
                                        </div>
                                    </div>
                                    {{--<div class="col-md-2 col-sm-2"></div>--}}
                                    <div class="col-md-6 col-sm-6" style="margin-top: 30px!important;">
                                        @if($utent->genero =='Masculino')
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="genero[]" value="Masculino" checked><span>Masculino</span>
                                        </label>
                                            <label class="radio-inline radio-styled">
                                                <input type="radio" name="genero[]" value="Femenino"><span>Femenino</span>
                                            </label>
                                        @elseif($utent->genero =='Femenino')
                                            <label class="radio-inline radio-styled">
                                                <input type="radio" name="genero[]" value="Masculino"><span>Masculino</span>
                                            </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="genero[]" value="Femenino" checked><span>Femenino</span>
                                        </label>
                                            @else
                                            <label class="radio-inline radio-styled">
                                                <input type="radio" name="genero[]" value="Masculino"><span>Masculino</span>
                                            </label>
                                            <label class="radio-inline radio-styled">
                                                <input type="radio" name="genero[]" value="Femenino"><span>Femenino</span>
                                            </label>
                                            @endif
                                    </div>
                                    {{--<div id="anonimo" class="col-md-3 col-sm-3" style="margin-top: 30px!important;">--}}
                                        {{--<label class="checkbox-inline checkbox-styled">--}}
                                            {{--<input type="checkbox" value="Sim" name="anonimo"><span>Permanecer anonimo(a)</span>--}}
                                        {{--</label>--}}

                                    {{--</div><!--end .col -->--}}
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="hidden" name="utente_id[]" id="utente_id" class="form-control" value="{{$utent->id}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <input type="text" name="nome[]" value="{{$utent->nome}}" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Nome e Sobrenome">
                                            <label for="help2">Nome(s)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <input type="text" name="apelido[]" value="{{$utent->apelido}}" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Apelido">
                                            <label for="help2">Apelido</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group floating-label">
                                            <select id="provincia-id" name="provincia_id[]" class="form-control provincia">
                                                <option value="{{$utent->provincia_id ? $utent->provincia_id:''}}"  selected>{{$utent->provincia->provincianome ? $utent->provincia->provincianome:'--Seleccione a Provincia--'}}</option>
                                                @foreach($prov as $pro)
                                                    <option value="{{$pro->id}}">{{$pro->provincianome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group floating-label">
                                            <select id="distrito"  class="form-control distritonome" name="distrito_id[]">
                                                <option value="{{$utent->distrito_id ? $utent->distrito_id:''}}"  selected="true">{{$utent->distrito_id ? $utent->distrito->distritonome:'--Distrito--'}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group floating-label">
                                            <select id="localidade" class="form-control localidadenome" name="localidade_id[]">
                                                <option value="{{$utent->localidade_id ? $utent->localidade_id:''}}"  selected="true">{{$utent->localidade_id ? $utent->localidade->localidadenome:'--Localidade--'}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group floating-label">
                                            <input type="text" name="descricao_local[]" value="{{$utent->descricao_local}}" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Pequena descricao do local">
                                            <label for="help2">Descricao do local</label>
                                        </div>
                                    </div>
                                </div><!--end .row -->

                                <div id="vivecom_vitima" class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input type="number"  name="idade[]" value="{{$utent->idade}}" class="form-control">
                                            <label>Idade</label>
                                            {{--<p class="help-block">Must be over 16</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div id="cell1" class="form-group">
                                            <input type="number" name="cell1[]" id="celular1" value="{{$utent->cell1}}" class="form-control">
                                            <label>Cell principal</label>
                                        </div>
                                    </div>
                                    <div  class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input type="number" name="cell2[]" id="celular2" value="{{$utent->cell2}}" class="form-control">
                                            <label>Cell alternativo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="viveducacional">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <select id="situacao_educacional" name="situacao_educacional[]" class="form-control">
                                                <option value="{{$utent->situacao_educacional}}" disabled selected>{{$utent->situacao_educacional}}</option>
                                                <option value="Formal">Formal</option>
                                                <option value="Primario">Primario</option>
                                                <option value="Secundario">Secundario</option>
                                                <option value="Outra">Outra</option>
                                            </select>
                                            <label for="situacao_educacional">Situacao Educacional</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <select id="vive_com" name="vive_com[]" class="form-control">
                                                <option value="{{$utent->vive_com}}" disabled selected>{{$utent->vive_com}}</option>
                                                <option value="Pai">Pai</option>
                                                <option value="Tia">Tia</option>
                                                <option value="Sozinho">Sozinho(a)</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                            <label for="vive_com">Vive Com?</label>
                                        </div>
                                    </div>
                                </div>

                                <div  class="row">
                                    <div class="col-md-4 col-sm-4"id="lingua">
                                        <div class="form-group floating-label" >
                                            <select id="idioma" name="idioma[]" class="form-control">
                                                <option value="{{$utent->idioma}}"disabled selected>{{$utent->idioma}}</option>
                                                <option value="Portugues">Portugues</option>
                                                <option value="Macua">Macua</option>
                                                <option value="Sena">Sena</option>
                                                <option value="Outra">Outra</option>
                                            </select>
                                            <label for="idioma">Idioma</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4" id="relacao">
                                        <div class="form-group floating-label">
                                            <select id="relacao_vitima" name="relacao_vitima[]" class="form-control">
                                                <option value="{{$utent->relacao_vitima}}" disabled selected>{{$utent->relacao_vitima}}</option>
                                                <option value="Pai">Pai</option>
                                                <option value="Tia">Tia</option>
                                                <option value="Sobrinho(a)">Sobrinho(a)</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                            <label for="relacao_vitima">Relacao com a Vitima</label>
                                        </div>
                                    </div>
                                    <div id="conhecer_linhaa" class="col-md-4 col-sm-4">
                                        <div class="form-group floating-label">
                                            <select id="conhecer_linha" name="conhecer_linha[]" class="form-control">
                                                <option value="{{$utent->conhecer_linha}}" disabled selected>{{$utent->conhecer_linha}}</option>
                                                <option value="TV">TV</option>
                                                <option value="Jornal">Jornal</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                            <label for="conhecer_linha">De onde conheceu a linha</label>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-md-10 col-sm-10"></div>
                                <div class="col-md-2 col-sm-2">
                                    <button class="btn btn-success edit-utente" type="submit" id="edit_utente" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Actualizar dados do utente">
                                        <span class="glyphicon glyphicon-refresh"></span> Actualizar
                                    </button>
                                  </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div><!--end .panel-group -->
        </div><!--end .col -->
    </div><!--end .row -->
    <div class="row">
        <div class="col-md-10 col-sm-10"></div>
        <div class="col-md-2 col-sm-2">
            <button class="btn btn-success add-new-utente " style="margin-left: 50px" id="add_new_utente" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Adicionar novo Utente">
                <span class="glyphicon glyphicon-plus"></span> Utente
            </button>
        </div>
    </div>


@endsection
@section('scripts')
    <script type="text/javascript">
        if($('#caso_id').val()>0){
           $('#edit_contacto').addClass('disabled');
           $('#edit_utente').addClass('disabled');
//           $('input').addClass('disabled');
//           $('select').addClass('disabled');
        }
        $('#edit_contacto').on('click',function (e) {
            event.preventDefault();

            var dados = $('#form_edit_contacto').serialize();
//            alert(dados);
            $.ajax({
                type: 'post',
                url: '/editcontacto',
                data: dados,
                success: function(data) {
                    if (data) {
                        toastr.success("Actualizado Com Sucesso!");

                    }else {
                        toastr.error("Erro ao Actualizar Contacto!");

                    }
                }
            });
        });

        $('.edit-utente').on('click',function (e) {
            event.preventDefault();
//            alert('hahahahahahah');
            var dados = $('.form-edit-utente').serialize();
//            alert(dados);
            console.log(dados);
            $.ajax({
                type: 'post',
                url: '/editutente',
                data: dados,
                success: function(data) {
                    if (data) {
                        toastr.success("Actualizado Com Sucesso!");

                    }else {
                        toastr.error("Erro ao Actualizar Contacto!");

                    }
                }
            });
        });

        $('#add_new_utente').on('click',function (e) {
            event.preventDefault();
        var valor=$('#caso_id').val();
            alert(valor);

        });
    </script>
    @endsection