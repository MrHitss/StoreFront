<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

class Pages extends Model
{
    protected $fillable = ['title', 'content', 'slug'];

    public static function generateSlug($title)
    {
        $slug = Str::slug($title);
        $slugCount = self::where('slug', $slug)->count();
        
        if ($slugCount > 0) {
            $slug = $slug . '-' . ($slugCount + 1);
        }

        return $slug;
    }

}
