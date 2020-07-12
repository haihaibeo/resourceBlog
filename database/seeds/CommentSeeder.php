<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'blog_id' => '1',
            'commenterName' => 'Commenter 1',
            'commentString' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'
        ]);
        Comment::create([
            'blog_id' => '1',
            'commenterName' => 'Commenter 2',
            'commentString' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'
        ]);
        Comment::create([
            'blog_id' => '2',
            'commenterName' => 'Commenter1 ',
            'commentString' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, '
        ]);
        Comment::create([
            'blog_id' => '3',
            'commenterName' => 'CommenterCommenter',
            'commentString' => 'Lorem ipsum dolor sit amet, '
        ]);
        Comment::create([
            'blog_id' => '3',
            'commenterName' => 'Commenter 4',
            'commentString' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'
        ]);
        Comment::create([
            'blog_id' => '3',
            'commenterName' => 'CommenterCommenterCommenter',
            'commentString' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing '
        ]);
        Comment::create([
            'blog_id' => '6',
            'commenterName' => 'Commenter',
            'commentString' => 'Lorem ipsum dolor sit amet, consectetuer '
        ]);
        Comment::create([
            'blog_id' => '7',
            'commenterName' => 'CommenterCommenter2',
            'commentString' => 'Lorem ipsum '
        ]);
        Comment::create([
            'blog_id' => '7',
            'commenterName' => 'Commenter Commenter 1',
            'commentString' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'
        ]);
    }
}
