<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Page
 * 
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $slug
 * @property string $show_navbar
 *
 * @package App\Models
 */
class Page extends Model
{
	protected $table = 'pages';
	public $timestamps = false;

	protected $fillable = [
		'title',
		'content',
		'slug',
		'show_navbar'
	];
}
