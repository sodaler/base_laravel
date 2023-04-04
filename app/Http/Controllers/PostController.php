<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

/**
 * Контроллер для обработки поста
 * обрабатывает http-запросы
 */
class PostController extends Controller
{
//    public function index()
//    {
//        /*
//        // Вытягиваем первый пост из таблицы
//        $post = Post::find(1);
//        // Вытягиваем все посты
//        $posts_all = Post::all();
//        // Выборка публикованных постов
//        $posts_where = Post::where('is_published', 1)->get();
//        // Выборка первого публикованного поста
//        $post_first = Post::where('is_published', 1)->first();
//        foreach ($posts_all as $post) {
//            dump($post->title);
//        }
//        */
//
//        $posts = Post::all();
//        return view('post.index', compact('posts'));
//    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'string',
            'category_id' => 'int',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
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
