<?php

namespace Database\Seeders;

use App\Models\StaticPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaticPageSeeder extends Seeder
{

    public function run(): void
    {
        StaticPage::insert([

            [
                'title_ar'  => 'الشروط والاحكام' ,
                'title_en'  => 'Terms and Conditions' ,
                'desc_ar'   => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل .. هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل ' ,
                'desc_en'   => 'There is a long-established fact that the readable content of a page will distract the reader from focusing on the external appearance of the text or form. There is a long-established fact that the readable content of a page will distract the reader from focusing on the form. There is a long-established fact that The readable content of a page will distract the reader from focusing on the external appearance of the text or form. There is a long-established fact that the readable content of a page will distract the reader from focusing on the form.' ,
                'type'      => 'terms' ,
            ] ,

            [

                'title_ar'  => 'من نحن' ,
                'title_en'  => 'who are we' ,
                'desc_ar'   => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل .. هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل ' ,
                'desc_en'   => 'There is a long-established fact that the readable content of a page will distract the reader from focusing on the external appearance of the text or form. There is a long-established fact that the readable content of a page will distract the reader from focusing on the form. There is a long-established fact that The readable content of a page will distract the reader from focusing on the external appearance of the text or form. There is a long-established fact that the readable content of a page will distract the reader from focusing on the form.' ,
                'type'      => 'us' ,
            ] ,








        ]);
    }
}
