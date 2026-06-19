<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'due_date',
        'slug',
        'completed_at',
        'priority_id',
        'created_at',
        'updated_at'
    ];
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
