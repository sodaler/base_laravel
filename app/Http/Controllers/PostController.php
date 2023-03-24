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
        dd($post->title);
    }
}
