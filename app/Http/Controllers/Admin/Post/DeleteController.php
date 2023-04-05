<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

/**
 * Однометодный контроллер
 */
class DeleteController extends BaseController
{
    // Вызывается при вызове объекта, как функцию
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
