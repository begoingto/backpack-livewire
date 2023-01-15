<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Import extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'model',
        'file_path',
        'file_name',
        'total_rows',
        'processed_rows',
        'completed_at',
    ];

    public $casts = [
        'completed_at' => 'datetime'
    ];

    public function scopeNotCompleted($query)
    {
        return $query->whereNull('completed_at');
    }

    public function percentageComplete(): int
    {
        return floor($this->processed_rows / $this->total_rows) * 100;
    }
}
