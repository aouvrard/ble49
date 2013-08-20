<?php

class EtatsTableSeeder extends Seeder {

    public function run()
    {
    	 DB::table('etats')->delete();

        $etats = array(
            array('libelle' => 'En préparation'),
            array('libelle' => 'Pret')
        );

         DB::table('etats')->insert($etats);
    }

}