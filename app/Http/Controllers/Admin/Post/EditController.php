<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

/**
 * Однометодный контроллер
 */
class EditController extends BaseController
{
    // Вызывается при вызове объекта, как функцию
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::paginate(10);
        return view('admin.post.edit', compact('post', 'categories', 'tags', 'posts'));
    }
}
