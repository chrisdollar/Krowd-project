<?php 

namespace App\Models;

use App\Facades\Markdown;
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

    /**
     * Usage example Campaign::ByUserId($userId)->get();
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeByUserId($query, $id)
    {
        return $query->where('user_id', $id);
    }

    /**
     * Usage example Campaign::ByCampaignCategoryId($categoryId)->get();
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeByCampaignCategoryId($query, $id)
    {
        return $query->where('campaign_category_id', $id);
    }
	
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
	
	public function categories() {
	 	 return $this->belongsTo('App\Models\Categories', 'categories_id'); 
	}

 }