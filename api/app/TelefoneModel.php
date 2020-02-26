<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelefoneModel extends Model
{
    //
    protected $table = 'tb_telefones';
    protected $fillable = ['id', 'cadastro_id', 'telefone_principal','telefone_comercial','telefone_celular','telefone_residencial','telefone_recado1','telefone_recado2'];

    public function cadastro()
    {
        return $this->belongsTo(CadastroModel::class, 'cadastro_id');
    }
}
