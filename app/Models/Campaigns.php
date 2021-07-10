<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Campaigns extends Model {

	use SearchableTrait;

	protected $guarded = array();
	public $timestamps = false;

	/**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
        	'campaigns.id' => 3,
            'campaigns.title' => 10,
            'campaigns.goal' => 10,
        ]
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