<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

        $files_arr = scandir( dirname(__FILE__) ); //store filenames into $files_array
        foreach ($files_arr as $key => $file){
            if ($file !== 'DatabaseSeeder.php' && $file[0] !== "." ){
   
                $seeder = '\Database\Seeders\\'.explode('.', $file)[0];
          
                $this->call( $seeder );
            }
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
