<?php
namespace App\Models;

use App\Traits\ConvertTimeZone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory,ConvertTimeZone;
    protected $guarded = [];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'post_tag', 'tag_id', 'article_id');
    }
}
