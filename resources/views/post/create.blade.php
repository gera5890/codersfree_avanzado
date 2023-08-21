<x-layout>



    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>                
            @endforeach
        </ul>

    @endif()

    <form action="{{route('posts.store')}}" method="post">
        @csrf
        <div>
            <label>
                Titulo
            </label>
            <input type="text" name="title" value="{{old('title')}}">
            <br>
        </div>
        <div>
            <label>
                Slug
            </label>
            <input type="text" name="slug" value="{{old('slug')}}">
            <br>
        </div>
        <div>
            <label>
                Contenido
            </label>
            <textarea name="body" cols="30" rows="10">{{old('body')}}</textarea>
            <br>
            <br>
        </div>

        <div>
            <label>Categorias</label>
            <select name="category_id">
                @foreach ($categories as $category)
                <option @selected(old('category_id') == $category->id) value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
            <br>
            <br>
        </div>

        {{-- <div>
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