<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

/**
 * Однометодный контроллер
 */
class UpdateController extends BaseController
{
    // Вызывается при вызове объекта, как функцию
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($post, $data);
        return redirect()->route('admin.post.show', $post->id);
    }
}
