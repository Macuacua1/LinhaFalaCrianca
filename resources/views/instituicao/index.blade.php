@extends('layouts.master')
@section('content')
    @if( Auth::user()->hasRole('admin'))
        <div class="row">
            <div class="col-lg-12" style="margin: -15px 0 0 auto">
                <div class="card">
                    <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                        <header>Instituicoes</header>
                    </div>
                </div><!--end .card -->
            </div>
        </div><!--end .col -->

        <button class="btn btn-success" style="margin: -15px 0 10px 15px" type="submit"  data-toggle="modal" data-target="#formModal">
            <span class="glyphicon glyphicon-plus"></span>nova
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
                                <th>Telefone</th>
                                <th>Criado a</th>
                                <th>Accao</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($instituicaos as $instituicao)
                                <tr>
                                    <td>{{$instituicao->respnome}}</td>
                                    <td>{{$instituicao->email}}</td>
                                    <td>{{$instituicao->telefone}}</td>
                                    <td>{{date('d-M-Y',strtotime($instituicao->created_at))}}</td>
                                    <td>
                                        <button class="edit-resp btn btn-success" data-toggle="modal" data-target="#formModall" data-id="{{$instituicao->id}}" data-nome="{{$instituicao->respnome}}" data-email="{{$instituicao->email}}" data-telefone="{{$instituicao->telefone}}">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </button>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div><!--end .table-responsive -->
                    <div class="row">
                        <center>
                            {{$instituicaos->render()}}
                        </center>

                    </div>
                    <!-- BEGIN FORM MODAL MARKUP -->
                    <div class="modal fade" id="formModall" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="formModalLabel">Actualizar Instituicao</h4>
                                </div>
                                <form class="form-horizontal" role="form" method="post" id="form_edit_resp">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <label for="nome" class="control-label">Nome</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text"  name="nome" class="form-control" placeholder="Email" id="nome" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="" disabled >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <label for="email1" class="control-label">Email</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="email" placeholder="Email" name="email" class="form-control" id="email" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="">
                                            </div>
                                        </div>
                                        <input type="hidden"  name="id" class="form-control"  id="id">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label for="password1" class="control-label">Telefone</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="col-sm-9">
                                                        <input type="number" name="telefone" id="telefone" class="form-control" placeholder="Telefone" required>
                                                    </div>
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
                        <h4 class="modal-title" id="formModalLabel">Registar Instituicao</h4>
                    </div>
                    <form class="form-horizontal form-validate" role="form" method="post" id="form_add_resp" novalidate="novalidate">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="nome" class="control-label">Nome</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="respnome" id="respnome" class="form-control" placeholder="Nome" required>
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
                                    <label for="password1" class="control-label">Telefone</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="col-sm-9">
                                        <input type="number" name="telefone" id="telefone" class="form-control" placeholder="Telefone" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> <span class='glyphicon glyphicon-remove'></span> Close</button>
                            <button type="button" class="btn btn-success addresp" id="addresp" type="submit" data-dismiss="modal"><span class="glyphicon glyphicon-check"></span> Registar</button>
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
            $('#addresp').on('click', function() {
                var dados = $('#form_add_resp').serialize();
//                alert(dados);
                $.ajax({
                    type:'post',
                    url:'/add-resp',
                    data:dados,
                    success:function(data){
                        $('#form_add_resp')[0].reset();

                        toastr.success("Registado Com Sucesso!");
                        document.location.href="{{url('instituicao')}}";
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
            $('.edit-resp').on('click',function () {
                $('#footer_action_button').text(" Actualizar");
                $('#footer_action_button').addClass('glyphicon-check');
                $('.actionBtn').addClass('btn-success');
                $('.actionBtn').addClass('editar_resp');
                $('.modal-title').text('Editar dados da Instituicao');
                $('#respnome').val($(this).data('nome'));
                $('#email').val($(this).data('email'));
                $('#telefone').val($(this).data('telefone'));
                $('#id').val($(this).data('id'));
                $('.form-horizontal').show();
//                $('#modalUser').modal('show');
            });
        });

        $('.modal-footer').on('click', '.editar_resp', function() {
            var dados = $('#form_edit_resp').serialize();
//             alert(dados);
            $.ajax({
                type:'post',
                url:'/edit-resp',
                data:dados,
                success:function(data){
                    $('#form_edit_resp')[0].reset();

                    toastr.success("Actualizado Com Sucesso!");
                    document.location.href="{{url('instituicao')}}";
                },
                error:function(){
                    toastr.error("Erro na Actualizacao!");
                }
            });
        });
    </script>


@stop
