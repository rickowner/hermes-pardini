<?php

namespace App\Http\Controllers;

use App\CadastroModel;
use App\EnderecoModel;
use App\TelefoneModel;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $telefones_controller;
    private $cadastros;
    private $endereco;
    private $telefone;

    public function __construct(TelefonesController $telefones_controller)
    {
        //Injeção de Dependências
        $this->telefones_controller = $telefones_controller;
        $this->cadastros = new CadastroModel;
        $this->endereco  = new EnderecoModel;
        $this->telefone  = new TelefoneModel;
    }

    public function index()
    {
         # code...
         $data = CadastroModel::all();
         return view('api')
             ->withData ( $data );
 
        //  $row_endereco = EnderecoModel::all ();
        //      return view('cadastro')
        //          ->withData ( $row_endereco );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastros');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data_nascimento = strtr($request->data_nascimento, '/', '-');

        $cadastro                  = new CadastroModel;
        $cadastro->nome            = $request->nome;
        $cadastro->sobrenome       = $request->sobrenome;
        $cadastro->email           = $request->email;
        $cadastro->data_nascimento = date('y-m-d', strtotime($data_nascimento));
        $cadastro->save();

        $endereco           = new EnderecoModel;
        $endereco->cep      = preg_replace('/\D/', '', $request->cep);
        $endereco->endereco = $request->endereco;
        $endereco->numero = $request->numero;
        $cadastro->endereco()->save($endereco);

        $telefone                           = new TelefoneModel;
        $telefone->telefone_principal   = $request->telefone_principal;
        $telefone->telefone_comercial   = $request->telefone_comercial;
        $telefone->telefone_celular     = $request->telefone_celular;
        $telefone->telefone_residencial = $request->telefone_residencial;
        $telefone->telefone_recado1     = $request->telefone_recado1;
        $telefone->telefone_recado2     = $request->telefone_recado2;
        $cadastro->telefone()->save($telefone);

        // CadastroModel::create($request->all());
        // if($request->telefone)
        // {
        //     $this->telefones_controller->store();
        // }
        
        return redirect("/api")->with("message", "Pessoa criada com sucesso!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CadastroModel  $cadastroModel
     * @return \Illuminate\Http\Response
     */
    public function show(CadastroModel $cadastroModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CadastroModel  $cadastroModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('edit', [
            'cadastro' => $this->getCadastro($id)
        ]);
    }

    protected function getCadastro($id)
    {
        return $this->cadastros->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CadastroModel  $cadastroModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data_nascimento = strtr($request->data_nascimento, '/', '-');

        $cadastro = $this->getCadastro($request->id);

        $cadastro->nome            = $request->nome;
        $cadastro->sobrenome       = $request->sobrenome;
        $cadastro->email           = $request->email;
        $cadastro->data_nascimento = date('y-m-d', strtotime($data_nascimento));
        $cadastro->update();
        
        $endereco           = EnderecoModel::find($request->id);
        $endereco->cep      = preg_replace('/\D/', '', $request->cep);
        $endereco->endereco = $request->endereco;
        $endereco->numero   = $request->numero;
        $endereco->update();

        $telefone                       = TelefoneModel::find($request->id);
        $telefone->telefone_principal   = preg_replace('/[^\d]/', '',$request->telefone_principal);
        $telefone->telefone_comercial   = preg_replace('/[^\d]/', '',$request->telefone_comercial);
        $telefone->telefone_celular     = preg_replace('/[^\d]/', '',$request->telefone_celular);
        $telefone->telefone_residencial = preg_replace('/[^\d]/', '',$request->telefone_residencial);
        $telefone->telefone_recado1     = preg_replace('/[^\d]/', '',$request->telefone_recado1);
        $telefone->telefone_recado2     = preg_replace('/[^\d]/', '',$request->telefone_recado2);
        $telefone->update();


        return redirect('/api');

        // return redirect()->route('cadastros')->with('message', 'Cadastro Editado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CadastroModel  $cadastroModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CadastroModel $cadastroModel)
    {
        //
    }
}
