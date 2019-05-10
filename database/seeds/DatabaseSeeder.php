<?php

use Illuminate\Database\Seeder;
use App\Dokter;
use App\Pasien;
use App\Obat;
use App\GolonganObat;
use App\KategoriObat;


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
        $dokter->status = 'aktif';
        $dokter->unit = 'bedah';
        $dokter->sub_unit = 'umum';
        $dokter->telepon = '087772262626';
        $dokter->save();

        $dokterkonsultan_id = $dokter->id;

    /**
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
    */
        

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


         // Seeder Obat
        

        $golongan1 = new GolonganObat;
        $golongan1->nama = 'paracetamol';
        $golongan1->save();

        $golongan2 = new GolonganObat;
        $golongan2->nama = 'tramadol';
        $golongan2->save();

        $kategori1 = new KategoriObat;
        $kategori1->nama = 'obat_keras';
        $kategori1->save();

        $kategori2 = new KategoriObat;
        $kategori2->nama = 'obat_ringan';
        $kategori2->save();

        $obat = new Obat;
        $obat->kode = 'yhc123';
        $obat->nama = 'DECADRYL EKSPEKTORAN';
        $obat->golongan_id = $golongan1->id;
        $obat->kategori_id = $kategori1->id;
        $obat->bentuk = 'sirup';
        $obat->indikasi = 'batuk, pilek, sesak nafas';
        $obat->dosis = 'sehat';
        $obat->produsen = 'Harsen';
        $obat->save();


    }
}
