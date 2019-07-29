<?php

use Illuminate\Database\Seeder;
use App\Dokter;
use App\Pasien;
use App\Obat;
use App\GolonganObat;
use App\KategoriObat;
use App\Monitoring;
use App\Kontrol;
use App\Perawat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $perawat = new Perawat;
        $perawat->email = 'yantiyuniati17@gmail.com';
        $perawat->password = bcrypt('12345');
        $perawat->role = 'superadmin';
        $perawat->nama = 'YANTI YUNIATI,AMK';
        $perawat->nik = '320527080587500001';
        $perawat->status = 'aktif';
        $perawat->telepon = '085224148212';
        $perawat->save();


        $perawat = new Perawat;
        $perawat->email = 'perawat1@monitoringtb.xyz';
        $perawat->password = bcrypt('12345');
        $perawat->role = 'admin';
        $perawat->nama = 'ASIAH,AMK';
        $perawat->nik = '320527080587500004';
        $perawat->status = 'aktif';
        $perawat->telepon = '0852241212267';
        $perawat->save();
        $perawat_id = $perawat->id;

        $perawat = new Perawat;
        $perawat->email = 'perawat2@monitoringtb.xyz';
        $perawat->password = bcrypt('12345');
        $perawat->role = 'admin';
        $perawat->nama = 'JUJU JUHARNI,AMK';
        $perawat->nik = '320527080587500029';
        $perawat->status = 'aktif';
        $perawat->telepon = '0852241212289';
        $perawat->save();

        $perawat = new Perawat;
        $perawat->email = 'perawat3@monitoringtb.xyz';
        $perawat->password = bcrypt('12345');
        $perawat->role = 'admin';
        $perawat->nama = 'AYUN USWATUN HASANAH,AMK';
        $perawat->nik = '320527080587500028';
        $perawat->status = 'aktif';
        $perawat->telepon = '0852241212209';
        $perawat->save();

        $perawat = new Perawat;
        $perawat->email = 'perawat4@monitoringtb.xyz';
        $perawat->password = bcrypt('12345');
        $perawat->role = 'admin';
        $perawat->nama = 'SILMI HAFIYANTI,A.Md.Kep';
        $perawat->nik = '320527080587500029';
        $perawat->status = 'aktif';
        $perawat->telepon = '0852241212289';
        $perawat->save();

      
        $dokter = new Dokter;
        $dokter->nama = 'AZRIL HASAN, DR.,SP.P';
        $dokter->nik = '3202172309970015';
        $dokter->status = 'aktif';
        $dokter->email = 'dpjp1@monitoringtb.xyz';
        $dokter->unit = 'paru';
        $dokter->telepon = '087772262626';
        $dokter->save();
        $dokter_id = $dokter->id;

        $dokter = new Dokter;
        $dokter->nama = 'CHAIRIL SIREGAR, H. DR.,SP.P, FCCP';
        $dokter->nik = '3202172309970016';
        $dokter->status = 'aktif';
        $dokter->email = 'dpjp2@monitoringtb.xyz';
        $dokter->unit = 'paru';
        $dokter->telepon = '087772262627';
        $dokter->save();

        /**
        $dokter = new Dokter;
        $dokter->nama = 'AISYAH RISETA AINI, DR.';
        $dokter->nik = '3202172309970019';
        $dokter->status = 'aktif';  
        $dokter->email = 'dpjp3@monitoringtb.xyz';
        $dokter->unit = 'bedah';
        $dokter->sub_unit = 'umum';
        $dokter->telepon = '087772262628';
        $dokter->save();
        */
        

    	// Seeder pasien
        
         $pasien = new Pasien;
         $pasien->email = 'pasien1@monitoringtb.xyz';
         $pasien->password = bcrypt('12345');
         $pasien->no_rekam = '1001';
         $pasien->nama = 'Muhamad Arif Rifaldi';
         $pasien->nik = '320217230997001';
         $pasien->alamat = 'Purwakarta';
         $pasien->jk = 'l';
         $pasien->tgl_lahir = '1997-09-23';
         $pasien->bb = 80.00;
         $pasien->tb = 175.00;
         $pasien->telepon = '08572123537';
         $pasien->nama_pmo = 'Dwi Cahya Ningrum';
         $pasien->nik_pmo = '320217230997011';
         $pasien->tlp_pmo = '08772536374';
         $pasien->save();

         $pasien_id = $pasien->id;

         $pasien = new Pasien;
         $pasien->email = 'pasien2@monitoringtb.xyz';
         $pasien->password = bcrypt('12345');
         $pasien->no_rekam = '1002';
         $pasien->nama = 'Hendri Febrianto ';
         $pasien->nik = '320217240897002';
         $pasien->alamat = 'Purwakarta';
         $pasien->jk = 'l';
         $pasien->tgl_lahir = '1997-08-24';
         $pasien->bb = 80.00;
         $pasien->tb = 175.00;
         $pasien->telepon = '08572123537';
         $pasien->nama_pmo = 'Ferry Rizky ';
         $pasien->nik_pmo = '320217230997012';
         $pasien->tlp_pmo = '08772536434';
         $pasien->save();

         $pasien = new Pasien;
         $pasien->email = 'pasien3@monitoringtb.xyz';
         $pasien->password = bcrypt('12345');
         $pasien->no_rekam = '1003';
         $pasien->nama = 'Rizal Muhamad ';
         $pasien->nik = '320217240897045';
         $pasien->alamat = 'Purwakarta';
         $pasien->jk = 'l';
         $pasien->tgl_lahir = '1995-08-24';
         $pasien->bb = 80.00;
         $pasien->tb = 175.00;
         $pasien->telepon = '08572123537';
         $pasien->nama_pmo = 'Cecep ';
         $pasien->nik_pmo = '3202172309970432';
         $pasien->tlp_pmo = '08772536434';
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
        $monitoring->pasien_id = $pasien_id;
        $monitoring->perawat_id = $perawat_id;
        $monitoring->klinik_awal = "Paru";
        $monitoring->tgl_mulai = date('Y-m-d', strtotime("-10 days"));
        $monitoring->tahap_pengobatan = 8;
        $monitoring->jml_kontrol = 8;
        $monitoring->status = 'berjalan';
        $monitoring->save();

        $monitoring->no_monitoring = $monitoring->id."/".$monitoring->tgl_mulai."/".strtoupper($monitoring->klinik_awal);
        $monitoring->save();

        $kontrol = new Kontrol;
        $kontrol->monitoring_id =$monitoring->id;
        $kontrol->pasien_id = $monitoring->pasien_id;
        $kontrol->perawat_id = $monitoring->perawat_id;
        $kontrol->dokter_id = $dokter->id;
        $kontrol->tgl_kontrol = $monitoring->tgl_mulai;
        $kontrol->tgl_kembali = date('Y-m-d', strtotime($monitoring->tgl_mulai.' +10 days'));
        $kontrol->status = 'berjalan';
        $kontrol-> save();

        $kontrol->no_kontrol = $kontrol->id."/Kontrol/".$kontrol->perawat_id."/".date('d/m/Y', strtotime($kontrol->tgl_kontrol));
        $kontrol->save();

        $kontrolObat = new KontrolObat;
        $kontrolObat->kontrol_id = $kontrol->id;
        $kontrolObat->obat_id = 1;
        $kontrolObat->aturan_pakai = 'sebelum_makan';
        $kontrolObat->dosis_konsumsi = 5;
        $kontrolObat->total_obat = 100;
        $kontrolObat->jadwal_konsumsi = ["12"];
        $kontrolObat->save();

        $kontrolObat = new KontrolObat;
        $kontrolObat->kontrol_id = $kontrol->id;
        $kontrolObat->obat_id = 2;
        $kontrolObat->aturan_pakai = 'sesudah_makan';
        $kontrolObat->dosis_konsumsi = 5;
        $kontrolObat->total_obat = 100;
        $kontrolObat->jadwal_konsumsi = ["19"];
        $kontrolObat->save();
       

    }
}
