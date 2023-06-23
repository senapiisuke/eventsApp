<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    //categoriesテーブルから::pluckでcategory_nameとidを抽出し、$categoriesに返す関数を作る
    public function getList()
    {
        $categories = Category::pluck('category_name', 'id');

        return $categories;
    }

    //「カテゴリ(category)はたくさんの投稿(posts)をもつ」というリレーション関係を定義する
    public function posts()
    {
        return $this->hasMany(Information::class);
    }
}
