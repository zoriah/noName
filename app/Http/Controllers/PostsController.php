<?php

/* Der Namensraum gibt an, an welchem Ort (Pfad) sich diese Datei bedindet.
 * Wenn, wie in der storemethode, ein modelobjekt vom typ Post referenziert
 * werden soll muss auch der richtige Pfad dieses Models angegeben werden. *
 * äquivalent zu den importstatments in java.
*/
namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Post;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Integer;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this -> validate(request(), [
            'title' => 'required',
            'body'  => 'required'
        ]);


        auth()->user()->publish(new Post(request(['title', 'body'])));


        return redirect()->home();
    }
}
