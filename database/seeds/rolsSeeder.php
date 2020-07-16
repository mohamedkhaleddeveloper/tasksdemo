<?php

use Illuminate\Database\Seeder;
use App\role;
class rolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        role::create([
            'name_ar'           => "إضافه",
            'name_en'           => "add",
            'category_ar'          => "المستخدمين",
            'category_en'             => "users",
        ]);
        role::create([
            'name_ar'           => "تعديل",
            'name_en'           => "edite",
            'category_ar'          => "المستخدمين",
            'category_en'             => "users",
        ]);
        role::create([
            'name_ar'           => "حذف",
            'name_en'           => "delet",
            'category_ar'          => "المستخدمين",
            'category_en'             => "users",
        ]);
        role::create([
            'name_ar'           => "مشاهده",
            'name_en'           => "view",
            'category_ar'          => "المستخدمين",
            'category_en'             => "users",
        ]);
        role::create([
            'name_ar'           => "صلاحيات",
            'name_en'           => "prev",
            'category_ar'          => "المستخدمين",
            'category_en'             => "users",
        ]);

        role::create([
            'name_ar'           => "إضافه",
            'name_en'           => "add",
            'category_ar'          => "التذاكر",
            'category_en'             => "tickets",
        ]);
        role::create([
            'name_ar'           => "تعديل",
            'name_en'           => "edite",
            'category_ar'          => "التذاكر",
            'category_en'             => "tickets",
        ]);
        role::create([
            'name_ar'           => "حذف",
            'name_en'           => "delet",
            'category_ar'          => "التذاكر",
            'category_en'             => "tickets",
        ]);
        role::create([
            'name_ar'           => "مشاهده",
            'name_en'           => "view",
            'category_ar'          => "التذاكر",
            'category_en'             => "tickets",
        ]);
    }
}
