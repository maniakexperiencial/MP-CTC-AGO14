<?php

// Composer: "fzaninotto/faker": "v1.3.0"
/*use Faker\Factory as Faker;*/

class StateTableSeeder extends Seeder {

	public function run()
	{
		/*$faker = Faker::create();*/
        DB::table('states')->truncate();

        DB::table('states')->insert([
            ['state'=>'Aguascalientes'],
            ['state'=>'Baja California'],
            ['state'=>'Baja California Sur'],
            ['state'=>'Campeche'],
            ['state'=>'Chiapas'],
            ['state'=>'Chihuahua'],
            ['state'=>'Coahuila'],
            ['state'=>'Colima'],
            ['state'=>'Distrito Federal'],
            ['state'=>'Durango'],
            ['state'=>'Estado de México'],
            ['state'=>'Guanajuato'],
            ['state'=>'Guerrero'],
            ['state'=>'Hidalgo'],
            ['state'=>'Jalisco'],
            ['state'=>'Michoacán'],
            ['state'=>'Morelos'],
            ['state'=>'Nayarit'],
            ['state'=>'Nuevo León'],
            ['state'=>'Oaxaca'],
            ['state'=>'Puebla'],
            ['state'=>'Querétaro'],
            ['state'=>'Quintana Roo'],
            ['state'=>'San Luis Potosí'],
            ['state'=>'Sinaloa'],
            ['state'=>'Sonora'],
            ['state'=>'Tabasco'],
            ['state'=>'Tamaulipas'],
            ['state'=>'Tlaxcala'],
            ['state'=>'Veracruz'],
            ['state'=>'Yucatán'],
            ['state'=>'Zacatecas'],
        ]);
		/*foreach(range(1, 10) as $index)
		{
			StateTableSeeder::create([

			]);
		}*/
	}

}