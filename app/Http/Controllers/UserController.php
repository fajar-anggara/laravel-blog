<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['user'] = user::All();
        $data['menu'] = \App\menu::where('is_active', 1)->get();
        
        return view('admin.user', compact('data'));
    }

    public function edit($id)
    {
        $data['user'] = user::where('id', $id)->first();
        $data['menu'] = \App\menu::where('is_active', 1)->get();

        return view('admin.profile', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validation = \Illuminate\Support\Facades\validator::make($request->all(), [
        //     'name' => 'required|min:3',
        //     'password' => 'required|min:3',
        //     'ttl' => 'required|min:3',
        //     'email' => 'required|min:3|email',
        //     'description' => 'required|min:3'
        // ]);

        // if ($validation ->fails()) {
        //     return back()->with('response', 'Input anda tidak memenuhi <strong>validasi kami</strong> <button class="ml-3 btn btn-danger" data-toggle="modal" data-target="#createUser">Lihat error</button>')
        //                 ->witherrors($validation)
        //                 ->withinput();
        // }

        $request->validate([
            'name' => 'required|min:3',
            'password' => 'required|min:3',
            'ttl' => 'required|min:3',
            'email' => 'required|min:3|email',
            'description' => 'required|min:3'
        ]);

        user::create([
            'name' => $request->name ,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'ttl' => $request->ttl ,
            'email' => $request->email ,
            'role' => $request->role ,
            'blog_id' => 0,
            'description' => $request->description ,
            'facebook' => $request->facebook ,
            'instagram' => $request->instagram ,
            'twitter' => $request->twitter ,
            'whatsapp' => $request->whatsapp ,
            'github' => $request->github ,
            'linkedin' => $request->linkedin ,
            'youtube' => $request->youtube ,
            'owncv' => $request->owncv 
        ]);

        return back()->with('success', 'user berhasil ditambahkan, harap aktifkan user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = user::where('id', $id)->first();
        switch ($request->type) {
            case 'aktif':
                $user->update([
                    'is_active' => $request->is_active
                ]);
                if ($request->is_active == 1)
                    {$feedack = 'Diaktifkan';} 
                else { $feedack = 'Dinonaktifkan';}

                return back()->with('success', 'User berhasil '.$feedack) ;
            break;
            case 'role':
                $user->update([
                    'role' => $request->role
                ]);

                return back()->with('success', 'Data berhasil diupdate');
            break;
            case 'editProfile':
                // $validation = \Illuminate\Support\Facades\validator::make($request->all(), [
                //     'name' => 'required|min:3',
                //     'ttl' => 'required|min:3',
                //     'email' => 'required|min:3|email',
                //     'description' => 'required|min:3'
                // ]);

                // if ($validation ->fails()) {
                //     return back()->with('response', 'Input anda tidak memenuhi <strong>validasi kami</strong>')
                //                 ->witherrors($validation)
                //                 ->withinput();
                // }

                $request->validate([
                    'name' => 'required|min:3',
                    'ttl' => 'required|min:3',
                    'email' => 'required|min:3|email',
                    'description' => 'required|min:3'
                ]);

                if ($request->password) {
                    // $validation = \Illuminate\Support\Facades\validator::make($request->all(), [
                    //     'password' => 'required|min:3'
                    // ]);

                    // if ($validation ->fails()) {
                    //     return back()->with('response', 'Input anda tidak memenuhi <strong>validasi kami</strong>')
                    //                 ->witherrors($validation)
                    //                 ->withinput();
                    // }

                    $request->validate([
                        'password' => 'required|min:3'
                    ]);

                } 
                else {
                    $password = $user->password;
                }

                if ($request->file('profil_image')) {
                    // $validation = \Illuminate\Support\Facades\validator::make($request->all(), [
                    //     'profil_image' => 'image'
                    // ]);

                    // if ($validation ->fails()) {
                    //     return back()->with('response', 'Input anda tidak memenuhi <strong>validasi kami</strong>')
                    //                 ->witherrors($validation)
                    //                 ->withinput();
                    // }

                    $request->validate([
                        'profil_image' => 'image'
                    ]);

                    $profil_image = $request->file('profil_image')->storeAs('ava', $id.'.'.$request->file('profil_image')->extension(), 'public');
                } 
                else {
                    $profil_image = $user->profil_image;
                }

                $user->update([
                    'name' => $request->name,
                    'password' => $password,
                    'ttl' => $request->ttl,
                    'email' => $request->email,
                    'role' => session('role'),
                    'profil_image' => $profil_image,
                    'description' => $request->description,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'twitter' => $request->twitter,
                    'whatsapp' => $request->whatsapp,
                    'github' => $request->github,
                    'linkedin' => $request->linkedin,
                    'youtube' => $request->youtube,
                    'owncv' => $request->owncv,
                    'is_active' => 1
                ]);

                return back()->with('success', 'Data anda berhasil diedit');
            break;
            default:
                
            break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\App\blog::where('author', $id)->first()) {
            return back()->with('response', 'Tidak bisa menghapus user ketika user memiliki post yang belum dihapus <strong> Harap hapus post yang user ini posting terlebih dahulu </strong>');
        } else { user::destroy($id); return back()->with('success', 'User berhasil dihapus');}
    }

    public function message(request $request, $type = null, $myid = null, $id = null)
    {
        switch ($request->type) {
            case 'addMessage':
                DB::table('message')->insert([
                    'from' => session('id'),
                    'target' => $request->target,
                    'is_read' => 0,
                    'message' => $request->message,
                    'updated_at' => date('Y-m-d h:i:s')
                ]);

                return back()->with('success', 'Pesan berhasil dikirim');
            break;
            case 'replyMessage':
                DB::table('message')->insert([
                    'from' => session('id'),
                    'reply_from' => session('id'),
                    'target' => $request->target,
                    'is_read' => 0,
                    'message' => $request->message,
                    'updated_at' => date('Y-m-d h:i:s')
                ]);

                return back()->with('success', 'Pesan berhasil dibalas');
            break;
        }
        switch ($type) {
            case 'del':
                if (session('id') == $myid) {
                    DB::table('message')->where('id', $id)->delete();
                    return back()->with('success', 'Data berhasil dihapus');
                } else {return back()->with('response', 'Anda tidak mempunyai hak');}
            break;
            case 'dell':
                if (session('id') == $myid) {
                    DB::table('message')->where('id', $id)->update([
                        'deleted_at' => date('Y-m-d h:i:s')
                    ]);
                    return back()->with('success', 'Data berhasil dihapus');
                } else {return back()->with('response', 'Anda tidak mempunyai hak');}
            break;
            default:
                $id = session('id');

                $data['message'] = DB::table('message')->where('deleted_at', null)->where('target', $id)->where('is_read', 0)->orderBy('updated_at', 'DESC')->get();
                $data['messager'] = DB::table('message')->where('deleted_at', null)->where('target', $id)->where('is_read', 1)->orderBy('updated_at', 'DESC')->get(); // message read

                foreach ($data['message'] as $message) {
                    DB::table('message')->where('id', $message->id)->update(['is_read'=>1]);
                }

                $data['messages'] = DB::table('message')->where('from', $id)->orderBy('updated_at', 'DESC')->get();
                $data['menu'] = \App\menu::where('is_active', 1)->get();
                $data['user'] = user::All();

                return view('admin.notifandmessage', compact('data'));
            break;
        }
    }

    public function input(request $request)
    {
        switch ($request->type) {
            case 'inputLogin':
                if ($user = user::where('name', $request->name)->first()) {} 
                elseif ($user = user::where('email', $request->name)->first()) {}

                if ($user && PASSWORD_VERIFY($request->password, $user->password) && $user->is_active == 1) {

                    session(['role' => $user->role]);
                    session(['id' => $user->id]);

                    return redirect('admin/report')->with('success', 'Selamat datang '.$user->name);
                }
                else {
                    $message = '';

                    if ($request->name == null) {
                        $request->name = 'name';
                    }

                    if ($user) {
                        if (!PASSWORD_VERIFY($request->password, $user->password)) {
                            $message = $message.'<div class="p-2"> password salah </div>';
                        }

                        if ($user->is_active == 0) {
                            $message = $message.'<div class="p-2"> Akun anda belum aktif </div>';
                        }
                    } else {
                        $message = '<div class="p-2"> Akun tidak ditemukan (cek ejaan nama atau email) </div>';
                    }

                    return back()->with('response', $message);
                }
            break;
            case 'inputRegister':
                // $validation = \Illuminate\Support\Facades\validator::make($request->all(), [
                //     'name' => 'required|min:3',
                //     'password' => 'required|min:3',
                //     'ttl' => 'required|min:3',
                //     'email' => 'required|min:3|email',
                //     'description' => 'required|min:3'
                // ]);

                // if ($validation ->fails()) {
                //     return back()->with('response', 'Registrasi anda <strong>Tidak memenuhi syarat</strong> <button class="btn btn-danger ml-5" id="register">Lihat error</button>')
                //                 ->witherrors($validation)
                //                 ->withinput();
                // }

                $request->validate([
                    'name' => 'required|min:3',
                    'password' => 'required|min:3',
                    'ttl' => 'required|min:3',
                    'email' => 'required|min:3|email',
                    'description' => 'required|min:3'
                ]);

                user::create([
                    'name' => $request->name ,
                    'password' => password_hash($request->password, PASSWORD_DEFAULT),
                    'ttl' => $request->ttl ,
                    'email' => $request->email ,
                    'role' => $request->role ,
                    'blog_id' => 0,
                    'description' => $request->description ,
                    'facebook' => $request->facebook ,
                    'instagram' => $request->instagram ,
                    'twitter' => $request->twitter ,
                    'whatsapp' => $request->whatsapp ,
                    'github' => $request->github ,
                    'linkedin' => $request->linkedin ,
                    'youtube' => $request->youtube ,
                    'owncv' => $request->owncv 
                ]);

                return back()->with('success', 'Akun anda sudah didaftarkan, Tinggal menunggu persetujuan admin');
            break;
        } 
    }

    public function logout ()
    {
        session()->flush();

        return redirect('admin/')->with('success', 'Berhasil Logout');
    }
}
