
@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Detalhes do Caso</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .row -->

        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body tab-content" id="conteudo">
        <div class="section-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <!-- BEGIN FIXED TIMELINE -->
                        <span style="margin-left: 10px;font-size: 16px;color: black"><b>Mensagens</b></span>
                        <ul class="timeline collapse-lg timeline-hairline">
                            @foreach($msgs as $msg)
                                <li class="timeline-inverted">
                                    <div class="timeline-circ circ-xl style-primary"><span class="fa fa-quote-left"></span></div>
                                    <div class="timeline-entry">
                                        <div class="card style-default-light">
                                            <div class="card-body small-padding">
                                                {{--<img class="img-circle img-responsive pull-left width-1" src="../../assets/img/modules/materialadmin/avatar9463a.jpg?1422538626" alt="" />--}}
                                                <span class="text-medium">{{$msg->mensagem}}</span><br/>
                                                <span class="opacity-50" style="color:#ed0000">
										{{date('d-M-Y',strtotime($msg->created_at))}}, {{date('H:m:s',strtotime($msg->created_at))}}
									</span>
                                            </div><!--end .card-body -->
                                        </div><!--end .card -->
                                    </div><!--end .timeline-entry -->
                                </li>
                            @endforeach
                        </ul>
                        <!-- END FIXED TIMELINE -->

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a href="{{route('contacto.edit',$caso->id)}}"><button class="btn btn-primary btn-sm" data-id="{{$caso->id}}" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Registar Contacto">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </button></a>
                        @if($caso->motivo_id)
                            <button class="edit-caso btn btn-success btn-sm" data-id="{{$caso->id}}" data-title="{{$caso->responsavel->respnome}}" data-description="{{$caso->responsavel_id}}" disabled>
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                        @else
                            <a><button class="edit-caso btn btn-success btn-sm" data-toggle="modal" data-target="#formModal" data-id="{{$caso->id}}" data-title="{{$caso->responsavel->respnome}}" data-description="{{$caso->responsavel_id}}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button></a>
                        @endif
                        @if($caso->motivo_id)
                            <a><button class="encerrar-caso btn btn-success btn-sm" data-id="" data-toggle="modal" data-target="#formModall" disabled>
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </button></a>
                        @else
                            <a><button class="encerrar-caso btn btn-success btn-sm" data-id="{{$caso->id}}" data-toggle="modal" data-target="#formModall">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </button></a>
                        @endif
                        <div class="row" style="margin-top: -30px">
                            <div class="col-md-12 col-sm-12" style="border: 1px solid #ccc;margin: 45px 10px 20px 0;height: auto">
                               {{--<div class="row" style="width: 30%;height: 15px;margin:-25px 20px 0 200px">--}}
                               <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        <span style="margin: -15px 0 0 10px;font-size: 16px;color: black"><b><center>Contacto Principal</center></b></span>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="clearfix" style="background-color: #f2f3f3;margin: 5px auto">
                                                <a href="{{route('contacto.show', $contacto_princ->id)}}">
                                                    <i class="fa fa-phone" aria-hidden="true"></i> Contacto<br/>
                                                    <span class="opacity-50">
											<i class="fa fa-calendar" aria-hidden="true"></i> {{date('d-M-Y',strtotime( $contacto_princ->created_at))}}
										</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12" style="border: 1px solid #ccc;margin:-5px 10px 20px 0;height: 120px">
                                <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        <span style="margin-left: 10px;font-size: 16px;color: black"><b>Contactos de Cobrança </b></span>
                                    </div>
                                </div>
                                @foreach($contactos_cobranca as $contactos)
                                <div class="col-md-4 col-sm-4">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="clearfix" style="background-color: #f2f3f3;margin: 5px auto">
                                            <a href="{{route('contacto.show',$contactos->id)}}">
                                                <i class="fa fa-phone" aria-hidden="true"></i> Contacto<br/>
                                                <span class="opacity-50">
											<i class="fa fa-calendar" aria-hidden="true"></i> {{date('d-M-Y',strtotime($contactos->created_at))}}
										</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                    @endforeach
                            </div>

                        </div>
                        <!-- BEGIN FORM MODAL MARKUP -->
                        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="formModalLabel">Actualizar Caso</h4>
                                    </div>
                                    <form class="form-horizontal form-validate" role="form"  method="post" id="form_edit_caso" novalidate="novalidate">
                                        <div class="modal-body">
                                            {{--<div class="row" id="responsavel">--}}
                                            <div class="form-group" >
                                                <div class="col-sm-3">
                                                    <label for="email1" class="control-label">Responsavel</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select name="responsavel_id" id="responsavel_id" class="form-control">
                                                        <option value="" disabled selected>--Reencaminhar para:--</option>
                                                        @foreach($resps as $resp)
                                                            <option value="{{$resp->id}}">{{$resp->respnome}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{--</div>--}}
                                            {{--<div class="row" id="status">--}}
                                            <div class="form-group" id="status">
                                                <div class="col-sm-3">
                                                    <label for="email1" class="control-label">Estado</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select name="estado_caso" id="estado_caso" class="form-control">
                                                        <option value="" disabled selected>--Novo Estado--</option>
                                                        <option value="Em Progresso">Em Progresso</option>
                                                        <option value="Assistido Temporariamente">Assistido Temporariamente</option>
                                                        <option value="Assistido">Assistido</option>
                                                        <option value="Impossivel Proceder">Impossivel Proceder</option>
                                                        {{--<option value="Fechado">Fechado</option>--}}
                                                    </select>
                                                </div>
                                            </div>
                                            {{--</div>--}}
                                            {{--<div class="row" id="mensagem">--}}
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label for="email1" class="control-label">Mensagem</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea name="mensagem" id="textarea1" class="form-control" rows="3"></textarea>

                                                </div>
                                            </div>
                                            {{--</div>--}}

                                            <input type="hidden" class="form-control" id="caso_id" name="caso_id">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                <span class='glyphicon glyphicon-remove'></span> Close</button>
                                            <button type="button" class="btn actionBtn" data-dismiss="modal">
                                                <span id="footer_action_button" class='glyphicon'> </span></button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- END FORM MODAL MARKUP -->
                        <!-- BEGIN FORM MODAL MARKUP -->
                        <div class="modal fade" id="formModall" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="formModalLabel">Encerrar Caso</h4>
                                    </div>
                                    <form class="form-horizontal" role="form"  method="post" id="form_close_caso">
                                        <div class="modal-body">
                                            {{--<div class="row" id="cat_mot">--}}
                                            <div class="form-group">
                                                <div class="col-sm-3" >
                                                    <label for="email1" class="control-label">Categoria do Motivo</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select name="tipo_motivo_id" id="categoriamotivo" class="form-control categoriamotivo">
                                                        <option value="" disabled selected>--Categoria do Motivo--</option>
                                                        @foreach($tipomotivos as $tipomotivo)
                                                            <option value="{{$tipomotivo->id}}">{{$tipomotivo->tipomotivonome}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{--</div>--}}
                                            {{--<div class="row" id="mot">--}}
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label for="password1" class="control-label">Motivo</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select id="motivo"  class="form-control motivonome" name="motivo_id">
                                                        <option value="0" disabled="true" selected="true">--Motivo--</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{--</div>--}}
                                            <input type="hidden" class="form-control" id="caso_close_id" name="caso_id">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                <span class='glyphicon glyphicon-remove'></span> Close</button>
                                            <button type="button" class="btn btn-success close_caso" data-dismiss="modal">
                                                <span id="fechar_caso" class='glyphicon glyphicon-check'></span>Encerrar</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- END FORM MODAL MARKUP -->
                    </div>
                </div>

            </div><!--end .container -->
        </div><!--end .section-body -->
    {{--</section>--}}
                </div>
            </div>
    </div>

