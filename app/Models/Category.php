<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    public function getRandomColor()
    {
        $colors = [
            '#F44336', // Red
            '#9C27B0', // Purple
            '#2196F3', // Blue
            '#4CAF50', // Green
            '#FF9800', // Orange
            '#795548', // Brown
            '#607D8B', // Blue-grey
            '#3F51B5', // Indigo
            '#00BCD4', // Cyan
        ];
        return $colors[array_rand($colors)];
    }
}
