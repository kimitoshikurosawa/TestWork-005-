<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable= ['title','description'];
    protected $guarded;
    /**
     * The petitions that belong to the categories.
     */
    public function petitions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Petition::class,'petition_categories');
    }
}
