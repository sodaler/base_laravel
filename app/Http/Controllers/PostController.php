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

        foreach ($posts_all as $post) {
            dump($post->title);
        }

        dd('end');
    }
}