@endsection
@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.edit-caso', function() {
                $('#footer_action_button').text("Actualizar");
                $('#footer_action_button').addClass('glyphicon-check');
                $('.actionBtn').addClass('btn-success');
                $('.actionBtn').addClass('edit_caso');
//                $('.modal-title').text('Actualizar Caso');
                $('#caso_id').val($(this).data('id'));
                $('.form-horizontal').show();

            });
            $(document).on('click', '.encerrar-caso', function() {

                $('#caso_close_id').val($(this).data('id'));
                $('.form-horizontal').show();
            });

            $('.modal-footer').on('click', '.close_caso', function() {
                var dados = $('#form_close_caso').serialize();
//                 alert(dados);
                $.ajax({
                    type:'post',
                    url:'/editcaso',
                    data:dados,
                    success:function(data){
                        $('#form_edit_caso')[0].reset();

                        toastr.success("Actualizado Com Sucesso!");
                        document.location.href="{{url('caso')}}";
                    },
                    error:function(){
                        toastr.error("Erro na Actualizacao!");
                    }
                });
            });
            $('.modal-footer').on('click', '.edit_caso', function() {
                var dados = $('#form_edit_caso').serialize();
                // alert(dados);
                $.ajax({
                    type:'post',
                    url:'/editcaso',
                    data:dados,
                    success:function(data){
                        $('#form_edit_caso')[0].reset();

                        toastr.success("Actualizado Com Sucesso!");
                        document.location.href="{{url('caso')}}";
                    },
                    error:function(){
                        toastr.error("Erro na Actualizacao!");
                    }
                });
            });
            $('.modal-footer').on('click', '.fechar_caso', function() {
                var dados = $('#form_edit_caso').serialize();
                // alert(dados);
                $.ajax({
                    type:'post',
                    url:'/editcaso',
                    data:dados,
                    success:function(data){
                        $('#form_edit_caso')[0].reset();
                        $('.encerrar-caso').addClass('disabled');
                        $('.edit-caso').addClass('disabled');

                        toastr.success("Encerrado Com Sucesso!");
                        document.location.href="{{url('caso')}}";
                    },
                    error:function(){
                        toastr.error("Erro na Actualizacao!");
                    }
                });
            });

        })
    </script>
@endsection