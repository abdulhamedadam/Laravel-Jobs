<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use App\Models\User;
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
       ///  \App\Models\User::factory(5)->create();

       $user=User::factory()->create([
        'name'=>'abdelhamed',
        'email'=>'abdelhamedzaghloul@gmail.com'
       ]);
         Listing::factory(10)->create([
            'user_id'=>$user->id
         ]);
        //  Listing::create([
        //     'title'=>'Laravel Senior Developer',
        //     'tags'=>'Laravel ,javescript',
        //     'company'=>'ACme Crope',
        //     'location'=>'Boston,MA',
        //     'email'=>'eamil1@email.com',
        //     'website'=>'https://www.ACmeCrope.com',
        //     'description'=>'is simply dummy text of the printing and 
        //     typesetting industry. Lorem Ipsum has been the industrys 
        //     standard dummy text ever since the 1500s, when an 
        //     unknown printer took a galley of type and scrambled it to make a type',
        
        // ]);

        // Listing::create([
        //     'title'=>'Full-Stack Engineer',
        //     'tags'=>'Laravel ,backend ,api',
        //     'company'=>'Stark Industries',
        //     'location'=>'New York,NY',
        //     'email'=>'eamil2@email.com',
        //     'website'=>'https://www.starkindustries.com',
        //     'description'=>'is simply dummy text of the printing and 
        //     typesetting industry. Lorem Ipsum has been the industrys 
        //     standard dummy text ever since the 1500s, when an 
        //     unknown printer took a galley of type and scrambled it to make a type',
        
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
