<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoContato extends Model
{
    /**
     * Permite que o campo 'motivo_contato' seja referenciado em algumas funções
     * (como a create) para inserção no banco de dados
     *
     * @var array
     */
    protected $fillable = ['motivo_contato'];
}
