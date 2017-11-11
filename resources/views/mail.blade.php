<!DOCTYPE html>
<html lang="en">
<head>
    <title>Envio de Email</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2 style="color: green">Credenciais da sua Conta na tabela abaixo:</h2>
    <p><em style="color: red">NB:</em> Por questoes de Seguranca e usabilidade,fazer o favor de alterar a sua Senha logo apos a sua autenticacao!</p>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$nome}}</td>
            <td>{{$email}}</td>
            <td>{{$password}}</td>
        </tr>

        </tbody>
    </table>
</div>
</body>

</html>