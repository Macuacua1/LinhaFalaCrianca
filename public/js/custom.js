/**
 * Created by mario on 19-Sep-17.
 */
$("#anonimo").hide();
$("#viveducacional").hide();
$("#lingua").hide();
$("#relacao").hide();
$("#conhecer_linhaa").hide();
$("#case").hide();
$("#notcase").hide();

$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //
    // $("#start").on('change',function(){
    //     var minDate = $('#start').datepicker('getDate');
    //     $("#end").datepicker("change", { minDate: minDate });
    //     var inicio=$('#start').val();
    //     var fim= $('#end').val();
    //     var estado=$('#estado').val();
    //     var responsavel_id=$('#responsavel_id').val();
    //     var user_id=$('#user_id').val();
    //     pesquisarCaso(inicio,fim,estado,responsavel_id,user_id);
    // });
    //
    // $("#end").on('change',function () {
    //     var maxDate = $('#end').datepicker('getDate');
    //     // $("#start").datepicker("change", { maxDate: maxDate });
    //     var inicio=$('#start').val();
    //     var fim= $('#end').val();
    //     var estado=$('#estado').val();
    //     var responsavel_id=$('#responsavel_id').val();
    //     var user_id=$('#user_id').val();
    //     // alert(fim);
    //     pesquisarCaso(inicio,fim,estado,responsavel_id,user_id);
    // });
    //
    // $('#estado').on('change',function(){
    //     var inicio=$('#start').val();
    //     var fim= $('#end').val();
    //     var estado=$('#estado').val();
    //     var responsavel_id=$('#responsavel_id').val();
    //     var user_id=$('#user_id').val();
    //     pesquisarCaso(inicio,fim,estado,responsavel_id,user_id);
    //
    // });
    // $('#responsavel_id').on('change',function(){
    //     var inicio=$('#start').val();
    //     var fim= $('#end').val();
    //     var estado=$('#estado').val();
    //     var responsavel_id=$('#responsavel_id').val();
    //     var user_id=$('#user_id').val();
    //     pesquisarCaso(inicio,fim,estado,responsavel_id,user_id);
    //
    // });
    // $('#user_id').on('change',function(){
    //     var inicio=$('#start').val();
    //     var fim= $('#end').val();
    //     var estado=$('#estado').val();
    //     var responsavel_id=$('#responsavel_id').val();
    //     var user_id=$('#user_id').val();
    //     console.log(user_id);
    //     pesquisarCaso(inicio,fim,estado,responsavel_id,user_id);
    //
    // });
    // function pesquisarCaso(criteria1,criteria2,criteria3,criteria4,criteria5) {
    //     $.ajax({
    //         type: 'post',
    //         url: '/pesquisarcaso',
    //         data: {inicio:criteria1,fim:criteria2,estado:criteria3,responsavel_id:criteria4,user_id:criteria5},
    //         success: function(data) {
    //             if (data) {
    //                 alert('Existem dados');
    //                 // $('tbody').empty();
    //                 $('tbody').html(data);
    //
    //             }else {
    //                 // $('tbody').empty();
    //                 alert('Nao Existem dados');
    //
    //             }
    //         }
    //     });
    //
    // }
    $('#myTable').DataTable();
});

$('#tipo_utente').on('change',function() {
    var tipo_utent= $(this).val();
   if (tipo_utent=='Contactante'){
       $("#anonimo").show();
       $("#viveducacional").hide();
       $("#lingua").show();
       $("#lingua").removeClass('col-md-4 col-sm-4');
       $("#lingua").addClass('col-md-6 col-sm-6');
       $("#relacao").hide();
       $("#conhecer_linhaa").show();
       $("#conhecer_linhaa").removeClass('col-md-4 col-sm-4');
       $("#conhecer_linhaa").addClass('col-md-6 col-sm-6');
       $("#case").hide();
       $("#notcase").show();

   }
       if (tipo_utent=='Contactante+Vitima'){
           $("#anonimo").hide();
           $("#viveducacional").show();
           $("#lingua").show();
           $("#lingua").removeClass('col-md-4 col-sm-4');
           $("#lingua").addClass('col-md-6 col-sm-6');
           $("#relacao").hide();
           $("#conhecer_linhaa").show();
           $("#conhecer_linhaa").removeClass('col-md-4 col-sm-4');
           $("#conhecer_linhaa").addClass('col-md-6 col-sm-6');
           $("#case").show();
           $("#notcase").hide();
       }
        if (tipo_utent=='Contactante+Perpetrador'){
            $("#anonimo").hide();
            $("#viveducacional").hide();
            $("#lingua").show();
            $("#lingua").removeClass('col-md-4 col-sm-4');
            $("#lingua").addClass('col-md-6 col-sm-6');
            $("#relacao").hide();
            $("#conhecer_linhaa").show();
            $("#conhecer_linhaa").removeClass('col-md-4 col-sm-4');
            $("#conhecer_linhaa").addClass('col-md-6 col-sm-6');
           $("#case").show();
           $("#notcase").hide();

       }
    if (tipo_utent=='Vitima'){
        $("#anonimo").hide();
        $("#viveducacional").show();
        $("#lingua").show();
        $("#lingua").removeClass('col-md-4 col-sm-4');
        $("#lingua").addClass('col-md-6 col-sm-6');
        $("#relacao").show();
        $("#relacao").removeClass('col-md-4 col-sm-4');
        $("#relacao").addClass('col-md-6 col-sm-6');
        $("#conhecer_linhaa").hide();
        $("#case").show();
        $("#notcase").hide();

    }
    if (tipo_utent=='Perpetrador'){
        $("#anonimo").hide();
        $("#viveducacional").hide();
        $("#lingua").hide();
        $("#relacao").hide();
        $("#conhecer_linhaa").hide();
        $("#case").show();
        $("#notcase").hide();
    }

});
//
// $('#add_utente').on('click',function (e) {
//     event.preventDefault();
//     var valor_get_total=$('#soma').val();
//     var valor_get_novo_total=Number(valor_get_total)+Number(1);
//     var menos= Number(valor_get_novo_total)-Number(1);
//     // alert(menos);
//     $('#soma').val(valor_get_novo_total);
//     // alert(valor_get_novo_total);
//   $('#utente'+(valor_get_novo_total)+'').show();
//     $('#utente'+(menos)+'').removeClass('active');
//     $('#utente'+(valor_get_novo_total)+'').addClass('active');
//     $('.utent'+(valor_get_novo_total)+'').show();
//     $('.utent'+(menos)+'').hide();
//     // alert(valor_get_novo_total);
// });

