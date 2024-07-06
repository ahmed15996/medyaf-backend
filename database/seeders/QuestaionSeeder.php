<?php

namespace Database\Seeders;

use App\Models\Question;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestaionSeeder extends Seeder
{

    public function run(): void
    {
        $fake = Factory::create();
            Question::insert([

              [

                'title_ar'   => 'لوريم ابيسوم يعرف مشغلو الرسم والطباعة؟' ,
                'title_en'   => 'Lorem Ipsum defines the graphic and print operators?' ,
                'desc_ar'    => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'    => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()

              ] ,

              [

                'title_ar'   => 'لوريم ابيسوم يعرف مشغلو الرسم والطباعة؟' ,
                'title_en'   => 'Lorem Ipsum defines the graphic and print operators?' ,
                'desc_ar'    => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'    => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()

              ] ,

              [

                'title_ar'   => 'لوريم ابيسوم يعرف مشغلو الرسم والطباعة؟' ,
                'title_en'   => 'Lorem Ipsum defines the graphic and print operators?' ,
                'desc_ar'    => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'    => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()

              ] ,

              [

                'title_ar'   => 'لوريم ابيسوم يعرف مشغلو الرسم والطباعة؟' ,
                'title_en'   => 'Lorem Ipsum defines the graphic and print operators?' ,
                'desc_ar'    => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'    => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()

              ] ,

              [

                'title_ar'   => 'لوريم ابيسوم يعرف مشغلو الرسم والطباعة؟' ,
                'title_en'   => 'Lorem Ipsum defines the graphic and print operators?' ,
                'desc_ar'    => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'    => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()

              ] ,

              [

                'title_ar'   => 'لوريم ابيسوم يعرف مشغلو الرسم والطباعة؟' ,
                'title_en'   => 'Lorem Ipsum defines the graphic and print operators?' ,
                'desc_ar'    => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'    => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()

              ] ,







            ]);
    }
}
