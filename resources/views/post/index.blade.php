@extends('layouts.main')
@section('content')
   <div>
       <div>
           <a href="{{ route('post.create') }}" class="btn btn-primary mb-2">Create post</a>
       </div>
       @foreach($posts as $post)
           <div>{{ $post->id }} . <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></div>
       @endforeach

       <div class="mt-3">
           {{ $posts->links() }}
       </div>
   </div>
@endsection
