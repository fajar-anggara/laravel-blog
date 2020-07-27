<?php

namespace App\Http\Controllers;

use App\blog;
use App\categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['popularPost'] = blog::orderBy('views', 'DESC')->limit(3)->get();
        $data['categories'] = categorie::where('is_active', 1)->get();
        $data['article'] = blog::orderBy('created_at', 'DESC')->get();
        $data['dipajang'] = blog::where('is_recomended', 1)->get();

        if (is_null(blog::where('is_recomended', 1)->first())) {
            $i = 0;
            $e = -1;
            $f = categorie::All();
            foreach ($f as $f) {
                $e++;
                $j[$e] = $f->id;
            }
            while ($i <= $e) {
                $data['dipajang'][$i] = 
                blog::where('categories', $j[$i])->orderBy('views', 'DESC')->first();
                $i++;
            }
        }
        
        return view('blog.home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['article'] = blog::where('author', session('id'))->orderBy('created_at', 'DESC')->get();
        $data['menu'] = \App\menu::where('is_active', 1)->get();
        $data['categories'] = categorie::where('is_active', 1)->get();

        return view('admin.post', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $validation = \Illuminate\Support\Facades\validator::make($request->all(), [
        //     'title' => 'required|min:5',
        //     'keyword' => 'required|min:5',
        //     'thumbnail' => 'required|image',
        //     'content' => 'required'
        // ]);

        // if ($validation ->fails()) {
        //     return back()->with('response', 'Input anda tidak memenuhi <strong>validasi kami</strong> <button class="ml-3 btn btn-danger" data-toggle="modal" data-target="#createNewPost">Lihat error</button>')
        //                 ->witherrors($validation)
        //                 ->withinput();
        // }

        $request->validate([
            'title' => 'required|min:5',
            'keyword' => 'required|min:5',
            'thumbnail' => 'required|image',
            'content' => 'required'
        ]);

        $tag[0] = $request->tag1;
        $tag[1] = $request->tag2;
        $tag[2] = $request->tag3;
        $tag[3] = $request->tag4;
        $tag[4] = $request->tag5;

        $z = 0;
        foreach ($tag as $tago) {
            if (is_null($tag[$z])) {
                
            } else {
                $z++;
            }
        };

        $tags = '';
        $r = 0;
        foreach ($tag as $tag) {
            if ($r <= $z - 2) {
                $tags = $tags.$tag.',';
            }
            else {
                $tags = $tags.$tag;
            }
            $r++;
        };

        $id = \App\idGenerator::find(1);
        $blog_id = $id->blog_id_g + 1;
        $comments_id = $id->comments_id_g + 1;
        $article_id = $id->article_id_g + 1;

        $thumbnail = $request->file('thumbnail')->storeAs('thumbs', $blog_id.'.'.$request->file('thumbnail')->extension(), 'public');

        

        blog::create([
            'title' => $request->title,
            'body' => $request->content,
            'author' => session('id'),
            'categories' => $request->categories,
            'tags' => $tags,
            'comments_id' => $comments_id,
            'article_id' => $article_id,
            'keyword' => $request->keyword,
            'thumbnail' => $thumbnail, 
            'article' => random_int(1, 1000000),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        $cat = categorie::where('id', $request->categories)->first();
        $i = $cat->post + 1;

        categorie::where('id', $request->categories)
            ->update([
                'post' => $i
            ]);

        \App\idGenerator::where('id', 1)
            ->update([
                'blog_id_g' => $blog_id,
                'comments_id_g' => $comments_id,
                'article_id_g' => $article_id
            ]);

        return back()->with('success', 'Post berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['article'] = blog::where('id', $id)->first();
        $data['popularPost'] = blog::orderBy('views', 'DESC')->limit(3)->get();
        $data['author'] = \App\user::where('id', $data['article']->author)->first();
        $data['relatedPost'] = blog::where('title','like','%'.implode(" ", array_slice(explode(" ", $data['article']->title), 0, 1)).'%')->limit(4)->get();
        $data['tags'] = explode(',', $data['article']->tags);
        $data['categori'] = categorie::where('id', $data['article']->categories)->first();
        $data['categories'] = categorie::where('is_active', 1)->get();
        $data['keyword'] = explode(',', $data['article']->keyword);
        blog::where('id', $id)->update([
            'views' => $data['article']->views + 1
        ]);
        \App\report::create([
            'blog_id' => $id, 
            'user_id' => $data['article']->author, 
            'type' => 'views',
            'crtd' => date('Y-m-d')
        ]);

        return view('blog.blog', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['article'] = blog::where('id', $id)->first();
        $data['menu'] = \App\menu::where('is_active', 1)->get();
        $data['categories'] = categorie::where('is_active', 1)->get();
        $data['categori'] = categorie::where('id', blog::where('id', $id)->first()->categories)->first();
        $data['author'] = \App\user::where('id', blog::where('id', $id)->first()->author)->first();

        return view('admin/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->type == 'edit') {
            $oldblog = blog::where('id', $id)->first();

            // $validation = \Illuminate\Support\Facades\validator::make($request->all(), [
            //     'title' => 'required|min:5',
            //     'keyword' => 'required|min:5',
            //     'content' => 'required'
            // ]);

            // if ($validation ->fails()) {
            //     return back()->witherrors($validation)->withinput();
            // };

            $request->validate([
                'title' => 'required|min:5',
                'keyword' => 'required|min:5',
                'content' => 'required'
            ]);

            if ($request->file('thumbnail') ==  null) {
                $thumbnail = $oldblog->thumbnail;
            }
            else {
                // $validation = \Illuminate\Support\Facades\validator::make($request->all(), [
                //     'thumbnail' => 'required|image',
                // ]);

                // if ($validation ->fails()) {
                //     return back()->witherrors($validation)->withinput();
                // };

                $request->validate([
                    'thumbnail' => 'required|image',
                ]);

                $storefile = $request->file('thumbnail')->storeAs('thumbs', $oldblog->thumbnail, 'public');
            };

            if (is_null($request->tag1)) {
                $tags = $request->tagsdulu;
            }
            else {
                $tag[0] = $request->tag1;
                $tag[1] = $request->tag2;
                $tag[2] = $request->tag3;
                $tag[3] = $request->tag4;
                $tag[4] = $request->tag5;

                $z = 0;
                foreach ($tag as $tago) {
                    if (is_null($tag[$z])) {
                        
                    } else {
                        $z++;
                    }
                };

                $tags = '';
                $r = 0;
                foreach ($tag as $tag) {
                    if ($r <= $z - 2) {
                        $tags = $tags.$tag.',';
                    }
                    else {
                        $tags = $tags.$tag;
                    }
                    $r++;
                };
            };

            $blog_id = $oldblog->id;
            $comments_id = $oldblog->comments_id;
            $article_id = $oldblog->article_id;

            blog::where('id', $id)->update([
                'title' => $request->title,
                'body' => $request->content,
                'author' => session('id'),
                'categories' => $request->categories,
                'tags' => $tags,
                'comments_id' => $comments_id,
                'article_id' => $article_id,
                'keyword' => $request->keyword,
                'thumbnail' => $oldblog->thumbnail, 
                'article' => random_int(1, 1000000),
                'updated_at' => date('Y-m-d h:i:s')
            ]);

            return back()->with('success', 'Data berhasil diedit');
        }
        elseif ($request->type == 'pajang') {
            blog::where('id', $id)->update([
                'is_recomended' => $request->pajangkah
            ]);

            if ($request->pajangkah == 1) {
                $result = 'Dipajang';
            } else {
                $result = 'Dihapus dari pajangan';
            };

            return back()->with('success', 'Post berhasil <strong>'.$result.'</strong>');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['article'] = blog::where('author', 1)->get();
        $data['menu'] = \App\menu::where('is_active', 1)->get();
        $data['categories'] = categorie::where('is_active', 1)->get();

        $post = categorie::where('id', blog::where('id', $id)->first()->categories)->first()->post - 1;

        categorie::where('id', blog::where('id', $id)->first()->categories)->update([
            'post' => $post
        ]);

        blog::destroy($id);

        return redirect('admin/post')->with('success', 'Post berhasil<strong> Dihapus </strong>');
    }

    public function report() 
    {
        $data['menu'] = \App\menu::where('is_active', 1)->get();
        $data['totalPost'] = blog::where('id', session('id'))->count();
        $data['totalViews'] = \App\report::where('user_id', session('id'))->where('type', 'views')->count();
        $r = new \App\report;

        $mi1 = mktime(0,0,0, date('m'),date('d')-1,date('Y'));
        $mi2 = mktime(0,0,0, date('m'),date('d')-2,date('Y'));
        $mi3 = mktime(0,0,0, date('m'),date('d')-3,date('Y'));
        $mi4 = mktime(0,0,0, date('m'),date('d')-4,date('Y'));
        $mi5 = mktime(0,0,0, date('m'),date('d')-5,date('Y'));
        $mi6 = mktime(0,0,0, date('m'),date('d')-6,date('Y'));

        $data['r'][1] = $r::where('user_id', session('id'))->where('crtd', date('Y-m-d', $mi6))->count();
        $data['r'][2] = $r::where('user_id', session('id'))->where('crtd', date('Y-m-d', $mi5))->count();
        $data['r'][3] = $r::where('user_id', session('id'))->where('crtd', date('Y-m-d', $mi4))->count();
        $data['r'][4] = $r::where('user_id', session('id'))->where('crtd', date('Y-m-d', $mi3))->count();
        $data['r'][5] = $r::where('user_id', session('id'))->where('crtd', date('Y-m-d', $mi2))->count();
        $data['r'][6] = $r::where('user_id', session('id'))->where('crtd', date('Y-m-d', $mi1))->count();
        $data['r'][7] = $r::where('user_id', session('id'))->where('crtd', date('Y-m-d'))->count();

        return view('admin.report', compact('data'));    
    }
}
