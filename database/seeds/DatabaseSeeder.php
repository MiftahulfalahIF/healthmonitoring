<?php

use Illuminate\Database\Seeder;
use App\Dokter;
use App\Pasien;
use App\Obat;
use App\GolonganObat;
use App\KategoriObat;
use App\Monitoring;
use App\kontrol;

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
        $dokter->nama = 'Syifa Sofiana';
        $dokter->nik = '111111';
        $dokter->status = 'aktif';
        $dokter->unit = 'bedah';
        $dokter->sub_unit = 'umum';
        $dokter->telepon = '087772262626';
        $dokter->save();

        $dokterkonsultan_id = $dokter->id;

    
        $dokter = new Dokter;
        $dokter->email = 'dpjpliza@healthmonitoring.com';
        $dokter->password = bcrypt('1234');
        $dokter->role = 'dpjp';
        $dokter->nama = 'Liza';
        $dokter->nik = '121111';
        $dokter->unit = 'bedah';
        $dokter->sub_unit = 'umum';
        $dokter->telepon = '087772262626';
        $dokter->save();

        $dokter = new Dokter;
        $dokter->email = 'dpjpdani@healthmonitoring.com';
        $dokter->password = bcrypt('1234');
        $dokter->role = 'dpjp';
        $dokter->nama = 'Dani';
        $dokter->nik = '123111';
        $dokter->unit = 'bedah';
        $dokter->sub_unit = 'umum';
        $dokter->telepon = '087772262627';
        $dokter->save();

        $dokter = new Dokter;
        $dokter->email = 'dpjpali@healthmonitoring.com';
        $dokter->password = bcrypt('1234');
        $dokter->role = 'dpjp';
        $dokter->nama = 'Ali';
        $dokter->nik = '123411';
        $dokter->unit = 'bedah';
        $dokter->sub_unit = 'umum';
        $dokter->telepon = '087772262628';
        $dokter->save();
        

    	// Seeder pasien
        
         $pasien = new Pasien;
         $pasien->email = 'pasien1@healthmonitoring.com';
         $pasien->password = bcrypt('12345');
         $pasien->no_rekam = '1001';
         $pasien->nama = 'Dzaki N S';
         $pasien->nik = '3411151001';
         $pasien->alamat = 'Ujung Berung Bandung';
         $pasien->jk = 'l';
         $pasien->tgl_lahir = '1992-06-30';
         $pasien->bb = 80.00;
         $pasien->tb = 175.00;
         $pasien->telepon = '08572123537';
         $pasien->nama_pmo = 'Hasna';
         $pasien->nik_pmo = '24111151001';
         $pasien->tlp_pmo = '08772536373';
         $pasien->save();


         // Seeder Obat
        


        $obat = new Obat;
        $obat->kode = 'yhc123';
        $obat->nama = 'RHZE';
        $obat->jenis = 'kapsul';
        $obat->bentuk = 'KDT';
        $obat->indikasi = 'meringankan beban dan pikiran secara alamiah';
        $obat->dosis = '500 gr';
        $obat->produsen = 'Harsen';
        $obat->save();

        $obat = new Obat;
        $obat->kode = 'yhc1234';
        $obat->nama = 'RH';
        $obat->jenis = 'kapsul';
        $obat->bentuk = 'Kombipak';
        $obat->indikasi = 'meringankan beban dan pikiran secara alamiah';
        $obat->dosis = '500 gr';
        $obat->produsen = 'Hanabi';
        $obat->save();

        $monitoring = new Monitoring;
        $monitoring->no_monitoring= '1';
        $monitoring->pasien_id = $pasien->id;
        $monitoring->dokterkonsultan_id = $dokter->id;
        $monitoring->klinik_awal = 'paru';
        $monitoring->tgl_mulai = '2019-05-24';
        $monitoring->tahap_pengobatan = '8';
        $monitoring->jml_kontrol = '8';
        $monitoring->status = 'berjalan';
        $monitoring->save();

       

    }
}
