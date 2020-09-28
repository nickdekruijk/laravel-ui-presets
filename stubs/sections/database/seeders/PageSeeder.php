<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function lorem($faker, $p = null)
        {
            $l = '';
            if (!$p) $p = mt_rand(3, 5);
            for ($i = 1; $i <= $p; $i++)
                $l .= '<p>' . $faker->paragraph(mt_rand(4, 10)) . '</p>';
            return $l;
        }

        $faker = Faker::create();

        Page::truncate();
        $home = Page::create(['title' => 'Home', 'slug' => '/', 'view' => 'sections']);
        Page::create(['body' => lorem($faker), 'parent' => $home->id, 'view' => 'sections.default', 'title' => 'Section A', 'menuitem' => false]);
        Page::create(['body' => lorem($faker), 'parent' => $home->id, 'view' => 'sections.default', 'title' => 'Section B', 'menuitem' => false]);
        Page::create(['body' => lorem($faker), 'parent' => $home->id, 'view' => 'sections.default', 'title' => 'Section C', 'menuitem' => false]);
        Page::create(['body' => lorem($faker), 'title' => 'About']);
        Page::create(['body' => lorem($faker), 'title' => 'Contact']);
    }
}
