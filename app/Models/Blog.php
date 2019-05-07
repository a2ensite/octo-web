<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Blog
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $description
 * @property string $sub_domain
 * @property string $guard_name
 * @property string $theme
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\User $user
 * @property \App\Models\User $owner
 * @property \Illuminate\Database\Eloquent\Collection $posts
 *
 * @package App\Models
 */
class Blog extends Eloquent
{
    /**
     * @var string
     */
    protected $table = 'blog';

    /**
     * @var array
     */
    protected $casts = [
		'user_id' => 'int'
	];

    /**
     * @var array
     */
    protected $fillable = [
		'user_id',
		'name',
        'theme',
		'description',
		'sub_domain',
		'guard_name'
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(\App\Models\User::class , 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}