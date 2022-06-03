<?php

namespace App\Models;


use Givebutter\LaravelKeyable\Keyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Petition extends Model
{
    use HasFactory;
    protected $fillable= ['title','description','author','signees'];
    protected $guarded;

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class,'petition_categories');
    }
}
