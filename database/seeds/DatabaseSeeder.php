<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pasien;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seeder user
        $user = new User;
        $user->email = 'dokter_konsultan@healthmonitoring.com';
        $user->password = bcrypt('12345');
        $user->role = 'dokter_konsultan';
        $user->save();

        //$dokterkonsultan_id = $user->id;
     
        $user = new User;
        $user->email = 'dpjp@healthmonitoring.com';
        $user->password = bcrypt('1234');
        $user->role = 'dpjp';
        $user->save();

        
     
        $user = new User;
        $user->email = 'pasien@healthmonitoring.com';
        $user->password = bcrypt('12345');
        $user->role = 'pasien';
        $user->save();

        $dokter = new Dokter;
        $dokter->type = 'dokter_konsultan';
        $dokter->nama = 'Syifa Samsara';
        $dokter->nik = '111111';
        $dokter->unit = 'bedah';
        $dokter->sub_unit = 'umum';
        $dokter->telepon = '087772262626';
        $dokter->save();

        $dokter = new Dokter;
        $dokter->type = 'dpjp';
        $dokter->nama = 'Liza';
        $dokter->nik = '121111';
        $dokter->unit = 'bedah';
        $dokter->sub_unit = 'umum';
        $dokter->telepon = '087772262626';
        $dokter->save();

        $dpjp_id = $dokter->id;
        

    	// Seeder pasien
        
         $pasien = new Pasien;
         $pasien->dpjp_id = $dpjp_id;
         $pasien->dokterkonsultan_id = $dokterkonsultan_id;
         $pasien->no_rekam = '1000';
         $pasien->nama = 'Dzaki';
         $pasien->nik = '123456789';
         $pasien->alamat = 'Xibiru Bandung';
         $pasien->jk = 'l';
         $pasien->tgl_lahir = '1992-06-30';
         $pasien->bb = 80.00;
         $pasien->tb = 175.00;
         $pasien->bentuk_obat = 'kdt';
         $pasien->telepon = '08572123537';
         $pasien->nama_pmo = 'Hasna';
         $pasien->nik_pmo = '21839812';
         $pasien->tlp_pmo = '08772536373';
         $pasien->save();

         $pasien = new Pasien;
         $pasien->dpjp_id = $dpjp_id;
         $pasien->dokterkonsultan_id = $dokterkonsultan_id;
         $pasien->no_rekam = '1001';
         $pasien->nama = 'Hasna';
         $pasien->nik = '123456755';
         $pasien->alamat = 'Xibiru Bandung Ujung Beurit';
         $pasien->jk = 'p';
         $pasien->wanita_subur = 'tidak_hamil';
         $pasien->tgl_lahir = '1993-06-30';
         $pasien->bb = 50.00;
         $pasien->tb = 165.00;
         $pasien->bentuk_obat = 'kdt';
         $pasien->telepon = '08572134437';
         $pasien->nama_pmo = 'Dzaki';
         $pasien->nik_pmo = '123449812';
         $pasien->tlp_pmo = '08774446373';
         $pasien->save();

         $pasien = new Pasien;
         $pasien->dpjp_id = $dpjp_id;
         $pasien->dokterkonsultan_id = $dokterkonsultan_id;
         $pasien->no_rekam = '1002';
         $pasien->nama = 'Yori';
         $pasien->nik = '423456755';
         $pasien->alamat = 'Purbakala Padalarng';
         $pasien->jk = 'l';
         $pasien->tgl_lahir = '1994-06-30';
         $pasien->bb = 70.00;
         $pasien->tb = 185.00;
         $pasien->bentuk_obat = 'kdt';
         $pasien->telepon = '08572134437';
         $pasien->nama_pmo = 'Broto';
         $pasien->nik_pmo = '923449812';
         $pasien->tlp_pmo = '988774446373';
         $pasien->save();

         



    }
}
