<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    /**
     * Obtêm o registro de detalhes do produto associado ao produto.
     */
    public function produtoDetalhe()
    {
        /*
         * Produto tem 1 ProdutoDetalhe
         *
         * Internamente, o Eloquent ORM vai procurar 1 registro relacionado na tabela no banco
         * de produto_detalhes com base na chave estrangeira, usando a referencia do Laravel de
         * nomeção padrão das FK (que nesse caso é produto_id).
        */
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
