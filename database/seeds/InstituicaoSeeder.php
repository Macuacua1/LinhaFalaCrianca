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
       $instituicao= new \App\Responsavel(['respnome'=>'Organizacoes da Sociedade Civil(ONGs)']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Servicos provinciais ou Distritais de accao social']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Servicos de Saude(hospital.centro de saude,medicina legal)']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Familia(como parceiro resolvente)']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Gabinete de atendimento a familia']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Esquadra da PRM']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Direccao dos Registos e Notariados']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Comando']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Procuradoria Provincial ou Distrital da republica(PGR)']);
        $instituicao->save();
        $instituicao= new \App\Responsavel(['respnome'=>'Servicos provinciais ou Distritais de Educacao']);
        $instituicao->save();
    }
}
