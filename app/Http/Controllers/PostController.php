<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Контроллер для обработки поста
 * обрабатывает http-запросы
 */
class PostController extends Controller
{
    public function index()
    {
        /*
        // Вытягиваем первый пост из таблицы
        $post = Post::find(1);
        // Вытягиваем все посты
        $posts_all = Post::all();
        // Выборка публикованных постов
        $posts_where = Post::where('is_published', 1)->get();
        // Выборка первого публикованного поста
        $post_first = Post::where('is_published', 1)->first();
        foreach ($posts_all as $post) {
            dump($post->title);
        }
        */

        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);

        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);

        $post->updateOrFail($data);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        // Удаление
        $post = Post::find(6);
        $post->delete();

        // Восстановление после удаления в таблице с Soft delete
//        $post = Post::withTrashed()->find(6);
//        $post->restore();
        dd('deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate([
            'title' => 'first title'
        ], [
            'title' => 'an_post',
            'content' => 'an_content',
            'image' => 'an_img',
            'likes' => 3211,
            'is_published' => '0',
        ]);
        dump($post->content);
        dd('finish');
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate([
            'title' => 'upd_post'
        ], [
            'title' => 'upd_post',
            'content' => 'upd_content1111',
            'image' => 'upd_img1111',
            'likes' => 3211322,
            'is_published' => '0',
        ]);

        dump($post->content);

        dd('updated');
    }
}
