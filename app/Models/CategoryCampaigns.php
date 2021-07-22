<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CategoryCampains
{
    protected $guarded = array();
    public $timestamps = false;
    
	

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'mode',
    ];

    public function campaigns() {
        return $this->hasMany('App\Models\Campaigns');
    }


	
}
