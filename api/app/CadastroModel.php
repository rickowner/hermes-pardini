<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CadastroModel extends Model
{
    //
    protected $table = 'tb_cadastro';
    protected $fillable = ['nome', 'sobrenome', 'email', 'data_nascimento'];

    public function telefone()
    {
        return $this->hasMany(TelefoneModel::class, 'cadastro_id');
    }

    public function endereco()
    {
        return $this->hasMany(EnderecoModel::class, 'cadastro_id');
    }
}
