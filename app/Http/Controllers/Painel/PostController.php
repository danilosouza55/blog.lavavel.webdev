<?php

namespace App\Http\Controllers\Painel;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Psy\debug;

class PostController extends StandardController
{
    protected $model;
    protected $view = 'painel.modulos.posts';
    protected $upload = ['image' => 'image', 'path' => 'post'];
    protected $route = 'posts';

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Category::all('id', 'name');

        return view("{$this->view}.create-edit", compact('items'));
    }

    public function search(Request $request)
    {
        //Recupera os dados do formulário
        $dataForm = $request->get('pesquisa');
        //Filtra os usuários
        $users = $this->model
            ->where('name', 'LIKE', "%{$dataForm}%")
            ->orWhere('description', 'LIKE', "%{$dataForm}%")
            ->paginate($this->totalpages);

        return view("painel.modulos.usuarios.index", compact('users', 'dataForm'));
    }
}