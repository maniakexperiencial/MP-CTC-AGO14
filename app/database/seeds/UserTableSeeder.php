<?php

// Composer: "fzaninotto/faker": "v1.3.0"
/*use Faker\Factory as Faker;*/

class UserTableSeeder extends Seeder {

	public function run()
	{
        /*DB::table('user')->truncate();
        DB::table('user_details')->truncate();*/


        DB::table('users')->insert([
            'email'=>'admin@cuentatucuento.com',
            'password'=>Hash::make('janssen123'),
            'type'=>0,
            'code'=>'',
            'active'=>1
        ]);
        $id_created=DB::getPdo()->lastInsertId();

        DB::table('user_details')->insert([
            'user_id'=>$id_created,
            'name'=>'Janssen',
            'lastname'=>'Admin',
            'phone'=>'',
            'mobile'=>'',
            'institution'=>'',
            'address'=>'',
            'rol'=> 'administrador'
        ]);
		/*$faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            UserTable::create([

            ]);
        }*/
	}

}