<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


     // 名前で検索するスコープ
    public function scopeSearch($query, $search)
    {
        if (!empty($search)){
            $query->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }
    }

     // 性別でフィルタリングするスコープ
    public function scopeGender($query, $gender)
    {
        if (!empty($gender) && $gender !== 'all'){
            $query->where('gender', $gender);
        }
    }

     // 日付でフィルタリングするスコープ
    public function scopeDate($query, $date)
    {
        if (!empty($date)){
            $query->whereDate('created_at', $date);
        }
    }

     // カテゴリーでフィルタリングするスコープ
    public function scopeCategory($query, $category_id)
    {
        if (!empty($category_id)){
            $query->where('category_id', $category_id);
        }
    }
}
