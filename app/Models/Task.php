<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'title',
        'description',
        'status',
    ];

    public function scopeFilter(Builder $query, array $filters): void
    {
        if (isset($filters['search']) && $filters['search'] !== '') {
            $query->where(function($query) use ($filters) {
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                      ->orWhere('description', 'like', '%' . $filters['search'] . '%');
            });
        }
    }
}
