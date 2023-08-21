<x-layout>


    <a href="{{route('posts.create')}}">Crear un post</a>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{route('posts.show', $post)}}">
                    {{$post->title}}
                </a>
            </li>
        @endforeach
    </ul>

    {{$posts->links()}}
</x-layout>