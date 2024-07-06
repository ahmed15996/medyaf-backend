<?php

namespace Database\Seeders;

use App\Models\Boarding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardingSeeder extends Seeder
{

    public function run(): void
    {
        Boarding::insert([

            [
               'title_ar'   => 'إدارة قائمة المدعوين بكفاءة' ,
               'title_en'   => 'Manage your guest list efficiently' ,
               'desc_ar'    => 'قم بتنظيم ومتابعة قائمة المدعوين وتأكيد حضورهم بسهولة من خلال تطبيقنا.' ,
               'desc_en'    => 'Organize and follow your guest list and confirm their attendance easily through our application.' ,
               'img'        => 'boarding/1.png' ,
               'created_at' => now()

            ],

            [
                'title_ar'   => 'إرسال دعوات بسرعة وسهولة' ,
                'title_en'   => 'Send invitations quickly and easily' ,
                'desc_ar'    => 'أنشئ وأرسل دعوات مخصصة بضغطة زر واحدة لأصدقائك وعائلتك في أي مناسبة' ,
                'desc_en'    => 'Create and send personalized invitations with the push of a button to your friends and family for any occasion' ,
                'img'        => 'boarding/2.png' ,
                'created_at' => now()

            ],



            [
                'title_ar'   => 'مسح باركود سهل عند الوصول' ,
                'title_en'   => 'Easy barcode scanning upon arrival' ,
                'desc_ar'    => 'استقبل ضيوفك بسهولة من خلال مسح الباركود على دعواتهم فور وصولهم للحفل' ,
                'desc_en'    => 'Easily greet your guests by scanning the barcode on their invitations upon their arrival to the party' ,
                'img'        => 'boarding/3.png' ,
                'created_at' => now()

            ],


        ]);
    }
}
