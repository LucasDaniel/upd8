<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //['nome','cpf','sexo','endereco','cidade','estado','data_nascimento'];
        for ($i = 0; $i < 10; $i++) {
            $usuario = new Usuario();
            $usuario->nome = 'Nome teste '.$i;
            $usuario->cpf = '1234543234'.$i;
            if ($i < 3) $usuario->sexo = 'm';
            else if ($i < 7) $usuario->sexo = 'f';
            else $usuario->sexo = 'm';
            $usuario->endereco = 'Rua tal '.$i;
            if ($i < 5) $usuario->cidade = 'Rio de Janeiro';
            else $usuario->cidade = 'São Paulo';
            if ($i < 5) $usuario->estado = 'RJ';
            else $usuario->estado = 'SP';
            $usuario->data_nascimento = date('Y-m-'.($i+1));
            $usuario->save();
        }
    }
}
