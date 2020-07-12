<?php

use App\Like;
use Illuminate\Database\Seeder;

class BlogUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Like::create([
            'user_id' => '1',
            'blog_id' => '1'
        ]);
        Like::create([
            'user_id' => '1',
            'blog_id' => '2'
        ]);
        Like::create([
            'user_id' => '1',
            'blog_id' => '6'
        ]);
        Like::create([
            'user_id' => '1',
            'blog_id' => '7'
        ]);
        Like::create([
            'user_id' => '2',
            'blog_id' => '2'
        ]);
        Like::create([
            'user_id' => '2',
            'blog_id' => '3'
        ]);
        Like::create([
            'user_id' => '2',
            'blog_id' => '5'
        ]);
        Like::create([
            'user_id' => '3',
            'blog_id' => '1'
        ]);
        Like::create([
            'user_id' => '3',
            'blog_id' => '3'
        ]);
        Like::create([
            'user_id' => '3',
            'blog_id' => '6'
        ]);
        Like::create([
            'user_id' => '3',
            'blog_id' => '8'
        ]);
        Like::create([
            'user_id' => '4',
            'blog_id' => '2'
        ]);
        Like::create([
            'user_id' => '4',
            'blog_id' => '6'
        ]);
    }
}
