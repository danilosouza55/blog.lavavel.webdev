<?php

namespace App\Http\Controllers\Painel;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends StandardController
{
    protected $model;
    protected $view = 'painel.modulos.categorias';
    protected $upload = ['image'=> 'image', 'path' => 'categoria'];
    protected $route = 'categorias';

    public function __construct(Category $category)
    {
        $this->model = $category;
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
