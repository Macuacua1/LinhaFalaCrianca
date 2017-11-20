
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
        <div class="col-lg-12" style="margin: -15px 0 0 auto">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Detalhes do Contacto</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .row -->


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

                                    <form id="form_edit_contacto" class="form form-validate" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                           <select id="tipo_contacto" name="tipo_contacto" class="form-control" required>
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
                                                <select id="motivo"  class="form-control motivonome" name="motivo_id" required>
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
                                                <textarea name="resumo_contacto" id="resumo_contacto" class="form-control" rows="3" required>{{$contactos->resumo_contacto}}</textarea>
                                                <label>Resumo do Contacto</label>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="impressao_atendente" id="impressao_atendente" class="form-control" rows="3" required>{{$contactos->impressao_atendente}}</textarea>
                                                <label>Impressao do atendente</label>
                                            </div>
                                        </div>

                                    </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4"></div>
                                        <div class="col-md-4 col-sm-4">
                                            {{--<button class="btn btn-success pull-right" type="submit" id="edit_contacto" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Actualizar dados" style="margin-left: 100px">--}}
                                                {{--<span class="glyphicon glyphicon-refresh"></span> Actualizar--}}
                                            {{--</button>--}}
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <button class="btn btn-success" type="submit" id="edit_contacto" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Actualizar dados" style="margin:0 0 10px 100px">
                                                <span class="glyphicon glyphicon-refresh"></span> Actualizar
                                            </button>
                                        </div>
                                    </div>


                                </div>
                                   <div class="col-md-4 col-sm-4" style="height: 300px!important;border-color: #4caf50;">
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
                                                    @if($contactos->caso_id>0)
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group floating-label">
                                                            {{--<label for="apelido">Numero do caso :</label>--}}
                                                            <a href="{{route('caso.show',$contactos->caso_id )}}" style="font-size: 16px!important;color: green">Numero do caso :</a>
                                                            <a href="{{route('caso.show',$contactos->caso_id )}}"><span style="font-size: 16px!important;color: green">{{$contactos->caso_id }}</span></a>
                                                            {{--<input type="text" name="caso_id"  id="caso_id" value="{{$contactos->caso_id ? $contactos->caso_id:''}}" class="form-control " disabled>--}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <label for="apelido">Estado do Caso :</label>
                                                        <input type="text" name="apelido" value="{{$contactos->caso->estado_caso}}" class="form-control " disabled>
                                                    </div>
                                                        @endif
                                                </dl>
                                            </div>

                                        </div>
                                    </div>
                                       {{--<button class="btn btn-success" type="submit" id="edit_contacto" style="margin:185px 0 0 100px">--}}
                                           {{--<span class="glyphicon glyphicon-refresh"></span> Actualizar--}}
                                       {{--</button>--}}

                                       <div class="row" style="margin:182px 0 0 -50px">
                                           <div class="col-md-4 col-sm-4">
                                               @if($contactos->caso_id>0 or $contactos->motivo_id>60)
                                                   <button class=" btn btn-success pull-left" data-id="{{$contactos->id}}" data-title="" data-description="" disabled id="fwd-caso" style="margin-left: 10px">
                                                       <span class="glyphicon glyphicon-forward"></span> Encaminhar
                                                   </button>
                                               @else
                                                   <button class="btn btn-success pull-left" data-id="{{$contactos->id}}" data-toggle="modal" data-target="#formModal" id="fwd-caso" style="margin-left: 10px">
                                                       <span class="glyphicon glyphicon-forward"></span> Encaminhar
                                                   </button>
                                               @endif
                                               {{--<button class="btn btn-success pull-left" type="submit" id="edit_contacto" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Actualizar dados" style="margin-left: 100px">--}}
                                                   {{--<span class="glyphicon glyphicon-refresh"></span> Actualizar--}}
                                               {{--</button>--}}
                                           </div>
                                           <div class="col-md-4 col-sm-4">
                                           </div>
                                           <div class="col-md-4 col-sm-4">
                                               {{--<button class="btn btn-success" type="submit" id="edit_contacto" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Actualizar dados" style="margin-left: 100px">--}}
                                                   {{--<span class="glyphicon glyphicon-refresh"></span> Actualizar--}}
                                               {{--</button>--}}
                                           </div>
                                       </div>

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

                            <form class="form-edit-utente form-validate" id="form_edit_utente" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <select id="tipo_utente" name="tipo_utente[]" class="form-control" required>
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
    <!-- BEGIN FORM MODAL MARKUP -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="formModalLabel">Reencaminhamento</h4>
                </div>
                <form class="form-horizontal form-validate" role="form" method="post" id="form_add_caso" novalidate="novalidate">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="email1" class="control-label">Instituicao</label>
                            </div>
                            <div class="col-sm-9">
                                <select name="responsavel_id" id="responsavel" class="form-control" required>
                                    <option value="" disabled selected>--Reencaminhar para:--</option>
                                    @foreach($resps as $resp)
                                        <option value="{{$resp->id}}">{{$resp->respnome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--<input type="hidden" class="form-control" id="contacto_id" name="contacto_id">--}}

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="password1" class="control-label">Mensagem</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="mensagem" id="mensagem" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close</button>
                        <button type="button" class="btn actionBtn" data-dismiss="modal" id="add_caso">
                            <span id="footer_action_button" class='glyphicon'> </span>
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END FORM MODAL MARKUP -->



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
    <script type="text/javascript">
                @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif

            $(document).on('click', '#fwd-caso', function() {
            $('#fwd-caso').addClass('fwd-caso');
            $('#footer_action_button').text(" Encaminhar");
            $('#footer_action_button').addClass('glyphicon-check');
            $('.actionBtn').addClass('btn-success');
            $('.actionBtn').addClass('fwd_caso');
            $('#contacto_id').val($(this).data('id'));
            $('.form-horizontal').show();
        });
                $('.modal-footer').on('click', '.fwd_caso', function() {
//                    var dados = $('#form_add_caso').serialize();
                    var contacto_id=$('#contacto_id').val();
                    var responsavel_id=$('#responsavel').val();
                    var mensagem=$('#mensagem').val();
//                 alert(dados);
                    $.ajax({
                        type:'post',
                        url:'/addcaso',
                        data:{contacto_id:contacto_id,responsavel_id:responsavel_id,mensagem:mensagem},
                        success:function(data){
//                            $('#form_add_caso')[0].reset();
                            $('.fwd-caso').addClass('disabled');
                            toastr.success("Encaminhado Com Sucesso!");
                            document.location.href="{{url('contacto')}}";
                        },
                        error:function(){
                            toastr.error("Registo nao efectuado!");
                        }
                    });
                });
    </script>
    @endsection
