<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;

    # Nome da tabela destino desse Modelo
    protected $table = 'fornecedores';

    # Autorizando, através do array associativo protected $fillable, que o método
    # estático create receba através de um array os parametros do array
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
