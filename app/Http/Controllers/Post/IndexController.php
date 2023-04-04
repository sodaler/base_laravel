<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

/**
 * Однометодный контроллер
 */
class IndexController extends BaseController
{
    // Вызывается при вызове объекта, как функцию
    public function __invoke()
    {
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }
}
