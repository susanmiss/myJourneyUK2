<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = ['title', 'body', 'featured_image', 'slug', 'meta_title', 'meta_description', 'status', 'image0', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6', 'image7', 'image8', 'image9', 'image10', 'image11', 'image12', 'image13', 'image14', 'image15', 'image16', 'image17', 'image18', 'image19', 'image20', 'video0', 'address0', 'city0', 'region0'];
	// protected $casts = [
	// 	'images' => 'array'
	// ];

	public function category() {
		return $this->belongsToMany(Category::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}
}
