<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Upd9 - Consultar</title>
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
                    <li><a href="{{ route('usuario.consulta') }}">Consultar</a></li>
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
                        <select name="estado" id="estado" class="borda-preta"></select>
                        <select name="cidade" id="cidade" class="borda-preta"></select>
                        <label for="data_nascimento">Data de nascimento:</label>
                        <input type="date" id="data_nascimento" name="data_nascimento">
                        <button type="submit" class="borda-preta">Pesquisar</button>
                    </form>
                </div>
                <script>
                    $(document).ready(function(){
                        $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/', {id: 10, }, function (json) {
                            var options = '<option value="">–  –</option>';
                            for (var i = 0; i < json.length; i++) {
                                options += '<option data-id="' + json[i].id + '" value="' + json[i].nome + '" >' + json[i].nome + '</option>';
                            }
                            $("select[name='estado']").html(options);
                        });
                        $("select[name='estado']").change(function () {
                            if ($(this).val()) {
                                $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+$(this).find("option:selected").attr('data-id')+'/municipios', {id: $(this).find("option:selected").attr('data-id')}, function (json) {
                                    var options = '<option value="">–  –</option>';
                                    for (var i = 0; i < json.length; i++) {
                                        options += '<option value="' + json[i].nome + '" >' + json[i].nome + '</option>';
                                    }
                                    $("select[name='cidade']").html(options);
                                });
                            } else {
                                $("select[name='cidade']").html('<option value="">–  –</option>');
                            }
                        });
                    });
                </script>
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
                                <th><a class="a-bt-editar" href="{{ route('usuario.editar', $usuario->id) }}">Editar</a></th>
                                <th><a class="a-bt-excluir" href="{{ route('usuario.excluir', $usuario->id) }}">Excluir</a></th>
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
                <br>
                {{ $usuarios->appends($request)->links() }}
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
