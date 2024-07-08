<x-forms label="{{ __('models.title_ar') }}" name="title_ar" :value="$ques ? $ques->title_ar : '' "/>
<x-forms label="{{ __('models.title_en') }}" name="title_en" :value="$ques ? $ques->title_en : '' "/>
<x-textarea label="{{ __('models.desc_ar') }}"  name="desc_ar"  :value="$ques ? $ques->desc_ar : '' " />
<x-textarea label="{{ __('models.desc_en') }}"  name="desc_en"  :value="$ques ? $ques->desc_en : '' " />
