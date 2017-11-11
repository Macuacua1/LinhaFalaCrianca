@extends('layouts.master')
@section('content')
    @if( Auth::user()->hasRole('admin') or Auth::user()->hasRole('user'))
    <div class="row">
        <div class="col-lg-12" style="margin: -15px 0 0 auto">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Registo de Contacto</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .col -->
    <div class="row">
        {{--<div class="col-lg-12">--}}
            {{--<!-- BEGIN LAYOUT LEFT ALIGNED -->--}}
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-head">
                        <ul class="nav nav-tabs" data-toggle="tabs" id="titulos">
                            <li class="active"><a href="#first0">Dados do Utente</a></li>
                            {{--<li><a href="#envolvido">Dados dos Envolvidos</a></li>--}}
                            <li><a href="#contactoo">Dados do Contacto</a></li>
                        </ul>
                    </div><!--end .card-head -->
                    <div class="card-body tab-content" id="conteudo">
                        <div class="tab-pane active" id="first0">

                            {{--<div class="container">--}}
                                <div class="row" id="test_append">
                                    <input type="hidden" class="form-control" name="soma" id="soma" value="0">
                                </div>
                                <form class="form" id="form_add_utente">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group floating-label">
                                            <select id="tipo_contact" name="tipo_contact" class="form-control">
                                                <option value="" disabled selected>Tipo de Contacto</option>
                                                <option value="Telefone">Telefone</option>
                                                <option value="Email">Email</option>
                                                <option value="Facebook">Facebook</option>
                                                <option value="Whatsapp">Whatsapp</option>
                                                <option value="Website">Website</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                            {{--<label for="tipo_utente">Tipo de Utente</label>--}}
                                        </div>
                                        </div>

                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group floating-label">
                                            <select id="tipo_utente" name="tipo_utente" class="form-control">
                                                <option value="" disabled selected>Tipo de Utente</option>
                                                <option value="Contactante">Contactante</option>
                                                <option value="Contactante+Vitima">Contactante+Vitima</option>
                                                <option value="Contactante+Perpetrador">Contactante+Perpetrador</option>
                                                <option value="Vitima">Vitima</option>
                                                <option value="Perpetrador">Perpetrador</option>
                                            </select>
                                            {{--<label for="tipo_utente">Tipo de Utente</label>--}}
                                        </div>
                                    </div>
                                    {{--<div class="col-md-2 col-sm-2"></div>--}}
                                       <div class="col-md-3 col-sm-3" style="margin-top: 30px!important;">
                                            <label class="radio-inline radio-styled">
                                                <input type="radio" name="genero" value="Masculino"><span>Masculino</span>
                                            </label>
                                            <label class="radio-inline radio-styled">
                                                <input type="radio" name="genero" value="Femenino"><span>Femenino</span>
                                            </label>
                                        </div>
                                    <div id="anonimo" class="col-md-3 col-sm-3" style="margin-top: 30px!important;" >
                                        <label class="checkbox-inline checkbox-styled">
                                            <input type="checkbox" value="1" name="anonimo" id="anonimato" onclick="showHideRow()"><span>Permanecer anonimo(a)</span>
                                        </label>

                                    </div><!--end .col -->
                                </div>
                                <div class="row" id="anonimous">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <input type="text" name="nome" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Nome e Sobrenome">
                                            <label for="help2">Nome(s)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <input type="text" name="apelido" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Apelido">
                                            <label for="help2">Apelido</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group floating-label">
                                            <select id="provincia-id" name="provincia_id" class="form-control provincia">
                                                <option value="" disabled selected>--Provincia--</option>
                                                @foreach($prov as $pro)
                                                    <option value="{{$pro->id}}">{{$pro->provincianome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group floating-label">
                                            <select id="distrito"  class="form-control distritonome" name="distrito_id">
                                                <option value="0" disabled="true" selected="true">--Distrito--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group floating-label">
                                            <select id="localidade" class="form-control localidadenome" name="localidade_id">
                                                <option value="0" disabled="true" selected="true">--Localidade--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group floating-label">
                                            <input type="text" name="descricao_local" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Pequena descricao do local">
                                            <label for="help2">Descricao do local</label>
                                        </div>
                                    </div>
                                </div><!--end .row -->

                                <div id="vivecom_vitima" class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input type="number"  name="idade" class="form-control">
                                            <label>Idade</label>
                                            {{--<p class="help-block">Must be over 16</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div id="cell1" class="form-group">
                                            <input type="number" name="cell1" id="celular1" class="form-control">
                                            <label>Cell principal</label>
                                        </div>
                                    </div>
                                    <div  class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input type="number" name="cell2" id="celular2" class="form-control">
                                            <label>Cell alternativo</label>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row" id="viveducacional">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group floating-label">
                                                <select id="situacao_educacional" name="situacao_educacional" class="form-control">
                                                    <option value="0" disabled selected>Situacao Educacional</option>
                                                    <option value="Formal">Formal</option>
                                                    <option value="Primario">Primario</option>
                                                    <option value="Secundario">Secundario</option>
                                                    <option value="Outra">Outra</option>
                                                </select>
                                                {{--<label for="situacao_educacional">Situacao Educacional</label>--}}
                                            </div>
                                        </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <select id="vive_com" name="vive_com" class="form-control">
                                                <option value="0" disabled selected>Vive Com</option>
                                                <option value="Pai">Pai</option>
                                                <option value="Tia">Tia</option>
                                                <option value="Sozinho">Sozinho(a)</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                            {{--<label for="vive_com">Vive Com?</label>--}}
                                        </div>
                                    </div>
                                </div>

                                <div  class="row">
                                    <div class="col-md-4 col-sm-4"id="lingua">
                                        <div class="form-group floating-label" >
                                            <select id="idioma" name="idioma" class="form-control">
                                                <option value="0"disabled selected>Lingua Falada</option>
                                                <option value="Portugues">Portugues</option>
                                                <option value="Macua">Macua</option>
                                                <option value="Sena">Sena</option>
                                                <option value="Outra">Outra</option>
                                            </select>
                                            {{--<label for="idioma">Linguas Faladas</label>--}}
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4" id="relacao">
                                        <div class="form-group floating-label">
                                            <select id="relacao_vitima" name="relacao_vitima" class="form-control">
                                                <option value="0" disabled selected>Relacao com a Vitima</option>
                                                <option value="Pai">Pai</option>
                                                <option value="Tia">Tia</option>
                                                <option value="Sobrinho(a)">Sobrinho(a)</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="conhecer_linhaa" class="col-md-4 col-sm-4">
                                        <div class="form-group floating-label">
                                            <select id="conhecer_linha" name="conhecer_linha" class="form-control">
                                                <option value="0" disabled selected>De onde Conheceu a Linha</option>
                                                <option value="TV">TV</option>
                                                <option value="Jornal">Jornal</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                            {{--<label for="conhecer_linha">De onde conheceu a linha</label>--}}
                                        </div>
                                    </div>
                                </div>
                                </form>

                                <div class="row">
                                    <div class="col-md-10 col-sm-10"></div>
                                    <div class="col-md-2 col-sm-2">
                                        <button class="btn btn-success" type="submit" id="add_utente" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Gravar dados actuais e adicionar outros Envolvidos">
                                            <span class="glyphicon glyphicon-plus"></span> Adicionar Novo
                                        </button>
                                        {{--<button type="button" id="add_utente" class="btn ink-reaction btn-floating-action btn-sm btn-primary" style="margin-right:0!important;padding-right:0!important;"><i class="fa fa-star"></i></button>--}}
                                    </div>
                                </div>
                            {{--</div>--}}
                        </div>

                        <div class="tab-pane" id="contactoo">

                            {{--<div class="container">--}}
                                <form class="form" id="form_add_contacto">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="hidden" name="tipo_contacto" id="tipo_contacto" class="form-control" value="">
                                        </div>
                                        </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <textarea name="resumo_contacto" id="resumo_contacto" class="form-control" rows="3"></textarea>
                                            <label>Resumo do Contacto</label>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="impressao_atendente" id="impressao_atendente" class="form-control" rows="3"></textarea>
                                            <label>Impressao do atendente</label>
                                        </div>
                                    </div>

                                </div>
                                <div id="case" class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <select name="tipo_motivo_id" id="categoriamotivo" class="form-control categoriamotivo">
                                                <option value="" disabled selected>--Categoria do Motivo--</option>
                                                @foreach($tipomotivos as $tipomotivo)
                                                    <option value="{{$tipomotivo->id}}">{{$tipomotivo->tipomotivonome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <select id="motivo"  class="form-control motivonome" name="motivo_id">
                                                <option value="0" disabled="true" selected="true">--Motivo--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!--end .row -->
                                <div id="notcase" class="row">
                                    <div class=" col-md-12 col-sm-12 col-lg-12">
                                        <div class="form-group floating-label">
                                            <select name="motivo_id" id="" class="form-control">
                                                <option value="" disabled selected>--Motivo--</option>
                                                @foreach($motivos as $motivo)
                                                <option value="{{$motivo->id}}">{{$motivo->motivonome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <div class="row">
                                    <div class="col-md-10 col-sm-10"></div>
                                    <div class="col-md-2 col-sm-2">
                                        <button class="btn btn-success" type="submit" id="add_contacto" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Gravar dados do Contacto">
                                            <span class="glyphicon glyphicon-floppy-save"></span> Registar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        {{--</div>--}}
                    </div><!--end .card-body -->
                </div><!--end .card -->
            </div><!--end .col -->
        </div><!--end .col -->
    {{--</div><!--end .row -->--}}
    <!-- END VALIDATION FORM WIZARD -->
    @endif
@endsection