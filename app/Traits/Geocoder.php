<?php


namespace App\Traits;


use App\Models\Lead;

trait Geocoder
{
    public function setCoordinates(Lead $lead){
        $results = app("geocoder")
            ->geocode("$lead->address $lead->city $lead->postcode $lead->country")
            ->get();
        if($results->isNotEmpty()){
            $coordinates = $results[0]->getCoordinates();
            $lead->lat = $coordinates->getLatitude();
            $lead->lng = $coordinates->getLongitude();
        }
    }

}
