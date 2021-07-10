<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminSetting
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $welcome_text
 * @property string $welcome_subtitle
 * @property string $keywords
 * @property int $result_request
 * @property string $status_page
 * @property string $email_verification
 * @property string $email_no_reply
 * @property string $email_admin
 * @property string $captcha
 * @property int $file_size_allowed
 * @property string $google_analytics
 * @property string $paypal_account
 * @property string $twitter
 * @property string $facebook
 * @property string $googleplus
 * @property string $instagram
 * @property string $google_adsense
 * @property string $currency_symbol
 * @property string $currency_code
 * @property int $min_donation_amount
 * @property int $min_campaign_amount
 * @property string $payment_gateway
 * @property string $paypal_sandbox
 * @property string $min_width_height_image
 *
 * @package App\Models
 */
class AdminSetting extends Model
{
	protected $table = 'admin_settings';
	public $timestamps = false;

	protected $casts = [
		'result_request' => 'int',
		'file_size_allowed' => 'int',
		'min_donation_amount' => 'int',
		'min_campaign_amount' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'welcome_text',
		'welcome_subtitle',
		'keywords',
		'result_request',
		'status_page',
		'email_verification',
		'email_no_reply',
		'email_admin',
		'captcha',
		'file_size_allowed',
		'google_analytics',
		'paypal_account',
		'twitter',
		'facebook',
		'googleplus',
		'instagram',
		'google_adsense',
		'currency_symbol',
		'currency_code',
		'min_donation_amount',
		'min_campaign_amount',
		'payment_gateway',
		'paypal_sandbox',
		'min_width_height_image'
	];
}
