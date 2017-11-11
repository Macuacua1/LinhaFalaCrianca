@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="margin: -15px 0 0 auto">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Utilizadores</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .col -->

    <a href="{{route('user.create')}}"><button class="btn btn-success adduser" style="margin: -15px 0 10px 15px" type="submit" id="edit_utente" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Adicionar novo">
        <span class="glyphicon glyphicon-plus"></span>novo
    </button></a>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table no-margin">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Accao</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->nome}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role_id ? $user->role->designacao :'Sem Perfil'}}</td>
                                <td>{{$user->estado ==1 ? 'Activo':'Inactivo'}}</td>
                                <td>
                                    <button class="edit-user btn btn-success" data-id="{{$user->id}}" data-nome="{{$user->nome}}" data-email="{{$user->email}}" data-rolenome="{{$user->role_id ? $user->role->designacao :'Sem Perfil'}}" data-role="{{$user->role_id ? $user->role_id:''}}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>


                                    {{--<a href="{{url('/deleteuser',$user->id)}}"> <button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></a></td>--}}
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!--end .table-responsive -->
                <div id="modalUser" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static" style="">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form" method="post" id="form_edit_user">

                                    <input type="hidden" name="user_id" class="form-control" id="user_id">
                                    <div class="row" style="margin: 10px!important;">
                                    <div class="col-md-12 col-sm-12">
                                            <div class="form-group floating-label" style="margin: 0px 8px;margin-bottom: 5px">
                                                <input type="text" name="nome" class="form-control" id="nome" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="" disabled>
                                                {{--<label for="nome">Nome</label>--}}
                                            </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group floating-label" style="margin: 0px 8px;margin-bottom: 5px">
                                            <input type="email" name="email" class="form-control" id="email" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="" disabled>
                                            {{--<label for="email">Email</label>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12" style="margin-bottom: 5px">
                                        <select name="role_id" id="role_id" class="form-control">
                                            <option value="" disabled selected>--Seleccione o Perfil--</option>
                                            @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->designacao}}</option>
                                                @endforeach
                                        </select>
                                        {{--<label for="role_id">Perfil</label>--}}
                                    </div>
                                    <div class="col-md-12 col-sm-12" style="margin-bottom: 5px">
                                        <select name="escritorio" id="escritorio" class="form-control">
                                            <option value="" disabled selected>--Seleccione o Escritorio--</option>
                                            <option value="Linha Central">Linha Central</option>
                                            <option value="Marracuene">Marracuene</option>
                                        </select>
                                        {{--<label for="escritorio">Escritorio</label>--}}
                                    </div>
                                    <div class="col-md-12 col-sm-12" style="margin-bottom: 5px">
                                        <select name="estado" id="estado_user" class="form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                        {{--<label for="escritorio">Estado</label>--}}
                                    </div>
                                    </div>
                                </form>

                                <div class="modal-footer">
                                    <button type="button" class="btn actionBtn" data-dismiss="modal" id="edit_user">
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
@stop
@section('scripts')
    <script type="text/javascript">
        $(document).ready( function () {
            $('.edit-user').on('click',function () {
                $('#footer_action_button').text(" Actualizar");
                $('#footer_action_button').addClass('glyphicon-check');
                $('.actionBtn').addClass('btn-success');
                $('.actionBtn').addClass('editar_user');
                $('.modal-title').text('Editar dados do utilizador');
                $('#nome').val($(this).data('nome'));
                $('#email').val($(this).data('email'));
//                $('#role_id').html("");
//                $('#role_id').append('<option value="'+$(this).data('role')+'">'+$(this).data('rolenome')+'</option>');
//                $('#role_id').html("");
                $('#user_id').val($(this).data('id'));
                $('.form-horizontal').show();
                $('#modalUser').modal('show');
            });
        });

        $('.modal-footer').on('click', '.editar_user', function() {
            var dados = $('#form_edit_user').serialize();
//             alert(dados);
            $.ajax({
                type:'post',
                url:'/block_user',
                data:dados,
                success:function(data){
                    $('#form_edit_user')[0].reset();

                    toastr.success("Actualizado Com Sucesso!");
                    document.location.href="{{url('user')}}";
                },
                error:function(){
                    toastr.error("Erro na Actualizacao!");
                }
            });
        });
    </script>


@stop
