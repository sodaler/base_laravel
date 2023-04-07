<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

/**
 * Однометодный контроллер
 */
class StoreController extends BaseController
{
    // Вызывается при вызове объекта, как функцию
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $post = $this->service->store($data);

        return $post instanceof Post ? new PostResource($post) : $post;

//        return redirect()->route('post.index');
    }
}
