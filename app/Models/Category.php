<?php
namespace App\Models;

use App\Traits\ConvertTimeZone;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory,CrudTrait,ConvertTimeZone;
    protected $guarded = [];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'category_id');
    }

    public function scopeDateFilter($query, $date)
    {
        if (is_array($date)) {
            return $query->whereBetween('created_at', $date);
        }
        return $query->whereDate('created_at', $date);
    }
}
