<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory; 
    use Sluggable;

    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    // N+1 Problem -> Eager Loading
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) {

        $query->when($filters['search'] ?? false, function($query, $search) {
           return $query->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function
            ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) => 
        $query->whereHas('author', fn($query) =>
        $query->where('username', $author)
        )
    );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function countComments()
    {
        return $this->hasMany(Comment::class);
    }

    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    // Sluggable
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
