<?php
namespace App\Models;

use App\Traits\ConvertTimeZone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, ConvertTimeZone;
    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'article_id', 'tag_id')->withTimestamps();
    }

    // public function setFeatureImageAttribute($value)
    // {
    //     $this->uploadFileToDisk($value, 'feature_image', 'public', "files/articles");
    // }

    //តើអ្នកគួរប្រើមួយណារវាង match និង​ if
    public function getFeatureImageAttribute()
    {
        return match (substr($this->attributes['feature_image'], 0, 4)) {
            'http' => $this->attributes['feature_image'],
            'file' => Storage::url($this->attributes['feature_image']),
            default => 'https://fakeimg.pl/510x265/'
        };

        //        BEGOINGTO

        if (substr($this->attributes['feature_image'], 0, 4) == 'http') {
            return $this->attributes['feature_image'];
        }
        if (substr($this->attributes['feature_image'], 0, 4) == 'file') {
            return Storage::url($this->attributes['feature_image']);
        }
        return 'https://fakeimg.pl/510x265/';
    }
}
