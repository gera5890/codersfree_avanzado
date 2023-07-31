<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Models\Address;
use App\Models\Category;
use App\Models\Course;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});
/**
 *   Rutas en laravel
  

Route::get('/cursos', function(){
    return "Bienvenido a la pagina de cursos";
});

Route::get('/cursos/create', function(){
    return "En esta pagina podras crear un curso";
});

Route::get('/cursos/{curso}', function($curso){
    return "Bienvenido al curso $curso";
});

Route::get('/cursos/{curso}/{categoria?}', function($curso, $categoria = null){
    if($categoria){
        return "Bienvenido al curso $curso de la categoria $categoria";
    }else{
        return "Bienvenido al curso $curso";
    }
});
 */


/**
 *  Rutas con controlador
 * 
 *
 Route::get('/', HomeController::class);

 Route::get('/cursos', [CourseController::class, 'index']);
 Route::get('/cursos/create', [CourseController::class,'create']);
 Route::get('/cursos/{curso}/{categoria?}', [CourseController::class, 'show']); 
 */


 Route::controller(CourseController::class)->group(function(){
    Route::get('/cursos', 'index');    
    Route::get('/cursos/create', 'create');
    Route::get('/cursos/{curso}/{categoria?}', 'show')->where('curso', '[A-Za-z]');
 });

 /**
  *     Rutas para un CRUD
  
  1.-Listadoi de registros
        Route::get('/posts', function(){
            return "Hola desde la pagina post";
        });
  2.-Formulario de creacion
        Route::get('/posts/create', function(){
                return "Hola desde la pagina post";
            });
  3.-Procesar la informacion del formulario
        Route::post('/posts/create', function(){
                return "Hola desde la pagina post";
            });
  4.-Mostrar un registro
        Route::get('/posts/{post}', function($post){
                        return "Aqui se mostrara un registro post $post";
                    });
  5.-Mostrar formulario para editar yun registro
        Route::get('/posts/{post}/edit', function($post){
                                return "Aqui se muestra el formulario para editar";
                            });
  6.-Actualizar el registro
            Route::put o patch('/posts/{post}/edit', function($post){
                            return "Aqui se procesa el formulario para editar";
                        });
  7.-Eliminar un registro
        Route::delete('/posts/{post}/edit', function($post){
                   return "Aqui se elimina el registro";
                });    
                        
  */

  Route::controller(CourseController::class)->prefix('/posts')->group(function(){
        Route::get('/','index')->name('post.index');
        Route::get('/create', 'create')->name('post.create');
        Route::post('/create','store')->name('post.store');
        Route::get('/{post}','show')->name('post.show');
        Route::get('/{post}/edit','edit')->name('postform.edit');
        Route::post('/{post}/edit', 'edit')->name('post.edit');
  });

  Route::get('/prueba', function(){
    // DB::table('users')
    // ->orderBy('id', 'desc')
    // ->chunk(100, function($users){
    //     foreach($users as $user){
    //         echo $user->name .'<br>';
    //     }
    // });


    // $user = DB::table('users')
    //     ->select('id','name', 'email')
    //     ->where([
    //         ['id' , '>', '2'],
    //         ['id','<', '10']]
    //     )
    //     ->get();
    //     return $user;

        // $user = DB::table('users')
        // ->select('id','name', 'email')
        // ->whereRaw("id < 20 and id > 2")
        // ->orderBy('id','desc')
        // ->get();
        // return $user;

    //   return DB::table('users')
    //         ->select('name', 'id')
    //         ->where('id', '>', '2')
    //         ->where('id','<', '10')
    //         ->get();

        // return DB::table('users')
        //     ->select('users.*')
        //     ->where('email','like','%example.com%')
        //     ->orWhere('email','like','%example.net%')
        //     ->get();
        
    // return DB::table('users')
    //     ->select('users.*')
    //     ->whereNot('email', 'like', '%.org%')
    //     ->whereNot('email', 'like', '%.net%')
    //     ->get();

    // return DB::table('users')
    //     ->select('users.*')
    //     ->whereBetween('id', [1,10])
    //     ->get();

    // return DB::table('users')
    // ->select('users.*')
    // ->whereNotIn('id', [4,1,2,3])
    // ->get();

    //  return DB::table('users')
    //      ->select('users.*')
    //      ->whereNotNull('name')
    //      ->get();


    //Retorna el perfil del usuario 1
    // $user = User::find(1);
    // $user->profile;
    // return $user;


    //retorna el usuario al que pertenece el perfil 1
    // $profile = Profile::find(1);
    
    // return $profile->user;

    // Retorna los posts que pertenecen al id 1
    // $categoria = Category::find(1);
    // return $categoria->posts;

    //Retorna la cat5egoria asociada con el post del id 1
    // $post = Post::find(1);
    // return $post->category;

    // $user = User::find(1);
    // return $user->profile->address;

    $course = Course::find(2);
    return $course->lessons;

  });