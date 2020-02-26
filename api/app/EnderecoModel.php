<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnderecoModel extends Model
{
    //
    protected $table = 'tb_endereco';
    protected $fillable = ['id', 'cadastro_id', 'cep', 'endereco', 'numero'];

    public function cadastro()
    {
        return $this->belongsTo(CadastroModel::class);
    }
}
