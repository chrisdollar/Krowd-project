<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Donation
 * 
 * @property int $id
 * @property int $campaigns_id
 * @property string $fullname
 * @property string $email
 * @property string $country
 * @property string $postal_code
 * @property int $donation
 * @property string $payment_gateway
 * @property string $oauth_uid
 * @property string $comment
 * @property Carbon $date
 * @property string $anonymous
 *
 * @package App\Models
 */
class Donation extends Model
{
	protected $table = 'donations';
	public $timestamps = false;

	protected $casts = [
		'campaigns_id' => 'int',
		'donation' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'campaigns_id',
		'fullname',
		'email',
		'country',
		'postal_code',
		'donation',
		'payment_gateway',
		'oauth_uid',
		'comment',
		'date',
		'anonymous'
	];
}
