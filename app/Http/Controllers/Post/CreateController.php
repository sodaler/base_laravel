<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
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
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }
}
