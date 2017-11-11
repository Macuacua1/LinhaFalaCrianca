@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="margin: -15px 0 0 auto">
            <div class="card">
                <div class="card-head style-primary" style="margin-top: -5px!important;padding-top: -5px!important;">
                    <header>Registar Utilizadores</header>
                </div>
            </div><!--end .card -->
        </div>
    </div><!--end .col -->

    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 col-sm-2">

                    </div>
                    <div class="col-md-8 col-sm-8">
                        <form class="form" role="form" method="post" id="form_add_user">
                            {{csrf_field()}}
                            <div class="form-group floating-label">
                                <input type="text" name="nome" class="form-control input-lg" id="large4" required>
                                <label for="large4">Nome</label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="email" name="email" class="form-control input-lg" id="large4" required>
                                <label for="large4">Email</label>
                            </div>
                            <div class="form-group floating-label">
                                <select id="select2" name="role_id" class="form-control"required>
                                    <option value="">&nbsp;</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Conselheiro</option>
                                </select>
                                <label for="select2" style="font-size: 1.6em;">Perfil</label>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 col-sm-2"></div>

                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-8"></div>
                    <div class="col-md-4 col-sm-4" style="margin-top: 10px">
                        <a><button class="btn btn-success adduser" style="margin: -15px 0 10px 15px" type="submit" id="edit_utente" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Adicionar novo">
                                <span class="glyphicon glyphicon-plus"></span>novo
                            </button></a>
                    </div>
                    </div>
                </div>


        </div><!--end .card -->
    </div><!--end .col -->
    <div class="col-lg-2"></div>
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

                        toastr.success("Actualizado Com Sucesso!");
                        document.location.href="{{url('user')}}";
                    },
                    error:function(){
                        toastr.error("Erro na Actualizacao!");
                    }
                });
            });

        });

    </script>


@stop
