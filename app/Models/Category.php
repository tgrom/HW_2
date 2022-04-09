<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Mixed_;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";

    protected $fillable = [
       'title', 'description'


    ];

    protected $casts = [
        'is_active'=>'boolean'
    ];

    public function scopeActive($query) {

        return $query->where('is_active', true);
    }
    //Связь
    public function news():hasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }

    //protected $guarded = ['id']; это наименее безопасный способ добавления
    // если нудно добавить много полей


}
