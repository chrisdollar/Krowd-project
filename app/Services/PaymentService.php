<?php 

namespace App\Services;

use Auth;
use App\Models\Payment;
use App\Models\Campaigns;
use App\Repositories\PaymentRepository;

class PaymentService
{
    private $paymentRepository;

    public function __construct(){
        $this->paymentRepository = new PaymentRepository();
    }

    /**
     * Creates a new payment in pending status.
     *
     * @param array $data
     * @return int
     */
    public function createPayment($data = []){
        $paymentId = $this->paymentRepository->validateAndCreate($data);

        return $paymentId;
    }

    /**
     * @param Campaigns $Campaigns
     * @return int
     */
    public function findTotalAmountFunded(Campaigns $Campaigns){
        $foundPayments = $this->paymentRepository->findAllByCampaigns($Campaigns);

        $totalFunded = 0;
        foreach($foundPayments as $payment){
            $totalFunded += $payment->amount;
        }

        return $totalFunded;
    }

    /**
     * @param int $amountNeeded
     * @param int $amountFunded
     * @return int
     */
    public function percentFunded($amountNeeded, $amountFunded){

        $percentFunded = 0;
        if($amountNeeded !== 0 && $amountFunded !== 0){
            $percentFunded = ($amountFunded / $amountNeeded) * 100;
        }

        return (int) $percentFunded;
    }
}