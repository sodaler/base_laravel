<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

/**
 * Однометодный контроллер
 */
class UpdateController extends Controller
{
    // Вызывается при вызове объекта, как функцию
    public function __invoke(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'int',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->updateOrFail($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }
}
