<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = [
            [
                "titulo" => "PHP",
                "visitas" => 345,
                "publicado" => true,
                "categoria" => "back-end",
                "comentarios" => [
                    [
                        "autor" => "Luisa López",
                        "mensaje" => "Muy buen artículo"
                    ],
                    [
                        "autor" => "Carlos Pérez",
                        "mensaje" => "Artículo muy malo"
                    ]
                ]
            ],
            [
                "titulo" => "JS",
                "visitas" => 321654,
                "publicado" => true,
                "categoria" =>"front-end",
                "comentarios" => [
                    [
                        "autor" => "Luisa López",
                        "mensaje" => "Muy buen artículo"
                    ],
                    [
                        "autor" => "Carlos Pérez",
                        "mensaje" => "Artículo muy malo"
                    ]
                ]
            ]

        ];




        return view('posts.index', compact('posts'));
    }


    public function create()
    {

        return view('posts.create');
    }


    public function store(Request $request)
    {
        return "Aqui se procesa el formulario para crear el post";
    }


    public function show(string $id)
    {
        return view('posts.show', compact('id'));
    }


    public function edit(string $id)
    {

        return view('posts.edit', compact('id'));
    }


    public function update(Request $request, string $id)
    {
        return "Aqui se procesara el formulario para editar el post: $id";
    }


    public function destroy(string $id)
    {
    }
}
