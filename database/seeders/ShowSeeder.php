<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Show;
use Carbon\Carbon;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $currentTimestamp = Carbon::now();
            Show::insert([
                ["title" => "The Good Place", "image" => "the_good_place.jpg", "year" => "2016", "description" => "Four people and their otherworldly frienemy struggle in the afterlife to define what it means to be good.", "episode_count" => "50", "created_at" => $currentTimestamp, "updated_at" => $currentTimestamp],
                ["title" => "Breaking Bad", "image" => "breaking_bad.jpg", "year" => "2008", "description" => "A chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine with a former student to secure his family's future.", "episode_count" => "62", "created_at" => $currentTimestamp, "updated_at" => $currentTimestamp],
                ["title" => "Vinland Saga", "image" => "vinland_saga.jpg", "year" => "2019", "description" => "Following a tragedy, Thorfinn embarks on a journey with the man responsible for it to take his life in a duel as a true and honorable warrior to pay homage.", "episode_count" => "48", "created_at" => $currentTimestamp, "updated_at" => $currentTimestamp],
                ["title" => "Fruits Basket", "image" => "fruits_basket.jpg", "year" => "2019", "description" => "After Tohru is taken in by the Soma family, she learns that twelve family members transform involuntarily into animals of the Chinese zodiac and helps them deal with the emotional pain caused by the transformations.", "episode_count" => "63", "created_at" => $currentTimestamp, "updated_at" => $currentTimestamp],
                ["title" => "The Simpsons", "image" => "the_simpsons.jpg", "year" => "1989", "description" => "The satiric half-hour adventures of a working-class family in the misfit city of Springfield.", "episode_count" => "772", "created_at" => $currentTimestamp, "updated_at" => $currentTimestamp],
                ["title" => "Squid Gane", "image" => "squid_game.jpg", "year" => "2021", "description" => "Hundreds of cash-strapped players accept a strange invitation to compete in children's games. Inside, a tempting prize awaits with deadly high stakes: a survival game that has a whopping 45.6 billion-won prize at stake.", "episode_count" => "11", "created_at" => $currentTimestamp, "updated_at" => $currentTimestamp]
            ]);
    }
}
