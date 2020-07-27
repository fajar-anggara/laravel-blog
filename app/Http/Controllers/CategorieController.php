<?php

namespace App\Http\Controllers;

use App\categorie;
use App\blog;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoriId)
    {
        $data['popularPost'] = blog::where('categories',$categoriId)->orderBy('views','DESC')->limit(3)->get();
        $data['categori'] = categorie::where('id', $categoriId)->first();
        $data['article'] = blog::where('categories', $categoriId)->orderBy('created_at', 'DESC')->get();
        $data['categories'] = categorie::where('is_active', 1)->get();
        $data['author'] = \App\user::where('id', 1)->first();

        return view('blog.categories', compact('data'));
    }

    public function search(request $request, $tags = null)
    {
        if ($tags == null) {
            $data['article'] = blog::where('title', 'LIKE', '%'.$request->searchTitle.'%')->orderBy('views', 'ASC')->get();
            $data['search'] = $request->searchTitle;
            $data['tags'] = '';
        }
        elseif ($request->searchTitle == null) {
            $data['article'] = blog::where('tags', 'LIKE', '%'.$tags.'%')->orderBy('views', 'ASC')->get();
            $data['tags'] = $tags;
            $data['search'] = '';
        }

        $data['popularPost'] = blog::orderBy('views','DESC')->limit(3)->get();
        $data['categories'] = categorie::where('is_active', 1)->get();
        $data['author'] = \App\user::where('id', 1)->first();

        return view('blog.search', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = categorie::All();
        $data['menu'] = \App\menu::where('is_active', 1)->get();
        
        return view('admin.categories', compact('data'));
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
        //     'categori' => 'required'
        // ]);

        // if ($validation ->fails()) {
        //     return back()->with('response', 'Input anda tidak memenuhi <strong>validasi kami</strong> <button class="ml-3 btn btn-danger" data-toggle="modal" data-target="#createCategories">Lihat error</button>')
        //                 ->witherrors($validation)
        //                 ->withinput();
        // }

        $request->validate([
            'categori' => 'required'
        ]);

        categorie::create($request->all());

        return back()->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        categorie::where('id', $id)->update([
            'categori' => $request->categori,
            'is_active' => $request->is_active
        ]);

        return back()->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (categorie::where('id', $id)->first()->post != 0) {
            return back()->with('response', 'Tidak bisa menghapus kategori yang mempunyai Post');
        }
        else {
            categorie::destroy($id);
            return back()->with('success', 'Kategori berhasil dihapus');
        }
    }
}
