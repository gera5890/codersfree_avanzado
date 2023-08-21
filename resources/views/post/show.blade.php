<x-layout>

    <a href="{{route('posts.edit', $post)}}">Editar</a>

    <h1>{{$post->title}}</h1>
    <p>Body: {{$post->body}}</p>


    <p>categoria: {{$post->category->name}}</p>
    <p>tags:</p>
    <ul>
        @foreach ($post->tags as $tag)
           <li>
            {{$tag->name}}
           </li>
        @endforeach
    </ul>
    
    <form action="{{route('posts.destroy', $post->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar post</button>
    </form>
    

</x-layout>