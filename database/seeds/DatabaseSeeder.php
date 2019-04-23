<?php

use Illuminate\Database\Seeder;
use App\Dokter;
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
        
        $dokter = new Dokter;
        $dokter->email = 'dokter_konsultan@healthmonitoring.com';
        $dokter->password = bcrypt('12345');
        $dokter->role = 'dokter_konsultan';
        $dokter->nama = 'Syifa Samsara';
        $dokter->nik = '111111';
        $dokter->unit = 'bedah';
        $dokter->sub_unit = 'umum';
        $dokter->telepon = '087772262626';
        $dokter->save();

        $dokterkonsultan_id = $dokter->id;

        $dokter = new Dokter;
        $dokter->email = 'dpjp@healthmonitoring.com';
        $dokter->password = bcrypt('1234');
        $dokter->role = 'dpjp';
        $dokter->nama = 'Liza';
        $dokter->nik = '121111';
        $dokter->unit = 'bedah';
        $dokter->sub_unit = 'umum';
        $dokter->telepon = '087772262626';
        $dokter->save();

        $dpjp_id = $dokter->id;
        

    	// Seeder pasien
        
         $pasien = new Pasien;
         $pasien->email = 'pasien1@healthmonitoring.com';
         $pasien->password = bcrypt('12345');
         $pasien->no_rekam = '1001';
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
         $pasien->email = 'pasien2@healthmonitoring.com';
         $pasien->password = bcrypt('12345');
         $pasien->no_rekam = '1002';
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
         $pasien->email = 'pasien3@healthmonitoring.com';
         $pasien->password = bcrypt('12345');
         $pasien->no_rekam = '1003';
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
