<x-layout>


    <form action="{{route('posts.update', $post)}}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label>
                Titulo
            </label>
            <input type="text" name="title" value="{{old('title', $post->title)}}">
            @error('title')
                <span style="color: red">{{$message}}</span>
            @enderror
            <br>
        </div>
        <div>
            <label>
                Slug
            </label>
            <input type="text" name="slug" value="{{old('slug', $post->slug)}}">
            @error('slug')
                <span style="color: red">{{$message}}</span>
            @enderror
            <br>
        </div>
        <div>
            <label>
                Contenido
            </label>
            <textarea name="body" cols="30" rows="10">{{old('body')}}</textarea>
            @error('body')
                <span style="color:red">{{$message}}</span>
            @enderror
            <br>
            <br>
        </div>

        <div>
            <label>Categorias</label>
            <select name="category_id">
                @foreach ($categories as $category)
                <option @selected(old('category_id') == $category->id) value="{{$post->category->id}}">{{$post->category->name}}</option>
            @endforeach
            </select>
            <br>
            <br>
        </div>
{{-- 
        <div>
            <label>
                Estado
                <input type="checkbox" @checked(old('active') == 1) name="active" value="1">
            </label>
            <br>
            <label>
                Estado
                <input type="checkbox" @checked(old('inactive') == 2) name="inactive" value="2">
            </label>
        </div> --}}

        <button type="submit">Enviar</button>
    </form>
</x-layout>