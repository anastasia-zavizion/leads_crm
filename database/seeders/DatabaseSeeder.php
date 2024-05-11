<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lead;
use App\Models\LeadStatus;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();
        User::factory()->admin()->create();



        foreach (Lead::$status as $status){
            LeadStatus::create(['name'=>$status['name'], 'color'=>$status['color']]);
        }
        $statuses = LeadStatus::all();
        Lead::factory(50)->create([
            'lead_status_id'=>$statuses->random()->id
        ]);
    }
}
