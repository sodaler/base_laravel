<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

/**
 * Однометодный контроллер
 */
class ShowController extends Controller
{
    // Вызывается при вызове объекта, как функцию
    public function __invoke(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
