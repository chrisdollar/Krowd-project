<?php 
namespace App\Repositories;

use App\Models\Payment;
use App\Models\Campaigns;

class PaymentRepository extends BaseRepository
{

    public function __construct()
    {
        $this->model = new Payment();
    }

    /**
     * @param Campaign $campaign
     * @return Payment[]
     */
    public function findAllByCampaign(Campaigns $campaign){
        $paymentsFound = Payment::ByCampaignId($campaign->id)->get();

        return $paymentsFound;
    }
}