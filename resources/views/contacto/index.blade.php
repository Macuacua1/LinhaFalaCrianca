@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="margin: -15px 0 0 auto">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Contactos</header>
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
                                <div  class="input-daterange input-group" id="demo-date-range">
                                    <div class="input-group-content">
                                        <input type="text" class="form-control" name="inicio" id="inicio"/>
                                        <label>De</label>
                                    </div>
                                    <span class="input-group-addon">a</span>
                                    <div class="input-group-content">
                                        <input type="text" class="form-control" name="fim" id="fim" />
                                        <label>Para</label>
                                        <div class="form-control-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group floating-label">
                                <select name="estado" id="status" class="form-control">
                                    <option value="" disabled selected>--Estado:--</option>
                                    <option value="Assistido">Assistido</option>
                                    <option value="Em Progresso">Em Progresso</option>
                                    <option value="Assistido Temporariamente">Assistido Temporariamente</option>
                                    <option value="Impossivel Proceder">Impossivel Proceder</option>
                                    <option value="Fechado">Fechado</option>
                                    <option value="">Sem Estado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group floating-label">
                                <select name="responsavel_id" id="instituicao" class="form-control">
                                    <option value="" disabled selected>--Instituicao:--</option>
                                    @foreach($resps as $resp)
                                        <option value="{{$resp->id}}">{{$resp->respnome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="form-group floating-label">
                                <select name="user_id" id="user" class="form-control">
                                    <option value="" disabled selected>--Utilizador:--</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-2">
                            <div class="form-group floating-label">
                                <select id="provincia_id" name="provincia_id" class="form-control provincianome">
                                    <option value="" disabled selected>--Provincia--</option>
                                    @foreach($provs as $pro)
                                        <option value="{{$pro->id}}">{{$pro->provincianome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="form-group floating-label">
                                <select id="distrito"  class="form-control distrito" name="distrito_id">
                                    <option value="0" disabled="true" selected="true">--Distrito--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="form-group floating-label">
                                <select id="localidade" class="form-control localidade" name="localidade_id">
                                    <option value="0" disabled="true" selected="true">--Localidade--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group floating-label">
                                <select name="tipo_motivo_id" id="catmot" class="form-control categoriamotivo">
                                    <option value="" disabled selected>--Categoria do Motivo--</option>
                                    @foreach($tipomotivos as $tipomotivo)
                                        <option value="{{$tipomotivo->id}}">{{$tipomotivo->tipomotivonome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group floating-label">
                                <select id="motivo"  class="form-control motivo" name="motivo_id">
                                    <option value="0" disabled="true" selected="true">--Motivo--</option>
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
                            <th>Tipo de Contacto</th>
                            <th>Criado a </th>
                            <th>Inserido por</th>
                            <th>Resumo</th>
                            <th>Motivo</th>
                            <th>Estado do Caso</th>
                            {{--<th>Inserido por</th>--}}
                            <th>Accao</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contactos as $contacto)
                            <tr>
                                <td>CO-{{$contacto->id}}</td>
                                <td>{{$contacto->tipo_contacto}}</td>
                                {{--<td>{{$contacto->created_at}}</td>--}}
                                <td>{{date('d-M-Y',strtotime($contacto->created_at))}}</td>
                                <td>{{$contacto->user->nome}}</td>
                                <td>{{$contacto->resumo_contacto}}</td>
                                <td>{{$contacto->motivo->motivonome}}</td>
                                @if($contacto->caso_id>0)
                                    <td>
                                    @if($contacto->caso->estado_caso =='Fechado')
                                        <span style="color: #4caf50">{{$contacto->caso->estado_caso}}</span>
                                    @endif
                                    @if($contacto->caso->estado_caso =='Impossivel Proceder')
                                        <span style="color: red">{{$contacto->caso->estado_caso}}</span>
                                    @endif
                                    @if($contacto->caso->estado_caso =='Assistido')
                                        <span style="color: #0aa89e">{{$contacto->caso->estado_caso}}</span>
                                    @endif
                                    @if($contacto->caso->estado_caso =='Assistido Temporariamente')
                                        <span style="color: #0c84e4">{{$contacto->caso->estado_caso}}</span>
                                    @endif
                                    @if($contacto->caso->estado_caso =='Em Progresso')
                                        <span style="color: #0aa298">{{$contacto->caso->estado_caso}}</span>
                                    @endif
                                    </td>
                                    {{--<td>{{$contacto->caso->estado_caso}}</td>--}}
                                @else
                                    <td>Nao Encaminhado</td>
                                @endif
                                <td>
                                   <a href="{{route('contacto.show',$contacto->id)}}"><button class="btn btn-info" data-id="{{$contacto->id}}" data-title="" data-description="">
                                           <span class="glyphicon glyphicon-eye-open"></span>
                                       </button></a>
                                @if($contacto->caso_id>0)
                                        <button class=" btn btn-success" data-id="{{$contacto->id}}" data-title="" data-description="" disabled id="fwd-caso">
                                            <span class="glyphicon glyphicon-forward"></span>
                                        </button>
                                @else
                                        <button class="btn btn-success" data-id="{{$contacto->id}}" data-title="" data-description="" id="fwd-caso">
                                            <span class="glyphicon glyphicon-forward"></span>
                                        </button>
                                @endif
                                </td>
                              </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div><!--end .table-responsive -->
                <div id="myModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form" method="post" id="form_add_caso">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group floating-label">
                                            <select name="responsavel_id" id="responsavel" class="form-control">
                                                <option value="" disabled selected>--Reencaminhar para:--</option>
                                                @foreach($resps as $resp)
                                                    <option value="{{$resp->id}}">{{$resp->respnome}}</option>
                                                @endforeach
                                            </select>
                                            {{--<label for="help2">Reencaminhar para:</label>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <input type="hidden" class="form-control" id="contacto_id" name="contacto_id">
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group floating-label">
                                            <textarea name="mensagem" id="textarea1" class="form-control" rows="3"></textarea>
                                            <label for="help2">Mensagem:</label>
                                        </div>
                                        {{--<a href="" class="btn btn-success glyphicon-lock" id="add_caso"  type="submit">Gravar</a>--}}
                                    </div>

                                </form>

                                <div class="modal-footer">
                                    <button type="button" class="btn actionBtn" data-dismiss="modal" id="add_caso">
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
            $("#inicio").on('change',function(){
                var minDate = $('#inicio').datepicker('getDate');
                $("#fim").datepicker("change", { minDate: minDate });
                var start=$('#inicio').val();
                var end= $('#fim').val();
                var estado_caso=$('#status').val();
                var responsavel_id=$('#instituicao').val();
                var user_id=$('#user').val();
                var provincia_id=$('#provincia_id').val();
                var distrito_id=$('#distrito').val();
                var localidade_id=$('#localidade').val();
                var motivo_id=$('#motivo').val();
                pesquisarContacto(start,end,estado_caso,responsavel_id,user_id,provincia_id,distrito_id,localidade_id,motivo_id);
            });

            $("#fim").on('change',function () {
                var maxDate = $('#end').datepicker('getDate');
                // $("#start").datepicker("change", { maxDate: maxDate });
                var start=$('#inicio').val();
                var end= $('#fim').val();
                var estado_caso=$('#status').val();
                var responsavel_id=$('#instituicao').val();
                var user_id=$('#user').val();
                var provincia_id=$('#provincia_id').val();
                var distrito_id=$('#distrito').val();
                var localidade_id=$('#localidade').val();
                var motivo_id=$('#motivo').val();
                pesquisarContacto(start,end,estado_caso,responsavel_id,user_id,provincia_id,distrito_id,localidade_id,motivo_id);
            });

            $('#status').on('change',function(){
                var start=$('#inicio').val();
                var end= $('#fim').val();
                var estado_caso=$('#status').val();
                var responsavel_id=$('#instituicao').val();
                var user_id=$('#user').val();
                var provincia_id=$('#provincia_id').val();
                var distrito_id=$('#distrito').val();
                var localidade_id=$('#localidade').val();
                var motivo_id=$('#motivo').val();
                pesquisarContacto(start,end,estado_caso,responsavel_id,user_id,provincia_id,distrito_id,localidade_id,motivo_id);
            });
            $('#instituicao').on('change',function(){
                var start=$('#inicio').val();
                var end= $('#fim').val();
                var estado_caso=$('#status').val();
                var responsavel_id=$('#instituicao').val();
                var user_id=$('#user').val();
                var provincia_id=$('#provincia_id').val();
                var distrito_id=$('#distrito').val();
                var localidade_id=$('#localidade').val();
                var motivo_id=$('#motivo').val();
                pesquisarContacto(start,end,estado_caso,responsavel_id,user_id,provincia_id,distrito_id,localidade_id,motivo_id);

            });
            $('#user').on('change',function(){
                var start=$('#inicio').val();
                var end= $('#fim').val();
                var estado_caso=$('#status').val();
                var responsavel_id=$('#instituicao').val();
                var user_id=$('#user').val();
                var provincia_id=$('#provincia_id').val();
                var distrito_id=$('#distrito').val();
                var localidade_id=$('#localidade').val();
                var motivo_id=$('#motivo').val();
                pesquisarContacto(start,end,estado_caso,responsavel_id,user_id,provincia_id,distrito_id,localidade_id,motivo_id);

            });
            $('#motivo').on('change',function () {
                var start=$('#inicio').val();
                var end= $('#fim').val();
                var estado_caso=$('#status').val();
                var responsavel_id=$('#instituicao').val();
                var user_id=$('#user').val();
                var provincia_id=$('#provincia_id').val();
                var distrito_id=$('#distrito').val();
                var localidade_id=$('#localidade').val();
                var motivo_id=$('#motivo').val();
                pesquisarContacto(start,end,estado_caso,responsavel_id,user_id,provincia_id,distrito_id,localidade_id,motivo_id);
            });
            $('#provincia_id').on('change',function () {
                var start=$('#inicio').val();
                var end= $('#fim').val();
                var estado_caso=$('#status').val();
                var responsavel_id=$('#instituicao').val();
                var user_id=$('#user').val();
                var provincia_id=$('#provincia_id').val();
                var distrito_id=$('#distrito').val();
                var localidade_id=$('#localidade').val();
                var motivo_id=$('#motivo').val();
                pesquisarContacto(start,end,estado_caso,responsavel_id,user_id,provincia_id,distrito_id,localidade_id,motivo_id);
            });
            $('#distrito').on('change',function () {
                var start=$('#inicio').val();
                var end= $('#fim').val();
                var estado_caso=$('#status').val();
                var responsavel_id=$('#instituicao').val();
                var user_id=$('#user').val();
                var provincia_id=$('#provincia_id').val();
                var distrito_id=$('#distrito').val();
                var localidade_id=$('#localidade').val();
                var motivo_id=$('#motivo').val();
                pesquisarContacto(start,end,estado_caso,responsavel_id,user_id,provincia_id,distrito_id,localidade_id,motivo_id);
            });
            $('#localidade').on('change',function () {
                var start=$('#inicio').val();
                var end= $('#fim').val();
                var estado_caso=$('#status').val();
                var responsavel_id=$('#instituicao').val();
                var user_id=$('#user').val();
                var provincia_id=$('#provincia_id').val();
                var distrito_id=$('#distrito').val();
                var localidade_id=$('#localidade').val();
                var motivo_id=$('#motivo').val();
                pesquisarContacto(start,end,estado_caso,responsavel_id,user_id,provincia_id,distrito_id,localidade_id,motivo_id);
            });
            function pesquisarContacto(criteria1,criteria2,criteria3,criteria4,criteria5,criteria6,criteria7,criteria8,criteria9) {
                var dados= " ";
                $.ajax({
                    type: 'post',
                    url: '/pesquisacontacto',
                    data: {start:criteria1,end:criteria2,estado_caso:criteria3,responsavel_id:criteria4,user_id:criteria5,provincia_id:criteria6,distrito_id:criteria7,localidade_id:criteria8,motivo_id:criteria9},
                    success: function(data) {
                        if (data) {

                            $('tbody').html(data);

                        }else {
                            $('tbody').empty();
                            alert('Nao Existem dados');

                        }
                    }
                });

            }

            $('#catmot').on('change',function(){
                var mot_id = $(this).val();
                var div=$(this).parent();
                var op=" ";
                $.ajax({
                    type:'get',
                    url:'/findmotivo',
                    data:{'id':mot_id},
                    success:function(data){
                        op+='<option value="0" class="form-control" selected disabled>--Escolhe o Motivo--</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option class="form-control" value="'+data[i].id+'">'+data[i].motivonome+'</option>';
                        }

                        $('.motivo').html(" ");
                        $('.motivo').append(op);

                    },
                    error:function(err){
                        alert('erro encontrado'+err);
                    }
                });
            });

            $(document).on('change','.provincianome',function(){
                // console.log("hmm its change");

                var prov_id=$(this).val();
                // console.log(cat_id);
                var div=$(this).parent();

                var op=" ";

                $.ajax({
                    type:'get',
                    url:'/findDistrito',
                    data:{'id':prov_id},
                    success:function(data){
                        //console.log('success');

                        //console.log(data);

                        //console.log(data.length);
                        op+='<option value="0" class="form-control" selected disabled>--Escolhe o Distrito--</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option class="form-control" value="'+data[i].id+'">'+data[i].distritonome+'</option>';
                        }

                        $('.distrito').html(" ");
                        $('.distrito').append(op);
                    },
                    error:function(){

                    }
                });
            });


            $(document).on('change','.distrito',function(){
                // console.log("hmm its change");

                var distr_id=$(this).val();
                // console.log(cat_id);
                var div=$(this).parent();

                var op=" ";

                $.ajax({
                    type:'get',
                    url:'/findLocalidade',
                    data:{'id':distr_id},
                    success:function(data){
                        //console.log('success');

                        //console.log(data);

                        //console.log(data.length);
                        op+='<option value="0" selected disabled>--Escolhe a Localidade--</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].localidadenome+'</option>';
                        }

                        $('.localidade').html(" ");
                        $('.localidade').append(op);
                    },
                    error:function(){

                    }
                });
            });
//            $(document).on('click', '#addcaso', function() {
//                 alert('hahahha');
//                $('#myModal').modal('show');
//            });
            $(document).on('click', '#fwd-caso', function() {
                $('#fwd-caso').addClass('fwd-caso');
                $('#footer_action_button').text(" Encaminhar");
                $('#footer_action_button').addClass('glyphicon-check');
                $('.actionBtn').addClass('btn-success');
                $('.actionBtn').addClass('fwd_caso');
                $('.modal-title').text('Edit');
                $('#contacto_id').val($(this).data('id'));
                $('.form-horizontal').show();
                $('#myModal').modal('show');
            });
            $('.modal-footer').on('click', '.fwd_caso', function() {
                var dados = $('#form_add_caso').serialize();
                // alert(dados);
                $.ajax({
                    type:'post',
                    url:'/addcaso',
                    data:dados,
                    success:function(data){
                        $('#form_add_caso')[0].reset();
                        $('.fwd-caso').addClass('disabled');
                        toastr.success("Encaminhado Com Sucesso!");
                        document.location.href="{{url('contacto')}}";
                    },
                    error:function(){
                        toastr.error("Registo nao efectuado!");
                    }
                });
            });


        });
    </script>
    @endsection
