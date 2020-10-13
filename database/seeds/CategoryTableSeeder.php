<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $technical =new Category();
        $technical->name = "Technical";
        $technical->slug = "technical";
        $technical->save();


        $aptitude =new Category();
        $aptitude->name = "Aptitude";
        $aptitude->slug = "aptitude";
        $aptitude->save();

        $logical =new Category();
        $logical->name = "Logical";
        $logical->slug = "logical";
        $logical->save();
    }
}
