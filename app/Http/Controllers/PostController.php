<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Контроллер для обработки поста
 * обрабатывает http-запросы
 */
class PostController extends Controller
{
    public function index()
    {
        // Вытягиваем первый пост из таблицы
        $post = Post::find(1);
        // Вытягиваем все посты
        $posts_all = Post::all();
        // Выборка публикованных постов
        $posts_where = Post::where('is_published', 1)->get();
        // Выборка первого публикованного поста
        $post_first = Post::where('is_published', 1)->first();
        foreach ($posts_all as $post) {
            dump($post->title);
        }

        dd('end');
    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'first title',
                'content' => 'first cont',
                'image' => 'first img',
                'likes' => 133,
                'is_published' => '1',
            ],
            [
                'title' => 'sec_title',
                'content' => 'sec_cont',
                'image' => 'sec_img',
                'likes' => 32,
                'is_published' => '0',
            ],
        ];

        foreach ($postsArr as $post) {
            Post::create($post);
        }

        dd('created');
    }
}
