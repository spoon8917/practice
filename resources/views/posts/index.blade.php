<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        トップページ
    </x-slot>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        

        <title>Blog</title>

        <!-- Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
       
       
    </head>
    <body class="antialiased">
       <h1>Blog Name</h1>
       <a href='/posts/create'>create</a>
       <div class='posts'>
             @foreach ($posts as $post)
           <div class='post'>
                <a href="/posts/{{ $post->id }}"><h2 class='Title'>
                        {{ $post->title }}</h2></a>
                        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
               <p class='body'>{{ $post->body }}</p>
           </div>
           <form action="/posts/{{$post->id}}" id="form_{{$post->id}}"  method="POST">
               @csrf
               @method('DELETE')
               <button type="button" onclick="deletePost({{$post->id}})">delete</button>
           </form>
           @endforeach
       </div>
       <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <p>ログインユーザー::{{ Auth::user()->name }}</p>
        <div>
        @foreach($questions as $question)
            <div><a href="https://teratail.com/questions/{{ $question['id'] }}">
                    {{ $question['title'] }}
                </a></div>
        @endforeach
    </div>
        <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
    </body>
    </x-app-layout>
</html>
