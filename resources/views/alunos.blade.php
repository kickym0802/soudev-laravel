<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .suave{transition-duration: .2s;}
        .lateral{
            background-color: #00000070;
            width: 100%;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            opacity: 0;
            visibility: hidden;
        }
        .lateral.active{
            opacity: 1;
            visibility: visible;
        }
        .content{
            width: 350px;
            height: 100vh;
            padding: 16px;
            background-color: white;
            position: absolute;
            top: 0;
            right: -100%;
            transition-delay: .3s;
        }
        .content h6{display: flex;justify-content: space-between;}
        .content h6 span{width: 40px;height: 40px;text-align: center;line-height: 40px;background-color: #999;color: white;}
        .lateral.active .content{right: 0;}
    </style>
</head>
<body>
    <div class="container">
        <h1>Alunos <button class="btn btn-primary" onClick="abrirForm()">novo aluno</button></h1>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                    <th>matricula</th>
                    <th>email</th>
                    <th>cpf</th>
                    <th>ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->id }}</td>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->matricula }}</td>
                        <td>{{ $aluno->email }}</td>
                        <td>{{ $aluno->cpf }}</td>
                        <td>
                            <button onClick="editar({{ $aluno->id }})">editar</button>
                            <button onClick="deletar({{ $aluno->id }})">deletar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="lateral" class="lateral suave">
        <div class="content suave">
            <h6>Criar Aluno <span onclick="fechar()">x</span></h6>
            <form id="criar">
                <label for="nome">nome</label>
                <input class="form-control" type="text" name="nome" placeholder="seu nome">
                <label for="email">email</label>
                <input class="form-control" type="text" name="email" placeholder="seu email">
                <label for="matricula">matricula</label>
                <input class="form-control" type="text" name="matricula" placeholder="seu matricula">
                <label for="status">status</label>
                <input class="form-control" type="text" name="status" placeholder="seu status">
                <label for="genero">genero</label>
                <input class="form-control" type="text" name="genero" placeholder="seu genero">
                <label for="cpf">cpf</label>
                <input class="form-control" type="text" name="cpf" placeholder="seu cpf">
                <label for="dataNascimento">dataNascimento</label>
                <input class="form-control" type="date" name="dataNascimento" placeholder="seu dataNascimento">
                <button onclick="criar()">enviar</button>
            </form>
        </div>
    </div>
    <script>
        function abrirForm(){
            let lateral = document.getElementById("lateral");
            lateral.classList.add("active");
        }
        function criar(){
            let formCriar = document.getElementById("criar");
            event.preventDefault();
            let form = new FormData(formCriar);
            let csrf = document.getElementsByName("csrf-token");
            fetch("/alunos", {
                method: "POST",
                headers:{
                    "X-CSRF-TOKEN": csrf,
                    "Content-type": "application/json"
                },
                body: JSON.stringify(form)
            })
            .then(res => res.json())
            .then(res => console.log(res));
            
        }
        function editar(id){
            alert(id);
        }

        function deletar(id){
            alert(id);
        }

        function fechar(){
            let lateral = document.getElementById("lateral");
            lateral.classList.remove("active");
        }
    </script>
</body>
</html>