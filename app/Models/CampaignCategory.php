<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CampaignCategory extends Model 
{
    protected $guarded = array();
    public $timestamps = false;
    
	

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'campaign_categories';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'mode',
    ];

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
