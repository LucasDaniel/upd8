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
        //
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
        Usuario::create($request->all());
        return view('usuario.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        Usuario::create($request->all());
        return redirect()->route('usuario.adicionar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
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

        $usuarios = $usuario->get();
        
        return view('usuario.consultar', ['usuarios' => $usuarios]);

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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
