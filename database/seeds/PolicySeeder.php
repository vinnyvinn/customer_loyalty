<?php

use Illuminate\Database\Seeder;
use App\Policy;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Policy::insert([
        [
          'title' => 'AMOUNT SPENT TO EARN POINTS GIVEN',
          'description' => 'The number of points earned every time the amount given is spent.',
          'amount' => 50,
          'points' => 1,
        ],
        [
          'title' => 'VALUE OF POINTS WHEN REDEEMING',
          'description' => 'This is the value of the given loyalty points when the customer redeems.',
          'amount' => 50,
          'points' => 1,
        ],
        [
          'title' => 'POINTS AWARDED WHEN ENROLLING',
          'description' => 'The points earned when a customer ins enrolled to the loyalty point program	 Change.',
          'amount' => 0,
          'points' => 5,
        ],
      ]);
    }
}
