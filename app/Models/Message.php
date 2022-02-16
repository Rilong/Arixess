<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subject', 'text', 'filename'];

    /**
     * Returns a last message within twenty-four hours
     *
     * @param $user_id
     * @return mixed
     */

    public static function getLastWithinDay($user_id)
    {
        return Message::where([
            ['user_id', $user_id],
            ['created_at', '>', Carbon::now()->subDay()],
        ])->first();
    }

    /**
     * Returns Massage data for sending email
     *
     * @return array
     */

    public function getDetails(): array
    {
        return [
            'id' => $this->id,
            'subject' => $this->subject,
            'text' => $this->text,
            'email' => $this->user->email,
            'name' => $this->user->name,
            'file_url' => $this->getFileUrl()
        ];
    }

    /**
     * Returns file url
     *
     * @return string|null
     */

    public function getFileUrl(): ?string
    {
        if ($this->filename) {
            return Storage::url('files/' . $this->filename);
        }
        return null;
    }

    /**
     * Toggles read field and saves it
     *
     * @return void
     */

    public function toggleRead() {
        if ($this->is_read) {
            $this->is_read = false;
        } else {
            $this->is_read = true;
        }
        $this->save();
    }

    /**
     * Relationship for User model
     *
     * @return BelongsTo
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
