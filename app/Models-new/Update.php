<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Update
 * 
 * @property int $id
 * @property string $image
 * @property string $description
 * @property int $campaigns_id
 * @property Carbon $date
 * @property string $token_id
 *
 * @package App\Models
 */
class Update extends Model
{
	protected $table = 'updates';
	public $timestamps = false;

	protected $casts = [
		'campaigns_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'image',
		'description',
		'campaigns_id',
		'date',
		'token_id'
	];
}
