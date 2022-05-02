<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Inserindo usando o método create (tem que ter o atributo fillable na classe)
        Fornecedor::create([
            'nome' => 'Fornecedor 100',
            'site' => 'fornecedor100.com.br',
            'uf' => 'CE',
            'email' => 'contato@fornecedor100.com.br'
        ])->save();

        # Inserindo com insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedo200.com.br',
            'uf' => 'PI',
            'email' => 'contato@fornecedor200.com.br'
        ]);
    }
}
