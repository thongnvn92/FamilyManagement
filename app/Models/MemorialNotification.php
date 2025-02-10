<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemorialNotification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'family_member_id', 'memorial_date', 'email_sent'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function familyMember(): BelongsTo {
        return $this->belongsTo(FamilyTree::class, 'family_member_id');
    }
}
