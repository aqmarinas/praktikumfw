<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['filename', 'imageable_id', 'imageable_type'];

    // Polymorphic relation to any model (e.g., Product)
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
