<?php

use Illuminate\Database\Seeder;

class Account_classesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account_classes = [
            ["number" => 1 , "class" => "売上高"],
            ["number" => 2 , "class" => "売上原価"],
            ["number" => 3 , "class" => "販売費及び一般管理費"],
            ["number" => 4 , "class" => "営業外収益"],
            ["number" => 5 , "class" => "営業外費用"],
            ["number" => 6 , "class" => "特別利益"],
            ["number" => 7 , "class" => "特別損失"],
        ];
        
        DB::table("account_classes")->insert($account_classes);
    }
}
