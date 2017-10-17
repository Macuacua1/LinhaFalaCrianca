<?php

use Illuminate\Database\Seeder;

class MotivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Saude Mental Psicossocial']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Solidao','tipo_motivo_id'=>1]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Depressao','tipo_motivo_id'=>1]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Disturbios Alimentares','tipo_motivo_id'=>1]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Medo e Ansiedade','tipo_motivo_id'=>1]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Suicidio','tipo_motivo_id'=>1]);
        $motivo->save();


        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Uso e Abuso de Substancias']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Vicios','tipo_motivo_id'=>2]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Testemunhada de uso e abuso de Substancias','tipo_motivo_id'=>2]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Outro tipo de uso e abuso de Substancias','tipo_motivo_id'=>2]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Informacoes sobre Substancias e Desvio','tipo_motivo_id'=>2]);
        $motivo->save();
//        $motivo= new \App\Motivo(['motivonome'=>'corpo/aparencia fisica','tipo_motivo_id'=>2]);
//        $motivo->save();

        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Abuso e Violencia']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Assedio Sexual','tipo_motivo_id'=>3]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Bullying','tipo_motivo_id'=>3]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Abuso ou Violencia Emocional','tipo_motivo_id'=>3]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Abuso ou Violencia Fisica','tipo_motivo_id'=>3]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Violencia Domestica','tipo_motivo_id'=>3]);
        $motivo->save();

        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Exploracao Comercial']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Trabalho Infantil','tipo_motivo_id'=>4]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Trafico Infantil','tipo_motivo_id'=>4]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Prostituicao Infantil','tipo_motivo_id'=>4]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Criancas Usadas como mendigos','tipo_motivo_id'=>4]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Sequestro para Explocacao Comercial','tipo_motivo_id'=>4]);
        $motivo->save();

        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Discriminacao']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Acesso a Educacao','tipo_motivo_id'=>5]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Relacao de Trabalho','tipo_motivo_id'=>5]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Racismo','tipo_motivo_id'=>5]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Relacao de Imigracao','tipo_motivo_id'=>5]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Testemunha de Discriminacao','tipo_motivo_id'=>5]);
        $motivo->save();

        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Familia/Relacionamento de Pares']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Adocao','tipo_motivo_id'=>6]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Expulsao de Familia','tipo_motivo_id'=>6]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Negacao de parentesco','tipo_motivo_id'=>6]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Acesso e Custodia de Filhos','tipo_motivo_id'=>6]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Crianca chefe de Familia','tipo_motivo_id'=>6]);
        $motivo->save();

        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Infenccao por HIV/SIDA/Infectados']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Luto ou Perda por HIV/SIDA','tipo_motivo_id'=>7]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Criancas Vivendo com HIV/SIDA','tipo_motivo_id'=>7]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Criancas Orfas devido ao HIV/SIDA','tipo_motivo_id'=>7]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Pais(Familia) com HIV/SIDA','tipo_motivo_id'=>7]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Informacao sobre HIV/SIDA','tipo_motivo_id'=>7]);
        $motivo->save();

        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Necessidade de Reunificacao das Criancas']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Sequestro','tipo_motivo_id'=>8]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Crianca Abandonada','tipo_motivo_id'=>8]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Crianca Perdida','tipo_motivo_id'=>8]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Crianca Desaparecida','tipo_motivo_id'=>8]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Fugitivo','tipo_motivo_id'=>8]);
        $motivo->save();

        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Necessidades Basicas']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Buscando abrigo','tipo_motivo_id'=>9]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Proteccao Alternativa','tipo_motivo_id'=>9]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Morte de Criancas/Adultos na rua','tipo_motivo_id'=>9]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Orfaos','tipo_motivo_id'=>9]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Recursos a ajuda Financeira','tipo_motivo_id'=>9]);
        $motivo->save();

        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Assuntos Legais']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Registo de Nascimento','tipo_motivo_id'=>10]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Casamentos Prematuros','tipo_motivo_id'=>10]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Criancas em Conflito com a Lei','tipo_motivo_id'=>10]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Crianca que necessita de representacao Legal','tipo_motivo_id'=>10]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Criancas testemunhas','tipo_motivo_id'=>10]);
        $motivo->save();

        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Relacao Escola']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Problemas Academicos','tipo_motivo_id'=>11]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Negligencia Educacional','tipo_motivo_id'=>11]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Gazeta Escolar','tipo_motivo_id'=>11]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'problemas de Ensino(Professor)','tipo_motivo_id'=>11]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Falta de Vagas para Estudar','tipo_motivo_id'=>11]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Falta de Meios Financeiros para Estudar','tipo_motivo_id'=>11]);
        $motivo->save();

        $categoria_motivo = new \App\Tipo_Motivo(['tipomotivonome'=>'Sexualidade']);
        $categoria_motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Gravidez','tipo_motivo_id'=>12]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Aborto','tipo_motivo_id'=>12]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Identidade Sexual','tipo_motivo_id'=>12]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Infessoes de Transmissao Sexual(ITS)','tipo_motivo_id'=>12]);
        $motivo->save();
        $motivo= new \App\Motivo(['motivonome'=>'Saude Fisica','tipo_motivo_id'=>12]);
        $motivo->save();



    }
}
