<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,10)->create();
    }
}
