
@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="margin: -15px 0 0 auto">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Casos</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .col -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="form">
                    <div class="row">

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <div  class="input-daterange input-group demo-date-range" id="demo-date-range">
                                    <div class="input-group-content">
                                        <input type="text" class="form-control" name="start" id="start"/>
                                        <label>De</label>
                                    </div>
                                    <span class="input-group-addon">a</span>
                                    <div class="input-group-content">
                                        <input type="text" class="form-control" name="end" id="end" />
                                        <label>Para</label>
                                        <div class="form-control-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="form-group floating-label">
                                <select name="estado" id="estado" class="form-control">
                                    <option value="" disabled selected>--Estado:--</option>
                                    <option value="Em Progresso">Em Progresso</option>
                                    <option value="Assistido Temporariamente">Assistido Temporariamente</option>
                                    <option value="Assistido">Assistido</option>
                                    <option value="Impossivel Proceder">Impossivel Proceder</option>
                                    <option value="Fechado">Fechado</option>
                                    <option value="">Seleccionar todos</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                            <div class="form-group floating-label">
                                <select name="responsavel_id" id="responsavel_id" class="form-control">
                                    <option value="" disabled selected>--Instituicao:--</option>
                                    @foreach($resps as $resp)
                                        <option value="{{$resp->id}}">{{$resp->respnome}}</option>
                                    @endforeach
                                    <option value="">Seleccionar todos</option>
                                </select>
                            </div>
                            </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="form-group floating-label">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="" disabled selected>--Utilizador:--</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->nome}}</option>
                                    @endforeach
                                    <option value="">Seleccionar todos</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--end .card-body -->
        </div><!--end .card -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table no-margin">

                        <thead>
                        <tr>
                            <th>ID</th>
                            {{--<th>Criado a </th>--}}
                            <th>Inserido por</th>
                            <th>Criado a </th>
                            <th>Actualizado a </th>
                            <th>Registado a </th>
                            <th>Responsavel</th>
                            <th>Estado do Caso</th>
                            <th>Motivo</th>
                            <th>Accao</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        @foreach ($casos as $caso)
                            <tr>
                                <td>{{$caso->id}}</td>
                                <td>{{$caso->user->nome}}</td>
                                {{--<td>{{$contacto->created_at}}</td>--}}
                                <td>{{date('d-M-Y',strtotime($caso->created_at))}}</td>
                                <td>{{date('d-M-Y',strtotime($caso->updated_at))}}</td>
                                <td>{{$caso->created_at->diffForHumans()}}</td>
                                <td>{{$caso->responsavel->respnome}}</td>
                                <td>
                                    @if($caso->estado_caso =='Fechado')
                                    <span style="color: #3c763d">{{$caso->estado_caso}}</span>
                                        @endif
                                        @if($caso->estado_caso =='Impossivel Proceder')
                                            <span style="color: red">{{$caso->estado_caso}}</span>
                                        @endif
                                        @if($caso->estado_caso =='Assistido')
                                            <span style="color: #31708f">{{$caso->estado_caso}}</span>
                                        @endif
                                        @if($caso->estado_caso =='Assistido Temporariamente')
                                            <span style="color: #8a6d3b">{{$caso->estado_caso}}</span>
                                        @endif
                                        @if($caso->estado_caso =='Em Progresso')
                                            <span style="color: #0aa298">{{$caso->estado_caso}}</span>
                                        @endif
                                </td>
                                @if($caso->motivo_id)
                                <td>{{$caso->motivo->motivonome}}</td>
                                @else
                                    <td>Sem Motivo</td>
                                @endif
                                <td>
                                    <a href="{{route('caso.show',$caso->id)}}"><button class="btn btn-info btn-sm" data-id="{{$caso->id}}" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Ver detalhes do caso">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button></a>
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

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!--end .table-responsive -->
                {{--<div class="row">--}}
                    {{--<center>--}}
                        {{--{{$casos->render()}}--}}
                    {{--</center>--}}

                {{--</div>--}}
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
            </div><!--end .card-body -->
        </div><!--end .card -->
    </div><!--end .col -->
@endsection
@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#datatable').DataTable( {
                "order": [[ 0, 'desc' ], [ 1, 'desc' ]],
                "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );

            $("#start").on('change',function(){
                var minDate = $('#start').datepicker('getDate');
                $("#end").datepicker("change", { minDate: minDate });
                var inicio=$('#start').val();
                var fim= $('#end').val();
                var estado=$('#estado').val();
                var responsavel_id=$('#responsavel_id').val();
                var user_id=$('#user_id').val();
                pesquisarCaso(inicio,fim,estado,responsavel_id,user_id);
            });

            $("#end").on('change',function () {
                var maxDate = $('#end').datepicker('getDate');
                // $("#start").datepicker("change", { maxDate: maxDate });
                var inicio=$('#start').val();
                var fim= $('#end').val();
                var estado=$('#estado').val();
                var responsavel_id=$('#responsavel_id').val();
                var user_id=$('#user_id').val();
                // alert(fim);
                pesquisarCaso(inicio,fim,estado,responsavel_id,user_id);
            });

            $('#estado').on('change',function(){
                var inicio=$('#start').val();
                var fim= $('#end').val();
                var estado=$('#estado').val();
                var responsavel_id=$('#responsavel_id').val();
                var user_id=$('#user_id').val();
                pesquisarCaso(inicio,fim,estado,responsavel_id,user_id);

            });
            $('#responsavel_id').on('change',function(){
                var inicio=$('#start').val();
                var fim= $('#end').val();
                var estado=$('#estado').val();
                var responsavel_id=$('#responsavel_id').val();
                var user_id=$('#user_id').val();
                pesquisarCaso(inicio,fim,estado,responsavel_id,user_id);

            });
            $('#user_id').on('change',function(){
                var inicio=$('#start').val();
                var fim= $('#end').val();
                var estado=$('#estado').val();
                var responsavel_id=$('#responsavel_id').val();
                var user_id=$('#user_id').val();
                console.log(user_id);
                pesquisarCaso(inicio,fim,estado,responsavel_id,user_id);

            });
            function pesquisarCaso(criteria1,criteria2,criteria3,criteria4,criteria5) {
                var dados= " ";
                $.ajax({
                    type: 'post',
                    url: '/pesquisacaso',
                    data: {inicio:criteria1,fim:criteria2,estado:criteria3,responsavel_id:criteria4,user_id:criteria5},
                    success: function(data) {
                        if (data) {

                            $('tbody').html(data);

                        }else {
                             $('tbody').empty();
//                            alert('Nao Existem dados');

                        }
                    }
                });

            }

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
