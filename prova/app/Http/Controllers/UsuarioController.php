<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return $usuarios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.adicionar');
    }

    /**
     * Adiciona um novo usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function add(StoreUsuarioRequest $request) 
    {

        $msg = 'Erro ao adicionar';

        if ($request->input('_token') != '') {
            $regras = [
                'nome' => 'required',
                'cpf' => 'required|min:11|max:11',
                'sexo' => 'required|min:1|max:1',
                'endereco' => 'required|max:100',
                'cidade' => 'required|max:50',
                'estado' => 'required|min:4|max:20',
                'data_nascimento' => 'required|date'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'cpf.min' => 'O campo CPF deve ter no mínimo 11 caracteres',
                'cpf.max' => 'O campo CPF deve ter no máximo 11 caracteres',
                'sexo.min' => 'O campo sexo deve ter no mínimo 1 caractere',
                'sexo.max' => 'O campo sexo deve ter no máximo 1 caractere',
                'endereco.max' => 'O campo endereço deve ter no máximo 100 caracteres',
                'cidade.max' => 'O campo cidade deve ter no máximo 50 caracteres',
                'estado.min' => 'O campo estado deve ter no mínimo 4 caracteres',
                'estado.max' => 'O campo estado deve ter no máximo 20 caracteres',
                'data_nascimento.date' => 'O campo data de nascimento deve ser uma data',
            ];

            $request->validate($regras,$feedback);

        }

        if ($request->input('id') == '') {

            $usuario = new Usuario();
            $usuario->create($request->all());
            $msg = 'Registro adicionado com sucesso';

        } else {
            
            $usuario = Usuario::find($request->input('id'));
            $update = $usuario->update($request->all());

            if ($update) $msg = "Atualizado com sucesso";
            else $msg = "Erro ao atualizar o registro";

        }

        return redirect()->route('usuario.adicionar', ['msg' => $msg]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $regras = [
            'nome' => 'required',
            'cpf' => 'required|min:11|max:11',
            'sexo' => 'required|min:1|max:1',
            'endereco' => 'required|max:100',
            'cidade' => 'required|max:50',
            'estado' => 'required|min:4|max:20',
            'data_nascimento' => 'required|date'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'cpf.min' => 'O campo CPF deve ter no mínimo 11 caracteres',
            'cpf.max' => 'O campo CPF deve ter no máximo 11 caracteres',
            'sexo.min' => 'O campo sexo deve ter no mínimo 1 caractere',
            'sexo.max' => 'O campo sexo deve ter no máximo 1 caractere',
            'endereco.max' => 'O campo endereço deve ter no máximo 100 caracteres',
            'cidade.max' => 'O campo cidade deve ter no máximo 50 caracteres',
            'estado.min' => 'O campo estado deve ter no mínimo 4 caracteres',
            'estado.max' => 'O campo estado deve ter no máximo 20 caracteres',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data',
        ];

        $request->validate($regras,$feedback);
        Usuario::create($request->all());
        return ["msg" => "Registro adicionado com sucesso"];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    /**
     * Abre a tela de consultar os usuarios
     *
     * @return \Illuminate\Http\Response
     */
    public function consultar() 
    {
        return view('usuario.consultar');
    }

    /**
     * Pesquisa no banco pelos parametros passados pelo argumento
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function search(StoreUsuarioRequest $request)
    {
        $usuario = DB::table('usuarios');
        
        if (($request->input('nome')) != null) $usuario = $usuario->where('nome','like','%'.$request->input('nome').'%');
        if (($request->input('cpf')) != null) $usuario = $usuario->where('cpf','like','%'.$request->input('cpf').'%');
        if (($request->input('sexo')) != null) $usuario = $usuario->where('sexo','like','%'.$request->input('sexo').'%');
        if (($request->input('endereco')) != null) $usuario = $usuario->where('endereco','like','%'.$request->input('endereco').'%');
        if (($request->input('cidade')) != null) $usuario = $usuario->where('cidade','like','%'.$request->input('cidade').'%');
        if (($request->input('estado')) != null) $usuario = $usuario->where('estado','like','%'.$request->input('estado').'%');
        if (($request->input('data_nascimento')) != null) $usuario = $usuario->where('data_nascimento',date($request->input('data_nascimento')));

        $usuarios = $usuario->paginate(2);
        
        return view('usuario.consultar', ['usuarios' => $usuarios, 'request' => $request->all()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Mostra a tela de edição
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $usuario = Usuario::find($id);
        return view('usuario.adicionar', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $usuario->update($request->all());
        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return ['msg' => 'Registro removido com sucesso'];
    }

    /**
     * Deleta o dado do banco a partir de seu id
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        Usuario::find($id)->delete();
        $msg = 'Registro excluido com sucesso';
        return redirect()->route('usuario.consultar', ['msg' => $msg]);
    }
}
