@extends('layouts.master')
@section('content')
    @if( Auth::user()->hasRole('admin'))
    <div class="row">
        <div class="col-lg-12" style="margin: -15px 0 0 auto">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Utilizadores</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .col -->

    <button class="btn btn-success" style="margin: -15px 0 10px 15px" type="submit"  data-toggle="modal" data-target="#formModal">
            <span class="glyphicon glyphicon-plus"></span>novo
        </button>

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
                                    <button class="edit-user btn btn-success" data-toggle="modal" data-target="#formModall" data-id="{{$user->id}}" data-nome="{{$user->nome}}" data-email="{{$user->email}}" data-rolenome="{{$user->role_id ? $user->role->designacao :'Sem Perfil'}}" data-role="{{$user->role_id ? $user->role_id:''}}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                   <a href="{{url('deleteuser',$user->id)}}"><button class=" btn btn-danger">
                                           <span class="glyphicon glyphicon-remove"></span>
                                       </button></a>
                                </td>
                                </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!--end .table-responsive -->
                <!-- BEGIN FORM MODAL MARKUP -->
                <div class="modal fade" id="formModall" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="formModalLabel">Actualizar Utilizador</h4>
                            </div>
                            <form class="form-horizontal" role="form" method="post" id="form_edit_user">
                                <input type="hidden" name="user_id" class="form-control" id="user_id">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label for="nome" class="control-label">Nome</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" type="text" name="nome" class="form-control" placeholder="Email" id="nome" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="" disabled >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label for="email1" class="control-label">Email</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="email" placeholder="Email" name="email" class="form-control" id="email" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label for="email1" class="control-label">Perfil</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select name="role_id" id="role_id" class="form-control">
                                                <option value="" disabled selected>--Seleccione o Perfil--</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->designacao}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label for="email1" class="control-label">Escritorio</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select name="escritorio" id="escritorio" class="form-control">
                                                <option value="" disabled selected>--Seleccione o Escritorio--</option>
                                                <option value="Linha Central">Linha Central</option>
                                                <option value="Marracuene">Marracuene</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label for="email1" class="control-label">Estado</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select name="estado" id="estado_user" class="form-control">
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span class='glyphicon glyphicon-remove'></span> Close</button>
                                    <button type="button" class="btn actionBtn" data-dismiss="modal" id="edit_user">
                                        <span id="footer_action_button" class='glyphicon'></span></button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            </div><!--end .card-body -->
        </div><!--end .card -->
    </div><!--end .col -->
    <!-- BEGIN FORM MODAL MARKUP -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="formModalLabel">Registar Utilizador</h4>
                </div>
                <form class="form-horizontal form-validate" role="form" method="post" id="form_add_user" novalidate="novalidate">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="nome" class="control-label">Nome</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="email1" class="control-label">Email</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="email" name="email" id="email1" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="password1" class="control-label">Perfil</label>
                            </div>
                            <div class="col-sm-9">
                                <select id="select2" name="role_id" class="form-control" required>
                                    <option value="" selected disabled>--Perfil--</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Conselheiro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> <span class='glyphicon glyphicon-remove'></span> Close</button>
                        <button type="button" class="btn btn-success adduser" type="submit" data-dismiss="modal"><span class="glyphicon glyphicon-check"></span> Registar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END FORM MODAL MARKUP -->
        @else
        <!-- BEGIN CONTENT-->
        {{--<div id="content">--}}

            <!-- BEGIN 404 MESSAGE -->
            <section>
                <div class="section-header">
                    <ol class="breadcrumb">
                        <li><a href="">home</a></li>
                        <li class="active">404</li>
                    </ol>

                </div>
                <div class="section-body contain-lg">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1><span class="text-xxxl text-light">404 <i class="fa fa-search-minus text-primary"></i></span></h1>
                            <h2 class="text-light">This page does not exist</h2>
                        </div><!--end .col -->
                    </div><!--end .row -->
                </div><!--end .section-body -->
            </section>
            <!-- END 404 MESSAGE -->

            <!-- BEGIN SEARCH SECTION -->
            <section>
                <div class="section-body contain-sm">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="You're searching for...">
                        <span class="input-group-btn"><button class="btn btn-primary" type="submit">Find</button></span>
                    </div>
                </div><!--end .section-body -->
            </section>
            <!-- END SEARCH SECTION -->

        {{--</div><!--end #content-->--}}
        <!-- END CONTENT -->
    @endif
@stop
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.adduser').on('click', function() {
                var dados = $('#form_add_user').serialize();
//                alert(dados);
                $.ajax({
                    type:'post',
                    url:'/criar_conta',
                    data:dados,
                    success:function(data){
                        $('#form_add_user')[0].reset();

                        toastr.success("Registado Com Sucesso!");
                        document.location.href="{{url('user')}}";
                    },
                    error:function(){
                        toastr.error("Erro! Verifique o preenchimento dos campos!");
                    }
                });
            });

        });

    </script>

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
