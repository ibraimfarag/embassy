<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PageContentSeeder::class);
        $this->call(PageSectionSeeder::class);
        $this->call(PageImageSlidesTableSeeder::class);
        $this->call(ConsularContentSeeder::class);
        $this->call(BilateralContentSeeder::class);
        $this->call(MediaContentSeeder::class);
        $this->call(ContactContentSeeder::class);
        $this->call(TimelineSeeder::class);
        $this->call(FAQSeeder::class);
        $this->call(ArticleTypeSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(BulletinSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(AnnouncementSeeder::class);
    }
}
