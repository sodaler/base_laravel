<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

/**
 * Однометодный контроллер
 */
class CreateController extends BaseController
{
    // Вызывается при вызове объекта, как функцию
    public function __invoke()
    {
        $categories = Category::all();
        $posts = Post::paginate(10);
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags', 'posts'));
    }
}
