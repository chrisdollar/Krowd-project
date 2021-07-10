<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $mode
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';
	protected $guarded = array();
	public $timestamps = false;

	protected $fillable = [
		'name',
		'slug',
		'mode'
	];

	public function campaigns() {
        return $this->hasMany('App\Models\Campaigns');
    }
}
