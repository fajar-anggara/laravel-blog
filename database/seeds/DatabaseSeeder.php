<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\menu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\user::create([
            'name' => 'Admin',
            'password' => password_hash("admin", PASSWORD_DEFAULT),
            'ttl' => 'Tempat lahir, dd-mm-yy',
            'email' => 'emailadmin@gmail.com',
            'role' => 2, // role admin adalah 2
            'profil_image' => 'ava/default.jpg',
            'blog_id' => 0,
            'description' => 'Tulis deskripsi profile anda disini',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram',
            'twitter' => null,
            'whatsapp' => null,
            'github' => 'https://github.com',
            'linkedin' => null,
            'youtube' => null,
            'owncv' => null,
            'is_active' => 1,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);
        \App\user::create([
            'name' => 'author',
            'password' => password_hash("author", PASSWORD_DEFAULT),
            'ttl' => 'Tempat Lahir, dd-mm-yy',
            'email' => 'emaileditor@gmail.com',
            'role' => 1, // default role editor adalah 1
            'profil_image' => 'ava/default.jpg',
            'blog_id' => 0,
            'description' => 'Tulis Deskripsi anda disini',
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'twitter' => null,
            'whatsapp' => null,
            'github' => null,
            'linkedin' => null,
            'youtube' => null,
            'owncv' => null,
            'is_active' => 1,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);

        \App\menu::create([
            'role' => 1,
            'menu' => 'Report',
            'link' => 'admin/report',
            'icon' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
            'is_active' => 1,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);
        \App\menu::create([
            'role' => 1,
            'menu' => 'Post',
            'link' => 'admin/post',
            'icon' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
            'is_active' => 1,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);
        \App\menu::create([
            'role' => 1,
            'menu' => 'Kategori',
            'link' => 'admin/categories',
            'icon' => '<i class="fa fa-tags" aria-hidden="true"></i>',
            'is_active' => 1,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);
        \App\menu::create([
            'role' => 2,
            'menu' => 'User',
            'link' => 'admin/user',
            'icon' => '<i class="fa fa-user" aria-hidden="true"></i>',
            'is_active' => 1,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);
        \App\menu::create([
            'role' => 1,
            'menu' => 'Pesan',
            'link' => 'admin/message',
            'icon' => '<i class="fa fa-envelope" aria-hidden="true"></i>',
            'is_active' => 1,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);

        \App\idGenerator::create([
            'id' => 1,
            'blog_id_g' => 2,
            'comments_id_g' => 2,
            'article_id_g' => 2,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);

        \App\categorie::create([
            'id' => 1,
            'categori' => 'kategori1',
            'post' => 1,
            'is_active' => 1,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);
        \App\categorie::create([
            'id' => 2,
            'categori' => 'kategori2',
            'post' => 1,
            'is_active' => 1,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);

        \App\report::create([
            'blog_id' => 1,
            'user_id' => 1,
            'type' => 'post',
            'crtd' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);
        \App\report::create([
            'blog_id' => 2,
            'user_id' => 2,
            'type' => 'post',
            'crtd' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);

        $w = 1;
        $x = 1;
        while ($x <= 7) {
          $min = mktime(0,0,0, date('m'),date('d')-$x,date('Y'));
              for ($i=0; $i < random_int(1, 20); $i++) { 
                  \App\report::create([
                      'blog_id' => 1,
                      'user_id' => 2,
                      'type' => 'views',
                      'crtd' => date('Y-m-d', $min),
                      'updated_at' => null,
                      'created_at' => null,
                      'deleted_at' => null
                  ]);
              }
              for ($i=0; $i < random_int(1, 20); $i++) { 
                  \App\report::create([
                      'blog_id' => 2,
                      'user_id' => 1,
                      'type' => 'views',
                      'crtd' => date('Y-m-d', $min),
                      'updated_at' => null,
                      'created_at' => null,
                      'deleted_at' => null
                  ]);
              }
          $w++;
          $x++;
        }

        \App\blog::create([
            'id' => 1,
            'title' => 'Article 2 by author',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum </p> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum </p> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum </p>',
            'author' => 2,
            'categories' => 1,
            'tags' => 'First,Post,Start',
            'comments_id' => 1,
            'article_id' => 1,
            'keyword' => 'Loremipsum',
            'thumbnail' => 'thumbs/example.jpeg',
            'article' => '12345',
            'views' => \App\report::where('blog_id', 1)->where('type', 'views')->count(),
            'is_recomended' => 0,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);
        \App\blog::create([
            'id' => 2,
            'title' => 'Artikel 1 by admin',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum </p> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum </p> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum </p>',
            'author' => 1,
            'categories' => 2,
            'tags' => 'First,Post,Start',
            'comments_id' => 2,
            'article_id' => 2,
            'keyword' => 'Loremipsum',
            'thumbnail' => 'thumbs/example.jpeg',
            'article' => '12345',
            'views' => \App\report::where('blog_id', 2)->where('type', 'views')->count(),
            'is_recomended' => 0,
            'updated_at' => date('Y-m-d h:i:s'),
            'created_at' => date('Y-m-d h:i:s'),
            'deleted_at' => null
        ]);
    }
}
