<?php

namespace Database\Seeders;

use App\Models\Tip;
use Illuminate\Database\Seeder;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tips = [
            [
                'description' => 'Successful farming operations are based on diligent planning. A plan will help you decide what type of farming you want to engage in, where and how you will do it. My first vegetable farming business didnt work out well due to simply not having a well-thought-out plan on what goes into proper land preparation. You need to explore different options and pick one that suits you best and go ahead and seek some advice from already established farmers.', 
            ],
            [
                'description' => 'You can’t start farming without the right farming equipment. Whether you’re venturing into small-scale farming, large-scale farming, livestock farming or poultry farming, you need the right investments before starting out. This is where most new farmers fail. According to few construction companies, think through your major purchases, determine how best to finance them and how that investment will benefit you and your farm. ', 
            ],
            [
                'description' => 'Everyone agrees that farming is hard work. Do yourself a favor and grow something that you love. Like, do you love passion fruits? Then grow passion fruits. So long as you’re matching your land or farm to its suited use, you’ll be on the right path to gaining some meaningful steps forward. It may not seem true, but many of us are driven by finances and so-called traditions rather than our passion when it comes to making farming decisions. ', 
            ],
            [
                'description' => 'It’s very important that you track your income and expenditure. Keep all your receipts, invoices and all other relevant documents related to income and expenditure on your new farm. It makes sense to keep records so you can easily track transactions and your financial progress. This way, you can know which months have the highest income and demand for money. ', 
            ],
            [
                'description' => 'If you don’t like reading and learning, it’s time things changed. Farming is a progressive venture where learning new skills, farming techniques and innovations as well as sharing knowledge is part of day-to-day life. Don’t just pick up a new skill and apply it.', 
            ],
         
        ];

        foreach ($tips as $tip) {
            $tip = Tip::create([
                   'description' => $tip['description'],
                 ]);
        }
    }
}
