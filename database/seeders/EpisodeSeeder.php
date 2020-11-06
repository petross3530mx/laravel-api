<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Episode;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\Episode::factory(1)->create();
       Episode::factory()->count(30)->create()->each(function($episode){
            $episode->characters()->attach(\App\Models\Character::factory()->count(5)->create()->each(function($character)use($episode){
                $character->quotes()->saveMany(\App\Models\Quote::factory()->count(3)->create()->each(function($quote)use($episode){
                    $quote->episode_id = $episode->id;
                    $quote->save();
                }));
            })); 
        });
    }
}
