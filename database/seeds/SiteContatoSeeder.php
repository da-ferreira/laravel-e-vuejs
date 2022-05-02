<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteContato::create([
            'nome' => 'Sistema SG',
            'telefone' => '(11) 90000-0000',
            'email' => 'sistemasg@gmail.com',
            'motivo_contato' => 1,
            'mensagem' => 'Seja bem-vindo ao sistema Super Gestão'
        ])->save();
    }
}
