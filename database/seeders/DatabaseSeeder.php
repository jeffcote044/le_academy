<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Price;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Seeder;

use function PHPUnit\Framework\callback;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Storage::deleteDirectory('courses');
        //Storage::makeDirectory('courses');

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DiscountSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
        
    }
}
