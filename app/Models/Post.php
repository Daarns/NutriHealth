<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'parent_id']; // Tambahkan 'parent_id' ke array fillable

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    // Tambahkan relasi baru untuk mendapatkan reply dari sebuah post
    public function replies()
    {
        return $this->hasMany(Post::class, 'parent_id');
    }

    // Tambahkan relasi baru untuk mendapatkan post yang di-reply
    public function parent()
    {
        return $this->belongsTo(Post::class, 'parent_id');
    }
}
