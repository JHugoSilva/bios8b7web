<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>B7bio - Login</title>
<link rel="stylesheet" href="{{url('assets/css/admin.login.css')}}">
</head>
<body>
    <div class="login--area">
        <h1>Cadastro</h1>
        @if ($error)
            <div class="error">{{$error}}</div>
        @endif
        <form action="" method="post">
            @csrf
            <input type="email" name="email" id="" placeholder="Digite seu Email">
            <input type="password" name="password" id="" placeholder="Digite sua Senha">
            <input type="submit" value="Cadastrar">
        Já tem cadastro? <a href="{{url('admin/login')}}">Faça Login</a>
        </form>
    </div>
    
</body>
</html>