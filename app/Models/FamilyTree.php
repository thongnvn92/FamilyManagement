<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyTree extends Model
{
    use HasFactory;

    protected $table = 'family_trees';

    protected $fillable = [
        'user_id', 'name', 'title', 'gender', 'image_url',
        'father_id', 'mother_id', 'partner_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function father() {
        return $this->belongsTo(FamilyTree::class, 'father_id');
    }

    public function mother() {
        return $this->belongsTo(FamilyTree::class, 'mother_id');
    }

    public function partner() {
        return $this->belongsTo(FamilyTree::class, 'partner_id');
    }
}
