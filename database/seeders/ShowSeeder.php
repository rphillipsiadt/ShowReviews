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
                ["title" => "The Good Place", "image" => "the_good_place.jpg", "year" => "2016", "description" => "The Good Place is a town where those who have been good throughout their lives go once they have passed away. Michael (Danson) is the architect who oversees the town--and this is the first one he has been in charge of creating. Eleanor (Bell) arrives at the Good Place and realizes they have her name right, but everything else is wrong. She isn't meant to be there at all. With the help of Chidi, her soul mate (Harper), Eleanor tries to right her wrongs, seeking to finally earn her spot in the Good Place.", "episode_count" => "50", "created_at" => $currentTimestamp, "updated_at" => $currentTimestamp],
                ["title" => "Breaking Bad", "image" => "breaking_bad.jpg", "year" => "2008", "description" => "Walter White is a chemistry genius but works as a chemistry teacher at a high school in Albuquerque, New Mexico. His life drastically changes when he's diagnosed with stage III terminal lung cancer and given a prognosis of two years to live. To ensure that his pregnant wife and disabled teenage son have a financial future, he uses his chemistry background to create and sell the world's finest crystal methamphetamine. To sell his signature blue meth, he teams up with Jesse Pinkman, a former student of his. The meth makes them very rich very quickly, but it attracts the attention of his DEA brother-in-law, Hank. As Walter and Jesse's status in the drug world escalates, Walter becomes a dangerous criminal, and Jesse becomes a hot-headed salesman. Hank is always hot on his tail, forcing Walter to devise new ways to cover his tracks.", "episode_count" => "62", "created_at" => $currentTimestamp, "updated_at" => $currentTimestamp],
                ["title" => "Vinland Saga", "image" => "vinland_saga.jpg", "year" => "2019", "description" => "A young man named Thorfinn finds himself in a quest for revenge against the man responsible for a traumatic tragedy in his early life. Firstly indulged in the aparent greatness of war and honor, Thorfinn quickly changes as he endures having to survive alone and then alongside the man he vows to kill, developing conflicting emotions towards the causality of his past and present life.", "episode_count" => "48", "created_at" => $currentTimestamp, "updated_at" => $currentTimestamp],
                ["title" => "Fruits Basket", "image" => "fruits_basket.jpg", "year" => "2019", "description" => "After a family tragedy turns her life upside down, 16 year old high schooler Tohru Honda takes matters into her own hands and moves out...into a tent. Unfortunately for her, she pitches her new home on private land belonging to the mysterious Soma clan, and it isn't long before the owners discover her secret. But, as Tohru quickly finds out when the family offers to take her in, the Somas have a secret of their own--when hugged by the opposite sex, they turn into the animals of the Chinese Zodiac.", "episode_count" => "63", "created_at" => $currentTimestamp, "updated_at" => $currentTimestamp],
                ["title" => "The Simpsons", "image" => "the_simpsons.jpg", "year" => "1989", "description" => "This is an animated sitcom about the antics of a dysfunctional family. Homer is the oafish unhealthy beer loving father, Marge is the hardworking homemaker wife, Bart is the perpetual ten-year-old underachiever (and proud of it), Lisa is the unappreciated eight-year-old genius, and Maggie is the cute, pacifier loving silent infant.", "episode_count" => "772", "created_at" => $currentTimestamp, "updated_at" => $currentTimestamp]
            ]);
    }
}
