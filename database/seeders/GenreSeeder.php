<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Show;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::insert([
        ['name' => 'Comedy', 'description' => 'Comedy is a genre that consists of discourses or works intended to be humorous or amusing by inducing laughter.'],
        ['name' => 'Drama', 'description' => 'In film and television, drama is a category or genre of narrative fiction (or semi-fiction) intended to be more serious than humorous in tone.'],
        ['name' => 'Romance', 'description' => 'The romance genre is one that includes verse or prose works dedicated to idealism and often associated with love and daring deeds.'],
        ['name' => 'Action', 'description' => 'Action is a genre that predominantly features chase sequences, fights, shootouts, explosions, and stunt work.'],
        ['name' => 'Horror', 'description' => 'Horror is a genre of speculative fiction that is intended to disturb, frighten, or scare.'],
        ['name' => 'Mystery', 'description' => 'Mystery is a fiction genre where the nature of an event, usually a murder or other crime, remains mysterious until the end of the story.'],
        ['name' => 'Fantasy', 'description' => 'Fantasy is a genre of speculative fiction which involves themes of the supernatural, magic, and imaginary worlds and creatures.'],
        ['name' => 'Animation', 'description' => 'Animation is a filmmaking technique by which still images are manipulated to create moving images.'],
        ['name' => 'Sci-Fi', 'description' => 'Sci-Fi is a genre of speculative fiction, which typically deals with imaginative and futuristic concepts such as advanced science and technology, space exploration, time travel, parallel universes, and extraterrestrial life.'],
        ['name' => 'Thriller', 'description' => 'A thriller is a type of mystery with a few key differences. As its name suggests, thrillers tend to be action-packed, page-turners with moments full of tension, anxiety, and fear.'],
        ]);
    }
};