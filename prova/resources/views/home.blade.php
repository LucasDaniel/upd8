<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Upd8 - Home</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
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
                <p>Para Inserir novos usuarios clique em "Adicionar" no menu acima. Para Consultar, editar e remover clique em "Consultar."</p>
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
