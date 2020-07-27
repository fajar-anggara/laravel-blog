<?php

namespace App\Http\Controllers;

use App\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = menu::where('is_active', 1)->get();
        $data['menus'] = menu::All(); 
        
        return view('admin.menu', compact('data'));
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
        //     'menu' => 'required|min:2',
        //     'icon' => 'required|min:5',
        //     'link' => 'required|min:5'
        // ]);

        // if ($validation ->fails()) {
        //     return back()->with('response', 'Input anda tidak memenuhi <strong>validasi kami</strong> <button class="ml-3 btn btn-danger" data-toggle="modal" data-target="#createMenu">Lihat error</button>')
        //                 ->witherrors($validation)
        //                 ->withinput();
        // }

        $request->validate([
            'menu' => 'required|min:2',
            'icon' => 'required|min:5',
            'link' => 'required|min:5'
        ]);

        menu::create($request->all());

        return back()->with('success', 'Menu berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validation = \Illuminate\Support\Facades\validator::make($request->all(), [
        //     'menu' => 'required|min:2',
        //     'icon' => 'required|min:5',
        //     'link' => 'required|min:5'
        // ]);

        // if ($validation ->fails()) {
        //     return back()->with('response', 'Input anda tidak memenuhi <strong>validasi kami</strong> <button class="ml-3 btn btn-danger" data-toggle="modal" data-target="#createMenu">Lihat error</button>')
        //                 ->witherrors($validation)
        //                 ->withinput();
        // }

        $request->validate([
            'menu' => 'required|min:2',
            'icon' => 'required|min:5',
            'link' => 'required|min:5'
        ]);
        
        menu::where('id', $id)->update([
            'role' => $request->role,
            'menu' => $request->menu,
            'link' => $request->link,
            'icon' => $request->icon,
            'is_active' => $request->is_active
        ]);

        return back()->with('success', 'Menu berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       menu::destroy($id);

       return back();
    }
}
