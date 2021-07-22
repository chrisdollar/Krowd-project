<?php 

namespace App\Models;

use App\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model {

	protected $guarded = array();
	public $timestamps = false;


	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'date', 'status', 'small_image', 'large_image', 'user_id', 'category_id', 'token_id', 'goal', 'location', 'finalized',
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
        return $query->where('category_id', $id);
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
	
	public function category() {
	 	 return $this->belongsTo('App\Models\CampaignCategory', 'category_id'); 
	}

 }