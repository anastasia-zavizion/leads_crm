<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lead;
use App\Models\LeadStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (Lead::$status as $status){
            LeadStatus::create(['name'=>$status]);
        }
        $statuses = LeadStatus::all();
        Lead::factory(20)->create([
            'lead_status_id'=>$statuses->random()->id
        ]);
    }
}
