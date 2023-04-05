<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

/**
 * Однометодный контроллер
 */
class ShowController extends BaseController
{
    // Вызывается при вызове объекта, как функцию
    public function __invoke(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }
}
