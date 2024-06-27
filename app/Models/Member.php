<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'join_date',
        'full_name',
        'gender',
        'address',
        'email',
        'phone_number',
        'profile_picture',
    ];

    /**
     * Get the category that owns the member
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
