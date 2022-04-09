<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $fillable = [
        'category_id', 'title', 'status',
        'author', 'img', 'description'
    ];

    public function category():BelongsTo {
        return $this->belongsTo(Category::class);

    }

//    public function getNews(): array
//    {
//        return DB::select("select id, title, img, description from {$this->table}");
//    }
//
//    public function getNewsById(int $id): mixed
//    {
//        return DB::selectOne("select id, title, img, description from {$this->table}
//            where id = :id", ['id' => $id]);
//    }
}
