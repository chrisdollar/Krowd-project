<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Campaign
 * 
 * @property int $id
 * @property string $small_image
 * @property string $large_image
 * @property string $title
 * @property string $description
 * @property int $categories_id
 * @property int $user_id
 * @property Carbon $date
 * @property string $status
 * @property string $token_id
 * @property int $goal
 * @property string $location
 * @property string $finalized
 *
 * @package App\Models
 */
class Campaign extends Model
{
	protected $table = 'campaigns';
	protected $guarded = array();
	public $timestamps = false;

	protected $casts = [
		'categories_id' => 'int',
		'user_id' => 'int',
		'goal' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'small_image',
		'large_image',
		'title',
		'description',
		'categories_id',
		'user_id',
		'date',
		'status',
		'token_id',
		'goal',
		'location',
		'finalized'
	];

	public function user() {
        return $this->belongsTo('App\Models\User')->first();
    }
	
	public function likes(){
		return $this->hasMany('App\Models\Like')->where('status', 1);
	}
	
	public function donations(){
		return $this->hasMany('App\Models\Donations');
	}
	
	public function updates() {
		return $this->hasMany('App\Models\Updates');
	}
	
	public function category() {
	 	 return $this->belongsTo('App\Models\Categories', 'categories_id'); 
	 }
}
