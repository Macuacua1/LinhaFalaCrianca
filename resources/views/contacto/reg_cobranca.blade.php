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

                    <div class="card-body tab-content" id="conteudo">
                        <div class="tab-pane active" id="first0">

                            {{--<div class="container">--}}
                            <div class="row" id="test_append">
                                <input type="hidden" class="form-control" name="soma" id="soma" value="0">
                            </div>
                            <form class="form form-validate" id="form_add_utente" novalidate="novalidate" method="post" action="{{url('/addReg-cobranca')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="caso_id" id="caso_id" class="form-control" value="{{$caso_id}}">
                                <div class="row" style="margin: 0 40px">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group floating-label">
                                            <select id="tipo_contacto" name="tipo_contacto" class="form-control" required>
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

                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group floating-label">
                                            <select id="tipo_utente" name="tipo_utente" class="form-control" disabled required>
                                                {{--<option value="" disabled selected>Tipo de Utente</option>--}}
                                                <option value="Contactante"  selected>Contactante</option>

                                            </select>
                                            {{--<label for="tipo_utente">Tipo de Utente</label>--}}
                                        </div>
                                    </div>
                                    {{--<div class="col-md-2 col-sm-2"></div>--}}
                                    <div class="col-md-4 col-sm-4" style="margin-top: 30px!important;">
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="genero" value="Masculino"><span>Masculino</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="genero" value="Femenino"><span>Femenino</span>
                                        </label>
                                    </div>
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
                                </div><!--end .row -->

                                <div class="row" style="margin: -10px 40px 0 40px">
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

                    </div><!--end .card-body -->
                </div><!--end .card -->
            </div><!--end .col -->
        </div><!--end .col -->
        {{--</div><!--end .row -->--}}
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