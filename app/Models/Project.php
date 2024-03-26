<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    protected $fillable = ['title', 'content', 'type_id'];
}
