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
use Faker\Factory as Faker;

class FullSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create('id_ID');

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

    	$data_tahun_ajaran = [
			['th_ajaran'=>'2019/2020'],
			['th_ajaran'=>'2020/2021']
		];

    	foreach ($data_tahun_ajaran as $i => $data) {
    		$tahunajaran = new TahunAjaran();
    		$tahunajaran -> th_ajaran = $data['th_ajaran'];
    		$tahunajaran -> created_at = Carbon::now();
    		$tahunajaran -> save();
			
			$jadwal_pendaftaran = new JadwalPendaftaran();
			$jadwal_pendaftaran->nm_jadwal = "Gelombang ". strval($i+1);
			$jadwal_pendaftaran->id_th_ajaran = 1;
			$jadwal_pendaftaran->tgl_mulai_pendf = $faker->dateTimeBetween($startDate='-3 days', $endDate = 'now');
			$jadwal_pendaftaran->tgl_akhir_pendf = $faker->dateTimeBetween($startDate='+1 week', $endDate = '+1 month');
			$jadwal_pendaftaran->tgl_mulai_tes = $faker->dateTimeBetween($startDate='+14 days', $endDate = '+17 days');
			$jadwal_pendaftaran->tgl_akhir_tes = $faker->dateTimeBetween($startDate='+17 days', $endDate = '+19 days');
			$jadwal_pendaftaran->tgl_hasil_seleksi = $faker->dateTimeBetween($startDate='+20 days', $endDate = '+21 days');
			$jadwal_pendaftaran->save();
		}


		$id_role_siswa = Role::where('name', 'siswa')->first()->id_role;
		$id_jadwal = JadwalPendaftaran::first()->id_jadwal;
		$limit = 5;
		for ($i = 1; $i < $limit; $i++) {
			$count_pendaftaran = CalonSiswa::count();
			$no_pendaftaran = "DF" . date("y-") . (sprintf('%05d', $count_pendaftaran + 1));

			$user = new User();
			$email = $faker->email;
			$user->email = $email;
			$user->password = bcrypt($email);
			$user->id_role = $id_role_siswa;
			$user->save();

			$calon_siswa = new CalonSiswa();

			$calon_siswa->no_pendf = $no_pendaftaran;
			$calon_siswa->id_user = $user->id_user;
			// $calon_siswa->kd_jurusan = $faker->randomElement($array = array('HKM', 'TTH'));
			$calon_siswa->id_jadwal = $id_jadwal;
			$calon_siswa->nm_cln_siswa = $faker->firstName;
			$calon_siswa->nisn = $faker->numberBetween($min = 100000, $max = 99999);
			$calon_siswa->jns_kelamin = $faker->randomElement($array = array('l', 'p'));
			$calon_siswa->tmp_lahir = $faker->randomElement($array = array('Klaten', 'Jogja', 'Solo', 'Semarang', 'Jakarta'));
			$calon_siswa->tgl_lahir = Carbon::now();
			$calon_siswa->agama = $faker->randomElement($array = array('islam', 'kristen', 'katolik', 'hindu', 'budha'));
			$calon_siswa->alamat = $faker->streetAddress;
			$calon_siswa->nm_ortu = $faker->firstName;
			$calon_siswa->pkrj_ortu = $faker->randomElement($array = array('PNS', 'Wiraswasta', 'TNI/POLRI', 'Lainnya'));
			$calon_siswa->gaji_ortu = $faker->randomElement($array = ['1000000 - 2000000', '2600000 - 4000000', '> 4000000']);
			$calon_siswa->sklh_asal = $faker->randomElement($array = array('SMA N 1 JAKARTA', 'SMA N 2 JAKARTA', 'SMA N 3 JAKARTA', 'SMA N 4 JAKARTA'));
			$calon_siswa->save();
		}

		$data_jurusan = [
			[
				'kd_jurusan' => 'HKM',
				'nm_jurusan' => 'Pendidikan Hukum'
			],
			[
				'kd_jurusan' => 'HK',
				'nm_jurusan' => 'Hukum'
			],
		];
		foreach ($data_jurusan as $data) {
			$jurusan = new Jurusan();
			$jurusan->kd_jurusan = $data['kd_jurusan'];
			$jurusan->nm_jurusan = $data['nm_jurusan'];
			$jurusan->save();
		}


    	// $jadwal_pendaftaran = new JadwalPendaftaran();
		// $jadwal_pendaftaran->nm_jadwal = "Gelombang 2";
		// $jadwal_pendaftaran->id_th_ajaran = 1;
		// $jadwal_pendaftaran->tgl_mulai_pendf = "2017-01-15";
		// $jadwal_pendaftaran->tgl_akhir_pendf = "2017-01-27";
		// $jadwal_pendaftaran->tgl_mulai_tes = "2017-01-18";
		// $jadwal_pendaftaran->tgl_akhir_tes = "2017-01-19";
		// $jadwal_pendaftaran->tgl_hasil_seleksi = "2017-01-20";
    	// $jadwal_pendaftaran->save();

    	// $jadwal_pendaftaran = new JadwalPendaftaran();
		// $jadwal_pendaftaran->nm_jadwal = "Gelombang 1";
		// $jadwal_pendaftaran->id_th_ajaran = 2;
		// $jadwal_pendaftaran->tgl_mulai_pendf = "2018-02-08";
		// $jadwal_pendaftaran->tgl_akhir_pendf = "2018-02-11";
		// $jadwal_pendaftaran->tgl_mulai_tes = "2018-02-12";
		// $jadwal_pendaftaran->tgl_akhir_tes = "2018-02-14";
		// $jadwal_pendaftaran->tgl_hasil_seleksi = "2018-02-15";
    	// $jadwal_pendaftaran->save();

    }
} 
