<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - Sobre Nós</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    </head>

    <body>
        <div class="topo">

            <div class="logo">
                <img src="{{ asset('img/logo.png') }}">
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('usuario.adicionar') }}">Adicionar</a></li>
                    <li><a href="{{ route('usuario.consultar') }}">Consultar</a></li>
                </ul>
            </div>
        </div>

        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Prova Upd8</h1>
            </div>

            <div class="informacao-pagina">
                consultar
            </div>
        </div>

        <div class="rodape">
            <div class="redes-sociais">
            
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(31) 99367-5492</span>
                <br>
                <span>lucasdanielbeltrame@hotmail.com.br</span>
            </div>
            <div class="localizacao">
            
            </div>
        </div>
    </body>
</html>
