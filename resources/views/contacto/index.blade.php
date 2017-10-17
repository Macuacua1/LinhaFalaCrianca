@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
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
                <div class="table-responsive">
                    <table id="datatable1" class="table no-margin">
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
                                    <td>{{$contacto->caso->estado_caso}}</td>
                                @else
                                    <td>Nao Encaminhado</td>
                                @endif
                                <td>
                                   <a href="{{route('contacto.show',$contacto->id)}}"><button class="btn btn-info" data-id="{{$contacto->id}}" data-title="" data-description="">
                                           <span class="glyphicon glyphicon-eye-open"></span>
                                       </button></a>
                                    <button class="fwd-caso btn btn-success" data-id="{{$contacto->id}}" data-title="" data-description="">
                                        <span class="glyphicon glyphicon-forward"></span>
                                    </button>
                                </td>
                              </tr>
                        @endforeach
                        </tbody>
                        {{--<a href="{{url('/')}}"><button class="btn btn-warning" type="submit">--}}
                                {{--<span class="glyphicon glyphicon-plus"></span> Novo--}}
                            {{--</button></a>--}}
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
