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
                @if(isset($_GET['msg']))
                {{ $_GET['msg'] }}
                <br>
                <br>
                @endif
                @if(!isset($usuarios))
                Adicione os campos para pesquisar
                <div style="width:30%; margin-left:auto; margin-right:auto; margin-top:1em;">
                    <form method="post" action="{{ route('usuario.consultar') }}">
                        @csrf
                        <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                        <input type="text" name="cpf" placeholder="CPF" class="borda-preta">
                        <input type="radio" id="m" name="sexo" value="m">
                        <label for="html">Masculino</label><br>
                        <input type="radio" id="f" name="sexo" value="f">
                        <label for="css">Feminino</label><br>
                        <input type="text" name="endereco" placeholder="Endereço" class="borda-preta">
                        <input type="text" name="cidade" placeholder="Cidade" class="borda-preta">
                        <input type="text" name="estado" placeholder="Estado (MG)" class="borda-preta">
                        <label for="data_nascimento">Data de nascimento:</label>
                        <input type="date" id="data_nascimento" name="data_nascimento">
                        <button type="submit" class="borda-preta">Pesquisar</button>
                    </form>
                </div>
                @else
                Consulta 
                <table border=1 width=95% style="margin-top:1em; margin-left:auto; margin-right:auto;">
                    <thead>
                        <tr>
                            <th>Editar</th>
                            <th>Excluir</th>
                            <th>Nome</th>
                            <th>Cpf</th>
                            <th>Sexo</th>
                            <th>Endereço</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Data de nascimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <th><a href="{{ route('usuario.editar', $usuario->id) }}">Editar</a></th>
                                <th><a href="{{ route('usuario.excluir', $usuario->id) }}">Excluir</a></th>
                                <th class="th-normal">{{ $usuario->nome }}</th>
                                <th class="th-normal">{{ $usuario->cpf }}</th>
                                <th class="th-normal">{{ $usuario->sexo }}</th>
                                <th class="th-normal">{{ $usuario->endereco }}</th>
                                <th class="th-normal">{{ $usuario->cidade }}</th>
                                <th class="th-normal">{{ $usuario->estado }}</th>
                                <th class="th-normal">{{ $usuario->data_nascimento }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
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
