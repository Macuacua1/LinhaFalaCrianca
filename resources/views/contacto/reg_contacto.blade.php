@extends('layouts.master')
@section('content')
    <div class="row">
    <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Registo de Contacto</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .col -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <div id="rootwizard2" class="form-wizard form-wizard-horizontal">
                        <form class="form floating-label form-validation" role="form" novalidate="novalidate">
                            <div class="form-wizard-nav">
                                <div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
                                <ul class="nav nav-justified" id="stepmenu">
                                    <li class="active"><a href="#step1" data-toggle="tab"><span class="step">1</span> <span class="title">Utente</span></a></li>
                                    <li id="utente3"><a href="#step3" data-toggle="tab"><span class="step">2</span> <span class="title">Envolvidos</span></a></li>
                                    <li id="contact"><a href="#step2" data-toggle="tab"><span class="step">3</span> <span class="title">Contacto</span></a></li>

                                </ul>
                            </div><!--end .form-wizard-nav -->
                            <div class="tab-content clearfix" id="stepcontent">
                                <div class="tab-pane active" id="step1">

                                    <!-- BEGIN BASIC ELEMENTS -->
                                    <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group floating-label">
                                                <select id="tipo_utente " name="tipo_utente" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="Contactante">Contactante</option>
                                                    <option value="Contactante+Vitima">Contactante+Vitima</option>
                                                    <option value="Contactante+Perpetrador">Contactante+Perpetrador</option>
                                                </select>
                                                <label for="tipo_utente">Tipo de Utente</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2"></div>
                                        <div class="col-md-3 col-sm-3" style="margin-top: 25px!important;">
                                            <div>
                                                <label class="radio-inline radio-styled">
                                                    <input type="radio" name="genero"><span>Masculino</span>
                                                </label>
                                                <label class="radio-inline radio-styled">
                                                    <input type="radio" name="genero"><span>Femenino</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div id="anonimo" class="col-md-3 col-sm-3" style="margin-top: 22px!important;">
                                            <label class="checkbox-inline checkbox-styled">
                                                <input type="checkbox" value="option1"><span>Permanecer anonimo(a)</span>
                                            </label>

                                        </div><!--end .col -->
                                        </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Nome e Sobrenome">
                                                <label for="help2">Nome(s)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Apelido">
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
                                                <input type="text" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Pequena descricao do local">
                                                <label for="help2">Descricao do local</label>
                                            </div>
                                        </div>
                                    </div><!--end .row -->
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="spinner" value="19"/>
                                                <label>Idade</label>
                                                {{--<p class="help-block">Must be over 16</p>--}}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group floating-label">
                                                <select id="select2" name="select2" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="30">Portugues</option>
                                                    <option value="40">Macua</option>
                                                    <option value="50">Sena</option>
                                                </select>
                                                <label for="select2">Linguas faladas</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="vivecom" class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group floating-label">
                                                <select id="select2" name="select2" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="30">Portugues</option>
                                                    <option value="40">Macua</option>
                                                    <option value="50">Sena</option>
                                                </select>
                                                <label for="select2">Situacao educacional</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group floating-label">
                                                <select id="select2" name="select2" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="30">Portugues</option>
                                                    <option value="40">Macua</option>
                                                    <option value="50">Sena</option>
                                                </select>
                                                <label for="select2">Vive Com?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="contacto" class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" data-inputmask="'mask': '(999) 999-9999'">
                                                <label>Cell principal</label>
                                                {{--<p class="help-block">US Telephone: (999) 999-9999</p>--}}
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" data-inputmask="'mask': '(999) 999-9999'">
                                                <label>Cell alternativo</label>
                                                {{--<p class="help-block">US Telephone: (999) 999-9999</p>--}}
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group floating-label">
                                                <select id="select2" name="select2" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="30">Portugues</option>
                                                    <option value="40">Macua</option>
                                                    <option value="50">Sena</option>
                                                </select>
                                                <label for="select2">De onde conheceu a linha</label>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row" id="test_append">
                                            <input type="hidden" class="form-control" name="soma" id="soma" value="2">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 col-sm-10"></div>
                                            <div class="col-md-2 col-sm-2">
                                        <button type="button" id="add_utente" class="btn ink-reaction btn-floating-action btn-sm btn-primary" style="margin-right:0!important;padding-right:0!important;"><i class="fa fa-star"></i></button>
                                    </div>
                                        </div>
                                </div>
                                    <!-- END BASIC ELEMENTS -->
                                </div><!--end #step1 -->

                                <div class="tab-pane utent3" id="step3">

                                    <!-- BEGIN BASIC ELEMENTS -->
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-group floating-label">
                                                    <select id="tipo_utente" name="tipo_utente" class="form-control">
                                                        <option value="">&nbsp;</option>
                                                        <option value="Vitima">Vitima</option>
                                                        <option value="Perpetrador">Perpetrador</option>
                                                    </select>
                                                    <label for="tipo_utente">Tipo de Utente</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2"></div>
                                            <div class="col-md-3 col-sm-3" style="margin-top: 25px!important;">
                                                <div>
                                                    <label class="radio-inline radio-styled">
                                                        <input type="radio" name="genero"><span>Masculino</span>
                                                    </label>
                                                    <label class="radio-inline radio-styled">
                                                        <input type="radio" name="genero"><span>Femenino</span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group floating-label">
                                                    <input type="text" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Nome e Sobrenome">
                                                    <label for="help2">Nome(s)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group floating-label">
                                                    <input type="text" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Apelido">
                                                    <label for="help2">Apelido</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-group floating-label">
                                                    <select id="select2" name="select2" class="form-control">
                                                        <option value="">&nbsp;</option>
                                                        <option value="30">Contactante</option>
                                                        <option value="40">Contactante+Vitima</option>
                                                        <option value="50">Contactante+Perpetrador</option>
                                                    </select>
                                                    <label for="select2">Provincia</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-group floating-label">
                                                    <select id="select2" name="select2" class="form-control">
                                                        <option value="">&nbsp;</option>
                                                        <option value="30">Contactante</option>
                                                        <option value="40">Contactante+Vitima</option>
                                                        <option value="50">Contactante+Perpetrador</option>
                                                    </select>
                                                    <label for="select2">Distrito</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-group floating-label">
                                                    <select id="select2" name="select2" class="form-control">
                                                        <option value="">&nbsp;</option>
                                                        <option value="30">Contactante</option>
                                                        <option value="40">Contactante+Vitima</option>
                                                        <option value="50">Contactante+Perpetrador</option>
                                                    </select>
                                                    <label for="select2">Localidade</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group floating-label">
                                                    <input type="text" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Pequena descricao do local">
                                                    <label for="help2">Descricao do local</label>
                                                </div>
                                            </div>
                                        </div><!--end .row -->
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="spinner" value="19"/>
                                                    <label>Idade</label>
                                                    {{--<p class="help-block">Must be over 16</p>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group floating-label">
                                                    <select id="select2" name="select2" class="form-control">
                                                        <option value="">&nbsp;</option>
                                                        <option value="30">Portugues</option>
                                                        <option value="40">Macua</option>
                                                        <option value="50">Sena</option>
                                                    </select>
                                                    <label for="select2">Linguas faladas</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vivecom" class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group floating-label">
                                                    <select id="select2" name="select2" class="form-control">
                                                        <option value="">&nbsp;</option>
                                                        <option value="30">Portugues</option>
                                                        <option value="40">Macua</option>
                                                        <option value="50">Sena</option>
                                                    </select>
                                                    <label for="select2">Situacao educacional</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group floating-label">
                                                    <select id="select2" name="select2" class="form-control">
                                                        <option value="">&nbsp;</option>
                                                        <option value="30">Portugues</option>
                                                        <option value="40">Macua</option>
                                                        <option value="50">Sena</option>
                                                    </select>
                                                    <label for="select2">Vive Com?</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="contacto" class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" data-inputmask="'mask': '(999) 999-9999'">
                                                    <label>Cell principal</label>
                                                    {{--<p class="help-block">US Telephone: (999) 999-9999</p>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" data-inputmask="'mask': '(999) 999-9999'">
                                                    <label>Cell alternativo</label>
                                                    {{--<p class="help-block">US Telephone: (999) 999-9999</p>--}}
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- END BASIC ELEMENTS -->
                                </div><!--end #step3 -->

                                <div class="tab-pane" id="step2">
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <textarea name="textarea1" id="textarea1" class="form-control" rows="3"></textarea>
                                                    <label>Resumo do Contacto</label>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="textarea1" id="textarea1" class="form-control" rows="3"></textarea>
                                                    <label>Impressao do atendente</label>
                                                </div>
                                            </div>

                                        </div>
                                        {{--{{dd($tipomotiv)}}--}}
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
                                                    <select name="tipo_motivo_id" id="" class="form-control">
                                                        <option value="" disabled selected>--Motivo--</option>
                                                        @foreach($motivos as $motivo)
                                                            <option value="{{$motivo->id}}">{{$motivo->motivonome}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!--end #step2 -->
                            </div><!--end .tab-content -->
                            <ul class="pager wizard">
                                <li class="previous first"><a class="btn-raised" href="javascript:void(0);">Primeiro</a></li>
                                <li class="previous"><a class="btn-raised" href="javascript:void(0);">Anterior</a></li>
                                <li class="next last"><a class="btn-raised" href="javascript:void(0);">Ultimo</a></li>
                                <li class="next"><a class="btn-raised" href="javascript:void(0);">Proximo</a></li>
                            </ul>
                        </form>
                    </div><!--end #rootwizard -->
                </div><!--end .card-body -->
            </div><!--end .card -->
        </div><!--end .col -->
    </div><!--end .row -->
    <!-- END VALIDATION FORM WIZARD -->
    @endsection