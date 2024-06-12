<?php

// database/seeders/PostSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() 
    {
        $posts = [
            [
                'title' => "5 Must-Visit Parks in Sint-Pieters-Leeuw",
                'content' => "Discover the natural beauty of Sint-Pieters-Leeuw with our guide to the top parks in the area. From scenic trails to serene picnic spots, these green spaces offer something for everyone."
            ],
            [
                'title' => "Explore Local Cuisine: Best Restaurants in Town",
                'content' => "Indulge in the culinary delights of Sint-Pieters-Leeuw! Our list of the best restaurants showcases the diverse flavors and cuisines that our city has to offer. From traditional Belgian fare to international fusion cuisine, there's something to satisfy every palate."
            ],
            [
                'title' => "Upcoming Events: What's Happening in Sint-Pieters-Leeuw",
                'content' => "Stay up-to-date with the latest events in Sint-Pieters-Leeuw! From music festivals to art exhibitions, there's always something exciting happening in our vibrant city. Check out our event guide to plan your next outing."
            ],
            [
                'title' => "Historical Landmarks: Exploring Sint-Pieters-Leeuw's Rich Heritage",
                'content' => "Journey through time and explore the rich history of Sint-Pieters-Leeuw! Our guide to the city's historical landmarks takes you on a fascinating tour of iconic sites, from medieval castles to ancient churches. Discover the stories behind these architectural treasures."
            ]
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
