<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Playground extends Model
{
    use HasFactory;

    protected $table = 'sandbox';
    protected $fillable = [
        'name',
        'address',
        'email'
    ];

    public function relation(): BelongsToMany
    {
        return $this->belongsToMany(RelationModel::class, 'relation', 'sandbox_id', 'other_table_id')->withTimestamps();
    }
}
