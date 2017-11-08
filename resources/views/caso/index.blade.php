
@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
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
                        {{--<div class='col-md-2'>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class='input-group date' id='datetimepicker6'>--}}
                                    {{--<input type='text' class="form-control" />--}}
                                    {{--<span class="input-group-addon">--}}
                    {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class='col-md-2'>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class='input-group date' id='datetimepicker7'>--}}
                                    {{--<input type='text' class="form-control" />--}}
                                    {{--<span class="input-group-addon">--}}
                    {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <div  class="input-daterange input-group" id="demo-date-range">
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
                                    <option value="">Sem Estado</option>
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
                            <th>Responsavel</th>
                            <th>Estado do Caso</th>
                            <th>Motivo</th>
                            <th>Accao</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        @foreach ($casos as $caso)
                            <tr>
                                <td>CA-{{$caso->id}}</td>
                                <td>{{$caso->user->nome}}</td>
                                {{--<td>{{$contacto->created_at}}</td>--}}
                                <td>{{date('d-M-Y',strtotime($caso->created_at))}}</td>
                                <td>{{date('d-M-Y',strtotime($caso->updated_at))}}</td>
                                <td>{{$caso->responsavel->respnome}}</td>
                                <td>
                                    @if($caso->estado_caso =='Fechado')
                                    <span style="color: #4caf50">{{$caso->estado_caso}}</span>
                                        @endif
                                        @if($caso->estado_caso =='Impossivel Proceder')
                                            <span style="color: red">{{$caso->estado_caso}}</span>
                                        @endif
                                        @if($caso->estado_caso =='Assistido')
                                            <span style="color: #0aa89e">{{$caso->estado_caso}}</span>
                                        @endif
                                        @if($caso->estado_caso =='Assistido Temporariamente')
                                            <span style="color: #0c84e4">{{$caso->estado_caso}}</span>
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
                                    <a href="{{route('caso.show',$caso->id)}}"><button class="btn btn-info" data-id="{{$caso->id}}" data-title="" data-description="">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </button></a>
                                    @if($caso->motivo_id)
                                        <button class="edit-caso btn btn-success" data-id="{{$caso->id}}" data-title="{{$caso->responsavel->respnome}}" data-description="{{$caso->responsavel_id}}" disabled>
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </button>
                                    @else
                                        <button class="edit-caso btn btn-success" data-id="{{$caso->id}}" data-title="{{$caso->responsavel->respnome}}" data-description="{{$caso->responsavel_id}}">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </button>
                                    @endif
                                @if($caso->motivo_id)
                                        <button class="encerrar-caso btn btn-success" data-id="{{$caso->id}}" data-title="" data-description="" disabled>
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </button>
                                @else
                                        <button class="encerrar-caso btn btn-success" data-id="{{$caso->id}}" data-title="" data-description="">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </button>
                                @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!--end .table-responsive -->
                <div class="row">
                    <center>
                        {{$casos->render()}}
                    </center>

                </div>
                <div id="myModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static" style="">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form" method="post" id="form_edit_caso">
                                    <div class="col-md-12 col-sm-12" id="responsavel">
                                        <div class="form-group floating-label">
                                            <select name="responsavel_id" id="responsavel_id" class="form-control">
                                                <option value="" disabled selected>--Reencaminhar para:--</option>
                                                @foreach($resps as $resp)
                                                    <option value="{{$resp->id}}">{{$resp->respnome}}</option>
                                                @endforeach
                                            </select>
                                            {{--<label for="help2">Reencaminhar para:</label>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="hidden" class="form-control" id="caso_id" name="caso_id">
                                    </div>
                                    <div class="col-md-12 col-sm-12" id="status">
                                        <div class="form-group floating-label">
                                            <select name="estado_caso" id="estado_caso" class="form-control">
                                                <option value="" disabled selected>--Novo Estado--</option>
                                                <option value="Em Progresso">Em Progresso</option>
                                                <option value="Assistido Temporariamente">Assistido Temporariamente</option>
                                                <option value="Assistido">Assistido</option>
                                                <option value="Impossivel Proceder">Impossivel Proceder</option>
                                                <option value="Fechado">Fechado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12" id="mensagem">
                                        <div class="form-group floating-label">
                                            <textarea name="mensagem" id="textarea1" class="form-control" rows="3"></textarea>
                                            <label for="help2">Mensagem:</label>
                                        </div>
                                    </div>
                                        <div class="col-md-6 col-sm-6" id="cat_motivo">
                                            <div class="form-group floating-label">
                                                <select name="tipo_motivo_id" id="categoriamotivo" class="form-control categoriamotivo">
                                                    <option value="" disabled selected>--Categoria do Motivo--</option>
                                                    @foreach($tipomotivos as $tipomotivo)
                                                        <option value="{{$tipomotivo->id}}">{{$tipomotivo->tipomotivonome}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6" id="motiv">
                                            <div class="form-group floating-label">
                                                <select id="motivo"  class="form-control motivonome" name="motivo_id">
                                                    <option value="0" disabled="true" selected="true">--Motivo--</option>
                                                </select>
                                            </div>
                                        </div>

                                </form>

                                <div class="modal-footer">
                                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                                        <span id="footer_action_button" class='glyphicon'> </span>
                                    </button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span class='glyphicon glyphicon-remove'></span> Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                $('#mensagem').show();
                $('#status').show();
                $('#responsavel').show();
                $('#motiv').hide();
                $('#cat_motivo').hide();
                $('.modal-title').text('Actualizar Caso');
                $('#caso_id').val($(this).data('id'));
                $('.form-horizontal').show();
                $('#myModal').modal({
                    dismissible:false,
                    in_duration:3000,
                    out_duration:3000,
                    backdrop: 'static',
                    keyboard: false
                    // opacity:.9
                });
            });
            $(document).on('click', '.encerrar-caso', function() {
                $('#footer_action_button').text("Encerrar");
                $('#footer_action_button').addClass('glyphicon-check');
                $('.actionBtn').addClass('btn-success');
                $('.actionBtn').addClass('fechar_caso');
                $('#motiv').show();
                $('#cat_motivo').show();
                $('#mensagem').hide();
                $('#status').hide();
                $('#responsavel').hide();
                $('.modal-title').text('Encerrar Caso');
                $('#caso_id').val($(this).data('id'));
                $('.form-horizontal').show();
                $('#myModal').modal({
                    dismissible:false,
                    in_duration:3000,
                    out_duration:3000,
                    backdrop: 'static',
                    keyboard: false
                    // opacity:.9
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

                        toastr.success("Actualizado Com Sucesso!");
                    },
                    error:function(){
                        toastr.error("Erro na Actualizacao!");
                    }
                });
            });

        })
    </script>
    @endsection
