<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\JadwalPendaftaran;
use App\Panitia;
use App\CalonSiswa;
use App\Jurusan;
use App\Kelas;
use App\TahunAjaran;
use App\JenisPertanyaan;
use App\Pertanyaan;
use App\PilihanJawaban;

use Carbon\Carbon;

class FullSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$role = new Role();
    	$role->name = "admin";
    	$role->description = "admin";
    	$role->save();

    	$role = new Role();
    	$role->name = "siswa";
    	$role->description = "siswa";
		$role->save();
		
		$role = new Role();
		$role->name = "pimpinan";
		$role->description = "pimpinan kampus";
		$role->save();

		$role = new Role();
		$role->name = "superadmin";
		$role->description = "superadmin";
		$role->save();

		$user = new User();
    	$user->email = "admin@example.com";
    	$user->password = bcrypt("password");
    	$user->id_role = Role::where('name','superadmin')->first()->id_role;
		$user->save();
		
		$user = new User();
    	$user->email = "pimpinan@example.com";
    	$user->password = bcrypt("password");
    	$user->id_role = Role::where('name','pimpinan')->first()->id_role;
    	$user->save();

    	$user = new User();
    	$user->email = "panitia1@panitia1.com";
    	$user->password = bcrypt("panitia1");
    	$user->id_role = Role::where('name','admin')->first()->id_role;
    	$user->save();

    	$panitia = new Panitia();
		$panitia->nip = "12345";
		$panitia->id_user = $user->id_user;
		$panitia->nm_panitia = "Panitia 1";
		$panitia->jns_kelamin = "l";
		$panitia->agama = "islam";
		$panitia->alamat = "Jl. Haji Gedad Gang Kijon No.14 Paninggilan Utara, Ciledug";
		$panitia->no_hp = "081519120000";
		$panitia->save();

    	$id_role_siswa = Role::where('name','siswa')->first()->id_role;

    	$data_tahun_ajaran = [
			['th_ajaran'=>'2017/2018'],
			['th_ajaran'=>'2018/2019'],
			['th_ajaran'=>'2019/2020'],
			['th_ajaran'=>'2020/2021']
		];

    	foreach ($data_tahun_ajaran as $i=>$data) {
    		$tahunajaran = new TahunAjaran();
    		$tahunajaran -> th_ajaran = $data['th_ajaran'];
    		$tahunajaran -> created_at = '2018-01-20 20:30:0' . $i;
    		$tahunajaran -> save();
    	}

    	$jadwal_pendaftaran = new JadwalPendaftaran();
		$jadwal_pendaftaran->nm_jadwal = "Gelombang 1";
		$jadwal_pendaftaran->id_th_ajaran = 1;
		$jadwal_pendaftaran->tgl_mulai_pendf = "2017-01-1";
		$jadwal_pendaftaran->tgl_akhir_pendf = "2017-01-6";
		$jadwal_pendaftaran->tgl_mulai_tes = "2017-01-8";
		$jadwal_pendaftaran->tgl_akhir_tes = "2017-01-11";
		$jadwal_pendaftaran->tgl_hasil_seleksi = "2017-01-13";
    	$jadwal_pendaftaran->save();

    	$jadwal_pendaftaran = new JadwalPendaftaran();
		$jadwal_pendaftaran->nm_jadwal = "Gelombang 2";
		$jadwal_pendaftaran->id_th_ajaran = 1;
		$jadwal_pendaftaran->tgl_mulai_pendf = "2017-01-15";
		$jadwal_pendaftaran->tgl_akhir_pendf = "2017-01-27";
		$jadwal_pendaftaran->tgl_mulai_tes = "2017-01-18";
		$jadwal_pendaftaran->tgl_akhir_tes = "2017-01-19";
		$jadwal_pendaftaran->tgl_hasil_seleksi = "2017-01-20";
    	$jadwal_pendaftaran->save();

    	$jadwal_pendaftaran = new JadwalPendaftaran();
		$jadwal_pendaftaran->nm_jadwal = "Gelombang 1";
		$jadwal_pendaftaran->id_th_ajaran = 2;
		$jadwal_pendaftaran->tgl_mulai_pendf = "2018-02-08";
		$jadwal_pendaftaran->tgl_akhir_pendf = "2018-02-11";
		$jadwal_pendaftaran->tgl_mulai_tes = "2018-02-12";
		$jadwal_pendaftaran->tgl_akhir_tes = "2018-02-14";
		$jadwal_pendaftaran->tgl_hasil_seleksi = "2018-02-15";
    	$jadwal_pendaftaran->save();

    }
} 
