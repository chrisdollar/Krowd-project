<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Categories
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

    // public function campaigns() {
    //     return $this->hasMany('App\Models\Campaigns');
    // }

    /**
     * @param $query
     * @param $slug
     * @return mixed
     */
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
    
    public function scopeGetCategories()
    {
        return $query->select('*');
    }
	
}
