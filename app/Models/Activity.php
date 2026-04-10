<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_id',
        'user_id',
        'title',
        'description',
        'is_completed',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_completed' => 'boolean',
    ];

    /**
     * Get the project that owns the activity.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user who created the activity.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
