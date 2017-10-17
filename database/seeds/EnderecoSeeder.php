<?php

use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provincia= new \App\Provincia(['provincianome'=>'Maputo Cidade']);
        $provincia->save();
        $distrito= new \App\Distrito(['distritonome'=>'Kapfumo','provincia_id'=>1]);
        $distrito->save();
        $localidade= new \App\Localidade(['localidadenome'=>'Pfumo','distrito_id'=>1]);
        $localidade->save();
        $provincia= new \App\Provincia(['provincianome'=>'Maputo Pronvincia']);
        $provincia->save();
        $distrito= new \App\Distrito(['distritonome'=>'Matola','provincia_id'=>2]);
        $distrito->save();
        $localidade= new \App\Localidade(['localidadenome'=>'Matola 700','distrito_id'=>2]);
        $localidade->save();
        $provincia= new \App\Provincia(['provincianome'=>'Gaza']);
        $provincia->save();
        $distrito= new \App\Distrito(['distritonome'=>'Xai-Xai','provincia_id'=>3]);
        $distrito->save();
        $localidade= new \App\Localidade(['localidadenome'=>'Chilembene','distrito_id'=>3]);
        $localidade->save();
        $provincia= new \App\Provincia(['provincianome'=>'Inhambane']);
        $provincia->save();
        $distrito= new \App\Distrito(['distritonome'=>'Funhalouro','provincia_id'=>4]);
        $distrito->save();
        $localidade= new \App\Localidade(['localidadenome'=>'Tome','distrito_id'=>4]);
        $localidade->save();
        $localidade= new \App\Localidade(['localidadenome'=>'Mavume','distrito_id'=>4]);
        $localidade->save();
        $localidade= new \App\Localidade(['localidadenome'=>'Tsenane','distrito_id'=>4]);
        $localidade->save();
        $provincia= new \App\Provincia(['provincianome'=>'Sofala']);
        $provincia->save();
        $provincia= new \App\Provincia(['provincianome'=>'Manica']);
        $provincia->save();
        $provincia= new \App\Provincia(['provincianome'=>'Tete']);
        $provincia->save();
        $provincia= new \App\Provincia(['provincianome'=>'Zambezia']);
        $provincia->save();
        $provincia= new \App\Provincia(['provincianome'=>'Nampula']);
        $provincia->save();
        $provincia= new \App\Provincia(['provincianome'=>'Niassa']);
        $provincia->save();
        $provincia= new \App\Provincia(['provincianome'=>'Cabo Delgado']);
        $provincia->save();

    }
}
