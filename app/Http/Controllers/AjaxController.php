<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminSettings;
use App\Models\Campaigns;
use App\Models\Categories;
use App\Models\Donations;
use App\Models\Updates;

class AjaxController extends Controller
{
	
	public function __construct( Request $request) {
		$this->request = $request;
	}
	
    /**
     *  
     * @return \Illuminate\Http\Response
     */
     
      public function campaigns()
    {
       
	   $settings 	= AdminSettings::first();
       $data     	= Campaigns::orderBy('id','DESC')->paginate($settings->result_request);

		return view('ajax.campaigns',['data' => $data, 'settings' => $settings])->render();
    }

    public function campaignCategory($slug){
    	$campaignCategory = null;

    	 if(!empty($slug)){
            $campaignCategory = Categories::BySlug($slug)->first();

            !empty($userId)
                ? $campaigns = Campaigns::ByCampaignCategoryId($campaignCategory->id)->ByUserId($userId)->get()
                : $campaigns = Campaigns::ByCampaignCategoryId($campaignCategory->id)->get();
        } else if(!empty($userId)) {
            $campaigns = Campaigns::ByUserId($userId)->get();
        } else {
            $campaigns = Campaigns::all();
        }

        return view('ajax.campaigns-categories', ['campaigns' => $campaigns]);
    }//<--- End Method

    public function donations()
    {
       
	   	$settings = AdminSettings::first();
		$page    = $this->request->input('page');
		$id      = $this->request->input('id');
		$data    = Donations::where('campaigns_id',$id)->orderBy('id','desc')->paginate(2);

 		return view('ajax.donations',['data' => $data, 'settings' => $settings])->render();

    }//<--- End Method
    
    public function updatesCampaign()
    {
       
	    $settings = AdminSettings::first();
		$page     = $this->request->input('page');
		$id       = $this->request->input('id');
		$data     = Updates::where('campaigns_id',$id)->orderBy('id','desc')->paginate(1);

 		return view('ajax.updates-campaign',['data' => $data, 'settings' => $settings])->render();

    }//<--- End Method
    
	
}
