<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Message extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        "uuid",
        "user_uuid",
        "user_email",
        "user_name",
        "message",
        "received_at",
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    // MUTAtOR AND ACCESSOR

    public function setUuidAttribute()
    {
        $this->attributes["uuid"] = Str::uuid()->toString();
    }
}
