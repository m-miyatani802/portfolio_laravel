<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritesWord extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', 'word_id', 'created_at',
    ];


    /**
     * リレーション
     */
    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    /**
     * リレーション
     */
    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }
}
