<x-forms label="{{ __('models.title_ar') }}" name="title_ar" :value="$board ? $board->title_ar : '' "/>
<x-forms label="{{ __('models.title_en') }}" name="title_en" :value="$board ? $board->title_en : '' "/>
<x-textarea label="{{ __('models.desc_ar') }}"  name="desc_ar"  :value="$board ? $board->desc_ar : '' " />
<x-textarea label="{{ __('models.desc_en') }}"  name="desc_en"  :value="$board ? $board->desc_en : '' " />
<x-image label="{{ __('models.img') }}" name="img" type="file" id="formFile" :value="$board?$board->img:''" />
