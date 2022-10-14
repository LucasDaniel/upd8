<?php $u = isset($usuario); ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Upd8 - <?php if ($u) { echo 'Editar'; } else { echo 'Adicionar'; } ?></title>
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
                <h1>Prova Upd8 - <?php if ($u) { echo 'Editar Usuario'; } else { echo 'Adicionar Usuario'; } ?></h1>
            </div>

            <div class="informacao-pagina">
                <div style="width:30%; margin-left:auto; margin-right:auto;">
                    @if(isset($_GET['msg']))
                    {{ $_GET['msg'] }}
                    <br>
                    <br>
                    @endif
                    <form method="post" action="{{ route('usuario.adicionar') }}">
                        @csrf
                        <input type="hidden" name="id" value="<?php if ($u) echo $usuario->id; else echo ''; ?>" >
                        <input type="text" value="{{ $usuario->nome ?? old('nome') }}" name="nome" placeholder="Nome" class="borda-preta">
                        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                        <input type="text" value="{{ $usuario->cpf ?? old('cpf') }}" name="cpf" placeholder="CPF" class="borda-preta">
                        {{ $errors->has('cpf') ? $errors->first('cpf') : '' }}
                        <input type="radio" id="m" name="sexo" value="m" <?php if ($u) { if (($usuario->sexo == 'm') || ((old('sexo')) == 'm')) { echo 'checked'; } } ?>>
                        <label for="html">Masculino</label><br>
                        <input type="radio" id="f" name="sexo" value="f" <?php if ($u) { if (($usuario->sexo == 'f') || ((old('sexo')) == 'f')) { echo 'checked'; } } ?>>
                        <label for="css">Feminino</label><br>
                        {{ $errors->has('sexo') ? $errors->first('sexo') : '' }}
                        <input type="text" value="{{ $usuario->endereco ?? old('endereco') }}" name="endereco" placeholder="Endereço" class="borda-preta">
                        {{ $errors->has('endereco') ? $errors->first('endereco') : '' }}
                        <select name="estado" id="estado" class="borda-preta"></select>
                        {{ $errors->has('estado') ? $errors->first('estado') : '' }}
                        <select name="cidade" id="cidade" class="borda-preta"></select>
                        {{ $errors->has('cidade') ? $errors->first('cidade') : '' }}
                        <input type="date" value="{{ $usuario->data_nascimento ?? old('data_nascimento') }}" id="data_nascimento" name="data_nascimento">
                        {{ $errors->has('data_nascimento') ? $errors->first('data_nascimento') : '' }}
                        <button type="submit" class="borda-preta"><?php if ($u) { echo 'Salvar edição'; } else { echo 'Adicionar'; } ?></button>
                    </form>
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