$('#add_utente').on('click',function (e) {
    event.preventDefault();

    var dados = $('#form_add_utente').serialize();
    var valor_get_total=$('#soma').val();
    var valor_get_novo_total=Number(valor_get_total)+Number(1);
    // alert(valor_get_novo_total);
    $('#soma').val(valor_get_novo_total);

    // if(valor_get_novo_total==1){
        $('#tipo_contacto').val($('#tipo_contact').val());

    // }
    // $('#form_add_utente')[0].reset();

    // alert(dados);

           // alert($('#tipo_contacto').val());
    $.ajax({
        type: 'post',
        url: '/addUtente',
        data: dados,
        success: function(data) {
            if (data) {
                $('#form_add_utente')[0].reset();
                toastr.success("Adicionado Com Sucesso!");
                $('#tipo_contact').val($('#tipo_contacto').val());
            }else {
                toastr.error("Erro ao Adicionar Utente!");

            }
        }
    });
});

$('#add_contacto').on('click',function (e) {
    e.preventDefault();

    var dados = $('#form_add_contacto').serialize();
           // alert(dados);
    $.ajax({
        method: 'Post',
        url: '/registarcontacto',
        data: dados,
        success: function (data) {

            if (data) {
                $('#form_add_contacto')[0].reset();
                toastr.success("Registado Com Sucesso!");
                window.location.href = '/';
            }
            else {
                toastr.error("Registo nao Efectuado!");

            }
        }
    });
});
//
// //        Find motivo

    $('#categoriamotivo').on('change',function(){
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

                $('.motivonome').html(" ");
                $('.motivonome').append(op);

            },
            error:function(err){
                alert('erro encontrado'+err);
            }
        });
    });
$(document).on('click', '#addcaso', function() {
    // alert('hahahha');
    $('#myModal').modal('show');
});
$(document).on('click', '.fwd-caso', function() {
    $('#footer_action_button').text(" Encaminhar");
    $('#footer_action_button').addClass('glyphicon-check');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('#contacto_id').val($(this).data('id'));
    $('.form-horizontal').show();
    $('#myModal').modal('show');
});
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
    $('.actionBtn').addClass('edit_caso');
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
$('.modal-footer').on('click', '.edit', function() {
    var dados = $('#form_add_caso').serialize();
    // alert(dados);
    $.ajax({
        type:'post',
        url:'/addcaso',
        data:dados,
        success:function(data){
            $('#form_add_caso')[0].reset();
            toastr.success("Registado Com Sucesso!");
        },
        error:function(){
            toastr.error("Registo nao efectuado!");
        }
    });
});
$('.modal-footer').on('click', '#edit_caso', function() {
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
// $(document).on('click', '.edit-user', function() {
//     $('#footer_action_button').text("Actualizar");
//     $('#footer_action_button').addClass('glyphicon-check');
//     $('.actionBtn').addClass('btn-success');
//     $('.actionBtn').addClass('edit_user');
//     $('.modal-title').text('Actualizar Utilizador');
//     // $('#caso_id').val($(this).data('id'));
//     $('.form-horizontal').show();
//     $('#modalUser').modal({
//         dismissible:false,
//         in_duration:3000,
//         out_duration:3000,
//         backdrop: 'static',
//         keyboard: false
//         // opacity:.9
//     });
// });


$(document).on('change','.provincia',function(){
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

            $('.distritonome').html(" ");
            $('.distritonome').append(op);
        },
        error:function(){

        }
    });
});


$(document).on('change','.distritonome',function(){
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

            $('.localidadenome').html(" ");
            $('.localidadenome').append(op);
        },
        error:function(){

        }
    });
});
// $('#add_caso').on('click',function (e) {
//     event.preventDefault();
//     var dados = $('#form_add_caso').serialize();
//     // alert(dados);
//     $.ajax({
//         type:'post',
//         url:'/addcaso',
//         data:dados,
//         success:function(data){
//             $('#form_add_caso')[0].reset();
//         },
//         error:function(){
//
//         }
//     });
//
// });
