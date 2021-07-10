<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $countries_id
 * @property string $password
 * @property string $email
 * @property Carbon $date
 * @property string $avatar
 * @property string $status
 * @property string $role
 * @property string $remember_token
 * @property string $token
 * @property Carbon $updated_at
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	protected $guarded = array();

	protected $dates = [
		'date'
	];

	protected $hidden = [
		'password',
		'remember_token',
		'token'
	];

	protected $fillable = [
		'name',
		'countries_id',
		'password',
		'email',
		'date',
		'avatar',
		'status',
		'role',
		'remember_token',
		'token'
	];

}
