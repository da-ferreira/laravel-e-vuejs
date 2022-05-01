<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';  # Nome da tabela destino desse Modelo

    # Autorizando, através do array associativo protected $fillable, que o método estático
    # create receba através de um array os parametros do array
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
