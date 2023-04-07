<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
       foreach ($collection as $item) {
           if (!empty($item['title'])) {
               Post::firstOrCreate([
                   'title' => $item['title']
               ],[
                   'title' => $item['title'],
                   'content' => $item['content'],
                   'image' => $item['image'],
                   'likes' => $item['likes'],
                   'category_id' => $item['category_id'],
               ]);
           }
       }
    }
}
