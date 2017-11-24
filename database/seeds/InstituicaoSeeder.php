<?php

use Illuminate\Database\Seeder;

class InstituicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $instituicao= new \App\Responsavel(['respnome'=>'Gabinete de Atendimento a Família ']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Comando ou esquadra da PRM  ']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Serviços de Saúde (Hospitais medicina Legal…))']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Familia(como parceiro resolvente)']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Direcção de Educação ou Escola / Conselho de Escolas /SDEJT']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Serviços provinciais ou distritais de Acção Social /SDSMAS']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Procuradoria (P.G.R.)']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Tribunal de menores ']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Direcção de registos e Notariado ']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'IPAJ']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Organizações da Sociedade civil ']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Estruturas do Bairro ']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Outras ']);
        $instituicao->save();

    }
}
