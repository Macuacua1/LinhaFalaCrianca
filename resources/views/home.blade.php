@extends('layouts.master')
@section('content')
    @if( Auth::user()->hasRole('admin'))

                    <div class="row">

                        <!-- BEGIN ALERT - REVENUE -->
                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body no-padding">
                                    <div class="alert alert-callout alert-info no-margin">
                                        <strong class="pull-right text-success text-lg">0,38% <i class="md md-trending-up"></i></strong>
                                        <strong class="text-xl">32,829</strong><br/>
                                        <span class="opacity-50 text-success">Contactos Registados</span>
                                        <div class="stick-bottom-left-right">
                                            <div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END ALERT - REVENUE -->

                        <!-- BEGIN ALERT - VISITS -->
                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body no-padding">
                                    <div class="alert alert-callout alert-warning no-margin">
                                        <strong class="pull-right text-warning text-lg">0,01% <i class="md md-swap-vert"></i></strong>
                                        <strong class="text-xl">4,901</strong><br/>
                                        <span class="opacity-50 text-warning">Contactos Encaminhados</span>
                                        <div class="stick-bottom-right">
                                            <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END ALERT - VISITS -->

                        <!-- BEGIN ALERT - BOUNCE RATES -->
                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body no-padding">
                                    <div class="alert alert-callout alert-danger no-margin">
                                        <strong class="pull-right text-danger text-lg">0,18% <i class="md md-trending-down"></i></strong>
                                        <strong class="text-xl">420</strong><br/>
                                        <span class="opacity-50 text-danger"  >Casos Registados</span>
                                        <div class="stick-bottom-left-right">
                                            <div class="progress progress-hairline no-margin">
                                                <div class="progress-bar progress-bar-danger" style="width:43%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END ALERT - BOUNCE RATES -->

                        <!-- BEGIN ALERT - TIME ON SITE -->
                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body no-padding">
                                    <div class="alert alert-callout alert-success no-margin">
                                        <h1 class="pull-right text-success"><i class="md md-timer"></i></h1>
                                        <strong class="text-xl">210</strong><br/>
                                        <span class="opacity-50 text-success">Casos Resolvidos</span>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END ALERT - TIME ON SITE -->

                    </div><!--end .row -->
                    <div class="row">

                        <!-- BEGIN SITE ACTIVITY -->
                        <div class="col-md-9">
                            <div class="card ">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card-head">
                                            <header>Site activity</header>
                                        </div><!--end .card-head -->
                                        <div class="card-body height-8">
                                            <div id="flot-visitors-legend" class="flot-legend-horizontal stick-top-right no-y-padding"></div>
                                            <div id="flot-visitors" class="flot height-7" data-title="Activity entry" data-color="#7dd8d2,#0aa89e"></div>
                                        </div><!--end .card-body -->
                                    </div><!--end .col -->
                                    <div class="col-md-4">
                                        <div class="card-head">
                                            <header>Today's stats</header>
                                        </div>
                                        <div class="card-body height-8">
                                            <strong>214</strong> members
                                            <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                            <div class="progress progress-hairline">
                                                <div class="progress-bar progress-bar-primary-dark" style="width:43%"></div>
                                            </div>
                                            756 pageviews
                                            <span class="pull-right text-success text-sm">0,68% <i class="md md-trending-up"></i></span>
                                            <div class="progress progress-hairline">
                                                <div class="progress-bar progress-bar-primary-dark" style="width:11%"></div>
                                            </div>
                                            291 bounce rates
                                            <span class="pull-right text-danger text-sm">21,08% <i class="md md-trending-down"></i></span>
                                            <div class="progress progress-hairline">
                                                <div class="progress-bar progress-bar-danger" style="width:93%"></div>
                                            </div>
                                            32,301 visits
                                            <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                            <div class="progress progress-hairline">
                                                <div class="progress-bar progress-bar-primary-dark" style="width:63%"></div>
                                            </div>
                                            132 pages
                                            <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                            <div class="progress progress-hairline">
                                                <div class="progress-bar progress-bar-primary-dark" style="width:47%"></div>
                                            </div>
                                        </div><!--end .card-body -->
                                    </div><!--end .col -->
                                </div><!--end .row -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END SITE ACTIVITY -->

                        <!-- BEGIN SERVER STATUS -->
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-head">
                                    <header class="text-primary">Server status</header>
                                </div><!--end .card-head -->
                                <div class="card-body height-4">
                                    <div class="pull-right text-center">
                                        <em class="text-primary">Temperature</em>
                                        <br/>
                                        <div id="serverStatusKnob" class="knob knob-shadow knob-primary knob-body-track size-2">
                                            <input type="text" class="dial" data-min="0" data-max="100" data-thickness=".09" value="50" data-readOnly=true>
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                                <div class="card-body height-4 no-padding">
                                    <div class="stick-bottom-left-right">
                                        <div id="rickshawGraph" class="height-4" data-color1="#0aa89e" data-color2="rgba(79, 89, 89, 0.2)"></div>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END SERVER STATUS -->

                    </div><!--end .row -->
                    <div class="row">

                        <!-- BEGIN TODOS -->
                        <div class="col-md-3">
                            <div class="card ">
                                <div class="card-head">
                                    <header>Todo's</header>
                                    <div class="tools">
                                        <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                                    </div>
                                </div><!--end .card-head -->
                                <div class="card-body no-padding height-9 scroll">
                                    <ul class="list" data-sortable="true">
                                        <li class="tile">
                                            <div class="checkbox checkbox-styled tile-text">
                                                <label>
                                                    <input type="checkbox" checked>
                                                    <span>Call clients for follow-up</span>
                                                </label>
                                            </div>
                                            <a class="btn btn-flat ink-reaction btn-default">
                                                <i class="md md-delete"></i>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <div class="checkbox checkbox-styled tile-text">
                                                <label>
                                                    <input type="checkbox">
                                                    <span>
												Schedule meeting
												<small>opportunity for new customers</small>
											</span>
                                                </label>
                                            </div>
                                            <a class="btn btn-flat ink-reaction btn-default">
                                                <i class="md md-delete"></i>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <div class="checkbox checkbox-styled tile-text">
                                                <label>
                                                    <input type="checkbox">
                                                    <span>
												Upload files to server
												<small>The files must be shared with all members of the board</small>
											</span>
                                                </label>
                                            </div>
                                            <a class="btn btn-flat ink-reaction btn-default">
                                                <i class="md md-delete"></i>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <div class="checkbox checkbox-styled tile-text">
                                                <label>
                                                    <input type="checkbox">
                                                    <span>Forward important tasks</span>
                                                </label>
                                            </div>
                                            <a class="btn btn-flat ink-reaction btn-default">
                                                <i class="md md-delete"></i>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <div class="checkbox checkbox-styled tile-text">
                                                <label>
                                                    <input type="checkbox">
                                                    <span>Forward important tasks</span>
                                                </label>
                                            </div>
                                            <a class="btn btn-flat ink-reaction btn-default">
                                                <i class="md md-delete"></i>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <div class="checkbox checkbox-styled tile-text">
                                                <label>
                                                    <input type="checkbox">
                                                    <span>Forward important tasks</span>
                                                </label>
                                            </div>
                                            <a class="btn btn-flat ink-reaction btn-default">
                                                <i class="md md-delete"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END TODOS -->

                        <!-- BEGIN REGISTRATION HISTORY -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-head">
                                    <header>Registration history</header>
                                    <div class="tools">
                                        <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
                                        <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                                        <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                                    </div>
                                </div><!--end .card-head -->
                                <div class="card-body no-padding height-9">
                                    <div class="row">
                                        <div class="col-sm-6 hidden-xs">
                                            <div class="force-padding text-sm text-default-light">
                                                <p>
                                                    <i class="md md-mode-comment text-primary-light"></i>
                                                    The registrations are measured from the time that the redesign was fully implemented and after the first e-mailing.
                                                </p>
                                            </div>
                                        </div><!--end .col -->
                                        <div class="col-sm-6">
                                            <div class="force-padding pull-right text-default-light">
                                                <h2 class="no-margin text-primary-dark"><span class="text-xxl">66.05%</span></h2>
                                                <i class="fa fa-caret-up text-success fa-fw"></i> more registrations
                                            </div>
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                    <div class="stick-bottom-left-right force-padding">
                                        <div id="flot-registrations" class="flot height-5" data-title="Registration history" data-color="#0aa89e"></div>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END REGISTRATION HISTORY -->

                        <!-- BEGIN NEW REGISTRATIONS -->
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-head">
                                    <header>New registrations</header>
                                    <div class="tools hidden-md">
                                        <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                                    </div>
                                </div><!--end .card-head -->
                                <div class="card-body no-padding height-9 scroll">
                                    <ul class="list divider-full-bleed">
                                        <li class="tile">
                                            <div class="tile-content">
                                                <div class="tile-icon">
                                                    <img src="/img/modules/materialadmin/avatar9463a.jpg?1422538626" alt="" />
                                                </div>
                                                <div class="tile-text">Ann Laurens</div>
                                            </div>
                                            <a class="btn btn-flat ink-reaction">
                                                <i class="md md-block text-default-light"></i>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <div class="tile-content">
                                                <div class="tile-icon">
                                                    <img src="/img/modules/materialadmin/avatar42dba.jpg?1422538625" alt="" />
                                                </div>
                                                <div class="tile-text">Alex Nelson</div>
                                            </div>
                                            <a class="btn btn-flat ink-reaction">
                                                <i class="md md-block text-default-light"></i>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <div class="tile-content">
                                                <div class="tile-icon">
                                                    <img src="/img/avatar114335.jpg" alt="" />
                                                </div>
                                                <div class="tile-text">Mary Peterson</div>
                                            </div>
                                            <a class="btn btn-flat ink-reaction">
                                                <i class="md md-block text-default-light"></i>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <div class="tile-content">
                                                <div class="tile-icon">
                                                    <img src="/img/modules/materialadmin/avatar7463a.jpg" alt="" />
                                                </div>
                                                <div class="tile-text">Philip Ericsson</div>
                                            </div>
                                            <a class="btn btn-flat ink-reaction">
                                                <i class="md md-block text-default-light"></i>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <div class="tile-content">
                                                <div class="tile-icon">
                                                    <img src="/img/modules/materialadmin/avatar8463a.jpg?1422538626" alt="" />
                                                </div>
                                                <div class="tile-text">Jim Peters</div>
                                            </div>
                                            <a class="btn btn-flat ink-reaction">
                                                <i class="md md-block text-default-light"></i>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <div class="tile-content">
                                                <div class="tile-icon">
                                                    <img src="/img/modules/materialadmin/avatar2666b.jpg?1422538624" alt="" />
                                                </div>
                                                <div class="tile-text">Jessica Cruise</div>
                                            </div>
                                            <a class="btn btn-flat ink-reaction">
                                                <i class="md md-block text-default-light"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END NEW REGISTRATIONS -->

                    </div><!--end .row -->
    @endif
    @if(Auth::user()->hasRole('user'))
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
                <!-- BEGIN LAYOUT LEFT ALIGNED -->
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

                                <div class="container">
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
                                            <div id="anonimo" class="col-md-3 col-sm-3" style="margin-top: 30px!important;">
                                                <label class="checkbox-inline checkbox-styled">
                                                    <input type="checkbox" value="Sim" name="anonimo"><span>Permanecer anonimo(a)</span>
                                                </label>

                                            </div><!--end .col -->
                                        </div>
                                        <div class="row">
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
                                                        <option value="0"disabled selected>Linguas Faladas</option>
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
                                </div>
                            </div>

                            <div class="tab-pane" id="contactoo">

                                <div class="container">
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
                            </div>
                        </div><!--end .card-body -->
                    </div><!--end .card -->
                </div><!--end .col -->
            </div><!--end .col -->
        </div><!--end .row -->
        <!-- END VALIDATION FORM WIZARD -->
    @endif
@endsection