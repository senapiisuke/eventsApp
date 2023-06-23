<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Information;
use App\Models\Category;

class SearchController extends Controller
{
    //カテゴリ別検索画面を表示
    public function showSearch(Request $request)
    {
        //フォームを機能させるために各情報を取得し、viewに返す
        $category = new Category;
        $categories = $category->getList();
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');


        return view('user.searchcategory', [
            'categories' => $categories,
            'searchWord' => $searchWord,
            'categoryId' => $categoryId
        ]);
    }

    public function searchCategory(Request $request)
    {
        //入力される値nameの中身を定義する
        $searchWord = $request->input('searchWord'); //投稿名の値
        $categoryId = $request->input('categoryId'); //カテゴリの値

        $query = Information::query();
        //投稿名が入力された場合、informationテーブルから一致する投稿を$queryに代入
        if (isset($searchWord)) {
            $query->where('title', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        //カテゴリが選択された場合、informationテーブルからcategoryが一致する投稿を$queryに代入
        if (isset($categoryId)) {
            $query->where('category', $categoryId);
        }

        //$queryをcategoryの昇順に並び替えて$productsに代入
        $posts = $query->orderBy('category', 'asc')->paginate(10);

        //categoriesテーブルからgetList();関数でcategory_nameとidを取得する
        $category = new Category;
        $categories = $category->getList();

        return view('user.searchcategory', [
            'posts' => $posts,
            'categories' => $categories,
            'searchWord' => $searchWord,
            'categoryId' => $categoryId
        ]);
    }

    //「\\」「%」「_」などの記号を文字としてエスケープさせる
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}
