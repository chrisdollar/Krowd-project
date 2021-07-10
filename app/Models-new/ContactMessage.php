<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactMessage
 * 
 * @property int $id
 * @property string $full_name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property int $user_id
 * @property string $ip
 * @property Carbon $date
 * @property string $status
 *
 * @package App\Models
 */
class ContactMessage extends Model
{
	protected $table = 'contact_messages';
	protected $guarded = array();
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'full_name',
		'email',
		'subject',
		'message',
		'user_id',
		'ip',
		'date',
		'status'
	];
}
