<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Information extends Model
{
    use HasFactory;

    //Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'group_id',
        'title',
        'category',
        'date',
        'entry_fee',
        'content',
        'image_url',
        'image_name'
    ];

    public function getList()
    {
        // informationテーブルからデータを取得
        $posts = DB::table('information')->get();

        return $posts;
    }

    //IDから1件のデータを取得する
    public function selectDataFindById($id)
    {
        // 「SELECT id, name, email WHERE id = ?」を発行する
        $query = $this->select([
            'group_id',
            'title',
            'category',
            'date',
            'entry_fee',
            'content',
            'image_url',
        ])->where([
            'id' => $id
        ]);
        // first()は1件のみ取得する関数
        return $query->first();
    }

    //IDで指定したユーザを更新する
    public function updateDataFindById($post)
    {
        return $this->where([
            'id' => $post['id']
        ])->update([
            'group_id' => $post['group_id'],
            'title' => $post['title'],
            'category' => $post['category'],
            'date' => $post['date'],
            'entry_fee' => $post['entry_fee'],
            'content' => $post['content'],
            'image_url' => $post['image_url'],
        ]);
    }

    //「投稿(posts)はカテゴリ(category)に属する」というリレーション関係を定義する
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
