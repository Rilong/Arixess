<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subject', 'text', 'filename'];

    public static function getLastBetweenDay($user_id) {
        return Message::where([
            ['user_id', $user_id],
            ['created_at', '>',Carbon::now()->subDay()],
        ])->first();
    }

    public function message(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
