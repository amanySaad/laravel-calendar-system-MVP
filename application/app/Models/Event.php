<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the user associated with the Event.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
