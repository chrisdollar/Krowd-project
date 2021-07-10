<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Categories
{
    protected $guarded = array();
    public $timestamps = false;
    
	public function campaigns() {
        return $this->hasMany('App\Models\Campaigns');
    }
	
}
