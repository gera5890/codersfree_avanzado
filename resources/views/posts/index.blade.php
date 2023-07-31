<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .color-red{
            color: red
        }
    </style>
</head>
<body>
    <h1>Aqu&iacute; se mostrar&aacute;n los posts</h1>
   
    <ul>
        @foreach ($posts as $post)

        @if($loop->first)
            <p>Esta es la primera iteracion</p><br>
        @endif

        @if($loop->last)
            <p>Esta es la ultima iteracion</p><br>
        @endif

        <h2>
            {{ $post['titulo'] }}
        </h2>
        <li>
            {{ $post['visitas'] }}<br>
            {{ $post['publicado'] }}<br>
            {{ $post['categoria'] }}<br>
            @foreach ($post['comentarios'] as $comentario)
                {{ $comentario['autor']}}<br>
                {{ $comentario['mensaje']}}<br>
            @endforeach

        </li>
        
        @endforeach

    

    </ul>

    @php
        $nacionalidad = "colombiano";
    @endphp

    <form action="">

        
        <label>
            <input type="checkbox" name="paises[]" @checked($nacionalidad == "peruano")>
            Peru
        </label>

        <label for="">
            <input type="checkbox" name="paises[]" @checked($nacionalidad == "colombiano")>
            Colombia
        </label>

        <label for="">
            <input type="checkbox" name="paises[]" @checked($nacionalidad == "frances")>
            Francia
        </label>

        
    <div>
        <select name="ciudad">
            <option value="1" @selected($nacionalidad == "peruano")>
                Lima
            </option>
            <option value="2" @selected($nacionalidad == "colombiano")>
                Arequipa
            </option>
            <option value="3">
                Cusco
            </option>
        </select>
    </div>

    <div>
        <input type="text" @readonly(true)>
    </div>

    <div>
        <input type="text" @required(true)>
    </div>

    <button @disabled(true)>
        Enviar
    </button>

    
</form>
   
</body>
</html>