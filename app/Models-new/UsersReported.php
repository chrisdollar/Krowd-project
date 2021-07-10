<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersReported
 * 
 * @property int $id
 * @property string $reason
 * @property int $user_id
 * @property int $id_reported
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class UsersReported extends Model
{
	protected $table = 'users_reporteds';
	protected $guarded = array();
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'id_reported' => 'int'
	];

	protected $fillable = [
		'reason',
		'user_id',
		'id_reported'
	];
}
