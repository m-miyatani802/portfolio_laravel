<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
    const UPDATED_AT = null;

    /**
     * リレーション
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * リレーション
     */
    public function favorites()
    {
        return $this->hasMany(\App\Models\FavoritesWord::class);
    }

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', 'reading', 'phrases', 'meaning', 'created_at',
    ];
}
