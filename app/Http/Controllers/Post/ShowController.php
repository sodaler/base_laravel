<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

/**
 * Однометодный контроллер
 */
class ShowController extends BaseController
{
    // Вызывается при вызове объекта, как функцию
    public function __invoke(Post $post)
    {
        return new PostResource($post);
//        return view('post.show', compact('post'));
    }
}
