<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Destination;

class Comment extends Model
{
    protected $fillable = ['comment', 'destination_id'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
