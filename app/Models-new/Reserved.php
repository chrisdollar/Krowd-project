<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reserved
 * 
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class Reserved extends Model
{
	protected $table = 'reserved';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
