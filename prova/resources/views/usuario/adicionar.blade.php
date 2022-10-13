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
                <h1>Prova Upd8 - Adicionar Usuario</h1>
            </div>

            <div class="informacao-pagina">
                <div style="width:30%; margin-left:auto; margin-right:auto;">
                    <form method="post" action="{{ route('usuario.adicionar') }}">
                        @csrf
                        <input required type="text" name="nome" placeholder="Nome" class="borda-preta">
                        <input required type="text" name="cpf" placeholder="CPF" class="borda-preta">
                        <input required type="radio" id="m" name="sexo" value="m">
                        <label for="html">Masculino</label><br>
                        <input required type="radio" id="f" name="sexo" value="f">
                        <label for="css">Feminino</label><br>
                        <input required type="text" name="endereco" placeholder="Endereço" class="borda-preta">
                        <input required type="text" name="cidade" placeholder="Cidade" class="borda-preta">
                        <input required type="text" name="estado" placeholder="Estado (MG)" class="borda-preta">
                        <label for="data_nascimento">Data de nascimento:</label>
                        <input required type="date" id="data_nascimento" name="data_nascimento">
                        <button type="submit" class="borda-preta">Adicionar</button>
                    </form>
                </div>
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
