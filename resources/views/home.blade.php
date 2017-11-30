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
                                        <strong class="text-xl">{{$total_contactos}}</strong><br/>
                                        <span class="opacity-50 text-success">Contactos Registados</span>
                                        <div class="stick-bottom-left-right">
                                            <div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END ALERT - REVENUE -->



                        <!-- BEGIN ALERT - BOUNCE RATES -->
                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body no-padding">
                                    <div class="alert alert-callout alert-danger no-margin">
                                        <strong class="pull-right text-danger text-lg">0,18% <i class="md md-trending-down"></i></strong>
                                        <strong class="text-xl">{{$total_vitimas}}</strong><br/>
                                        <span class="opacity-50 text-danger"  >Total de Vitimas</span>
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
                        <!-- BEGIN ALERT - VISITS -->
                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body no-padding">
                                    <div class="alert alert-callout alert-warning no-margin">
                                        <strong class="pull-right text-warning text-lg">0,01% <i class="md md-swap-vert"></i></strong>
                                        <strong class="text-xl">{{$total_casos}}</strong><br/>
                                        <span class="opacity-50 text-warning">Casos Registados</span>
                                        <div class="stick-bottom-right">
                                            <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END ALERT - VISITS -->

                        <!-- BEGIN ALERT - TIME ON SITE -->
                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <div class="card-body no-padding">
                                    <div class="alert alert-callout alert-success no-margin">
                                        <h1 class="pull-right text-success"><i class="md md-timer"></i></h1>
                                        <strong class="text-xl">{{$resol_casos}}</strong><br/>
                                        <span class="opacity-50 text-success">Casos Resolvidos</span>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                        <!-- END ALERT - TIME ON SITE -->

                    </div><!--end .row -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6" style="margin-bottom: 15px">

                                        <center>
                                            {{--@if($contacts>0)--}}
                                            {!! $contacto->render() !!}
                                                {{--@endif--}}

                                        </center>


                        </div><!--end .col -->
                        <div class="col-md-6 col-sm-6" style="margin-bottom: 15px">


                                <center>
                                    {{--@if($cases>0)--}}
                                    {!! $provincias->render() !!}
                                     {{--@endif--}}
                                </center>


                        </div><!--end .col -->
                        </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">

                                <center>
                                    {{--@if($contacts>0)--}}
                                    {!! $chart->render() !!}
                                     {{--@endif--}}
                                </center>


                        </div><!--end .col -->
                        <div class="col-md-6 col-sm-6">

                                <center>
                                    {!! $caso->render() !!}
                                    {{--{!! $case->render() !!}--}}

                                </center>


                        </div><!--end .col -->

                    </div><!--end .row -->
    @endif
    @if(Auth::user()->hasRole('user'))
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
                            <form class="form form-validate" id="form_add_utente" novalidate="novalidate" method="post" action="{{url('/addUtente')}}">
                                {{csrf_field()}}
                                <div class="row" style="margin: 0 40px">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group floating-label">
                                            <select id="tipo_contact" name="tipo_contact" class="form-control" required>
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
                                            <select id="tipo_utente" name="tipo_utente" class="form-control" required>
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
                                <div class="row" id="anonimous" style="margin: 0 40px">
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
                                <div class="row" style="margin: 0 40px">
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

                                <div id="vivecom_vitima" class="row" style="margin: 0 40px">
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
                                <div class="row" id="viveducacional" style="margin: 0 40px">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <select id="situacao_educacional" name="situacao_educacional" class="form-control" required>
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
                                            <select id="vive_com" name="vive_com" class="form-control" required>
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

                                <div  class="row" style="margin: 0 40px">
                                    <div class="col-md-4 col-sm-4"id="lingua">
                                        <div class="form-group floating-label" >
                                            <select id="idioma" name="idioma" class="form-control" required>
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
                                            <select id="relacao_vitima" name="relacao_vitima" class="form-control" required>
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
                                <div class="row" style="margin: 0 70px">
                                    <button class="add_utente btn btn-success pull-right" type="submit">
                                        <span class="glyphicon glyphicon-plus"></span> Adicionar Novo
                                    </button>
                                </div>
                            </form>

                        </div>

                        <div class="tab-pane" id="contactoo">
                            {{--<h1>{{Session::get('tipocontacto')}}</h1>--}}
                            {{--<div class="container">--}}
                            <form class="form form-validate" id="form_add_contacto" novalidate="novalidate" method="post" action="/registarcontacto">
                                {{csrf_field()}}
                                <div class="row" style="margin: -10px 40px 0 40px">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            @if(Session::has('tipocontacto'))
                                                <input type="hidden" name="tipo_contacto" id="tipo_contacto" class="form-control" value="{{Session::get('tipocontacto')}}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <textarea name="resumo_contacto" id="resumo_contacto" class="form-control" rows="3" required></textarea>
                                            <label>Resumo do Contacto</label>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="impressao_atendente" id="impressao_atendente" class="form-control" rows="3" required></textarea>
                                            <label>Impressao do atendente</label>
                                        </div>
                                    </div>

                                </div>
                                <div id="" class="row" style="margin: 0 40px">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <select name="tipo_motivo_id" id="categoriamotivo" class="form-control categoriamotivo" required>
                                                <option value="" disabled selected>--Categoria do Motivo--</option>
                                                @foreach($tipomotivos as $tipomotivo)
                                                    <option value="{{$tipomotivo->id}}">{{$tipomotivo->tipomotivonome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group floating-label">
                                            <select id="motivo"  class="form-control motivonome" name="motivo_id" required>
                                                <option value="0" disabled="true" selected="true">--Motivo--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!--end .row -->

                                <div class="row" style="margin: 0 40px">
                                    <div class="col-md-10 col-sm-10"></div>
                                    <div class="col-md-2 col-sm-2">
                                        <button class="btn btn-success pull-right" type="submit"  data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Gravar dados do Contacto">
                                            <span class="glyphicon glyphicon-floppy-save"></span> Registar
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        {{--</div>--}}
                    </div><!--end .card-body -->
                </div><!--end .card -->
            </div><!--end .col -->
        </div><!--end .col -->
        <!-- END VALIDATION FORM WIZARD -->
    @endif
@endsection
@section('scripts')
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
    </script>
@endsection