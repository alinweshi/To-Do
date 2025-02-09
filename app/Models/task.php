<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory,   SoftDeletes;

    protected $fillable = ['title', 'description', 'user_id', 'category_id', 'status'];
    protected $casts = ['completed' => 'boolean'];
    protected $attributes = [
        'status' => 'pending', // or any default status like 'new', 'open', etc.
    ];

    public function scopeCompleted($task)
    {
        return $task->where('status', 'completed');
    }
    public function scopePending($task)
    {
        return $task->where('status', 'pending');
    }
    public function scopeFailed($task)
    {
        return $task->where('status', 'failed');
    }
    public function scopeActive($task)
    {
        return $task->where('status', 'active');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
