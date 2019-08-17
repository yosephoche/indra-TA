<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Pembayaran;

use Auth;
use Image;
use Carbon\Carbon;

class PembayaranController extends Controller
{
	private $user;

	public function __construct(){
		$this->middleware(function ($request, $next) {
	        $this->user= Auth::user();

	        return $next($request);
		});

		if (!file_exists(public_path('uploaded'))) {
			mkdir(public_path('uploaded'), 0777, true);
		}
	}

	public function dateFormat($date){
        return Carbon::createFromFormat('d-m-Y', $date)->toDateString();
    }

    public function index(){
    	$pembayaran = $this->user->calonsiswa->pembayaran;
    	if (is_null($this->user->calonsiswa->pembayaran)) {
    		$count_pemb = Pembayaran::count();
    		$no_pemb = "BYR" . date('y') . "-" . date('m') . $count_pemb;	
    		return view('pages.siswa.pembayaran.index',compact('pembayaran','no_pemb'));
    	} else {
    		$no_pemb = $pembayaran->no_pemb;
    		if ($this->user->calonsiswa->pembayaran->sts_verif == 'sudah') {
    			$message_header = "Pembayaran Sudah di Verifikasi oleh Panitia";
    			$message_content = "Untuk selanjutnya silahkan datang ke Sekolah untuk melaksanakan Tes Seleksi sesuai Jadwal yang sudah ditentukan";
    			$form = false;
    		} else {
    			$message_header = "Terimakasih sudah melakukan Konfirmasi Pembayaran";
        		$message_content = "Mohon tunggu Verifikasi Pembayaran dari panitia";
        		$form = true;
    		}    		
    		return view('pages.siswa.pembayaran.index',compact('pembayaran','no_pemb','message_header','message_content','form'));
    	}
    }

	public function konfirmasiPembayaran(Request $req)
	{
		/*Make directory target*/
		if (!file_exists(public_path('uploaded/pembayaran'))) {
			mkdir(public_path('uploaded/pembayaran'), 0777, true);
		}
		/*Create random name*/
		$extension = $req->bukti->getClientOriginalExtension();
		$file_name = 'pembayaran-'. rand(111111, 999999) . "." . $extension;
		$req->file('bukti')->move(public_path('uploaded/pembayaran'), $file_name);

    	if (is_null($this->user->calonsiswa->pembayaran)) {
    		$pembayaran = new Pembayaran();
			$pembayaran->no_pemb = $req->no_pemb;
			$pembayaran->no_pendf = $req->no_pendf;
			$pembayaran->nm_bank = $req->nm_bank;
			$pembayaran->nm_pemilik_rek = $req->nm_pemilik_rek;
			$pembayaran->no_rek = $req->no_rek;
			$pembayaran->cbg_bank = $req->cbg_bank;
			$pembayaran->tgl_pembayaran = Carbon::now();
			$pembayaran->sts_verif = 'belum';
			$pembayaran->bukti = $file_name;
			$pembayaran->save();

            $this->user->calonsiswa->steps->update(['step_2'=>'complete','step_3'=>'active']);
            
    	} else {
    		$pembayaran = Pembayaran::find($req->no_pemb);
			$pembayaran->nm_bank = $req->nm_bank;
			$pembayaran->nm_pemilik_rek = $req->nm_pemilik_rek;
			$pembayaran->no_rek = $req->no_rek;
			$pembayaran->cbg_bank = $req->cbg_bank;
			$pembayaran->save();
    	}
		return redirect(route('indexPembayaranSiswa'));
    }
}
