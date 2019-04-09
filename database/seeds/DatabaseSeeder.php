<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     
        $user = new User;
        $user->email = 'perawat_klinik@healthmonitoring.com';
        $user->password = bcrypt('12345');
        $user->role = 'perawat_klinik';
        $user->save();
     
        $user = new User;
        $user->email = 'dokter@healthmonitoring.com';
        $user->password = bcrypt('1234');
        $user->role = 'dokter';
        $user->save();
     
        $user = new User;
        $user->email = 'pasien@healthmonitoring.com';
        $user->password = bcrypt('12345');
        $user->role = 'pasien';
        $user->save();

        $user = new User;
        $user->email = 'kepala_klinik@healthmonitoring.com';
        $user->password = bcrypt('12345');
        $user->role = 'kepala_klinik';
        $user->save();

    	
    }
}
