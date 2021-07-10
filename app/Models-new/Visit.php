<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Visit
 * 
 * @property int $id
 * @property int $campaigns_id
 * @property int $user_id
 * @property string $ip
 * @property Carbon $date
 *
 * @package App\Models
 */
class Visit extends Model
{
	protected $table = 'visits';
	public $timestamps = false;

	protected $casts = [
		'campaigns_id' => 'int',
		'user_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'campaigns_id',
		'user_id',
		'ip',
		'date'
	];
}
