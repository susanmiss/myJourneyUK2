<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $fillable = ['name', 'slug', 'featured_image'];

	public function blog() {
		return $this->belongsToMany(Blog::class);
	}
}
