<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

/**
 * Однометодный контроллер
 */
class IndexController extends Controller
{
    // Вызывается при вызове объекта, как функцию
    public function __invoke()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }
}
