<?php

namespace App\Observers;

use App\Models\Lead;
use App\Traits\Geocoder;

class LeadObserve
{
    use Geocoder;

    /**
     * Handle the Lead "created" event.
     */

    public function creating(Lead $lead): void
    {
        $this->setCoordinates($lead);

    }


    public function created(Lead $lead): void
    {

    }

    /**
     * Handle the Lead "updating" event.
     */
    public function updating(Lead $lead): void
    {
        $this->setCoordinates($lead);

    }

    /**
     * Handle the Lead "updated" event.
     */
    public function updated(Lead $lead): void
    {

    }

    /**
     * Handle the Lead "deleted" event.
     */
    public function deleted(Lead $lead): void
    {
        //
    }

    /**
     * Handle the Lead "restored" event.
     */
    public function restored(Lead $lead): void
    {
        //
    }

    /**
     * Handle the Lead "force deleted" event.
     */
    public function forceDeleted(Lead $lead): void
    {
        //
    }
}
