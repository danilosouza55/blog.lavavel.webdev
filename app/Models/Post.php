<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'date',
        'hour',
        'featured',
        'image',
        'status',
    ];

    /** REGRAS DE VÁLIDAÇÃO */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:3|max:100',
            'hour' => 'required|min:3|max:100',
            'date' => 'required|min:3|max:100',
            'featured' => 'required|min:1|max:1',
            'status' => 'required|min:1|max:1',

        ];
    }
}
