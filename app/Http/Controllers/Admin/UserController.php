<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Panitia;
use App\User;
use App\Role;

use DB;

class UserController extends Controller
{
    public function index()
    {
        $panitias = Panitia::paginate(5);
    	return view('pages.admin.user.index', compact('panitias'));
    }

    public function detail($id)
    {
        $panitia = Panitia::where('nip', $id)->first();

        return view('pages.admin.user.detail', compact('panitia'));
    }

    public function add()
    {
        $roles = Role::all();
        return view('pages.admin.user.add', compact('roles'));
    }

    public function store(Request $req)
    {
        $user = new User();
    	$user->email = $req->email;
    	$user->password = bcrypt($req->password);
    	$user->id_role = $req->role;
        
        if($user->save()) {
            $panitia = new Panitia;
            $panitia->nip = $req->nip;
            $panitia->id_user = $user->id_user;
            $panitia->nm_panitia = $req->nm_panitia;
            $panitia->jns_kelamin = $req->jns_kelamin;
            $panitia->agama = $req->agama;
            $panitia->alamat = $req->alamat;
            $panitia->no_hp = $req->no_hp;
            $panitia->save();
        }
        
        return redirect(route('indexUserAdmin'));
    }

    public function edit($id)
    {
        $panitia = Panitia::where('nip', $id)->first();
    	return view('pages.admin.user.edit', compact('panitia'));
    }

    public function update(Request $req)
    {
    	$panitia = Panitia::find($req->nip);
		$panitia->nm_panitia = $req->nm_panitia;
		$panitia->jns_kelamin = $req->jns_kelamin;
		$panitia->agama = $req->agama;
		$panitia->alamat = $req->alamat;
		$panitia->no_hp = $req->no_hp;
		$panitia->save();

    	return redirect(route('indexUserAdmin'));
    }
    public function delete(Request $req){
        $jadwal = Panitia::find($req->nip)->delete();
        return redirect(route('indexUserAdmin'));
    }
}
