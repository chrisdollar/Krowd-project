<?php

namespace App\Observers;

use App\Model\Categories;
use App\Models\Campaigns;

class CampaignCountObserver
{

    public function created(Campaigns $Campaign)
    {
        $Campaign->categories()->increment('campaigns_count');
    }

    public function deleted(Campaigns $Campaign)
    {
        $Campaign->categories()->decrement('campaigns_count');
    }

    public function updating(Campaigns $Campaign)
    {
        $previous_category_id = $Campaign->getOriginal('categories_id');
        if ($previous_category_id != $Campaign->category_id) {
            Categories::where('id', $previous_category_id)->decrement('campaigns_count');
            Categories::where('id', $Campaign->category_id)->increment('campaigns_count');
        }
    }

}