<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            'description'=>"Mhenterprise is one of the leading Japanese vehicles exporter since last 20 Years globally, Specialized in Africa Market. We deal with all kinds of Used & Brand new transport vehicles which you have been dream to buy.

With 20 Years of experience in exporting worldwide, We have built long term relationship with local dealers and all auction houses across Japan. We always aim to deliver the BEST and qualitative vehicles at competitive price.

We are always there to help you to search the Best vehicle of your choice, strive to provide better service to satisfy our customer all the time.
We export all Japanese brands like Toyota, Honda, Nissan, Mitsubishi, Mazda, Subaru, Isuzu, Suzuki and Daihatsu with variety of models, color within your budget. We are having the Best shipping help for your vehicle to ship it immediately anywhere globally. We always have good stock of used vehicles from Passenger cars to sports/commercial vehicles.

We also allow our clients to register to participate in auctions, where you can find your favorite vehicles daily and can place bid for your selected vehicles.
It will be highly recommended to let us know your requirement by email to get personalized service so we can search the Best option for you from our suppliers, Auction, fixed price auction, local market or from end users.
",
            'short_des'=>"Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.",
            'photo'=>"image.jpg",
            'logo'=>'logo.jpg',
            'address'=>"NO. 342 - London Oxford Street, 012 United Kingdom",
            'email'=>"mh@gmail.com",
            'phone'=>"+060 (800) 801-582",
        );
        DB::table('settings')->insert($data);
    }
}