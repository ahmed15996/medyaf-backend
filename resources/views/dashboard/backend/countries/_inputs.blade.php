<x-hidden name="id" :value="$country ? $country->id : ''"/>
<x-forms label="{{ __('models.name_ar') }}" name="name_ar" :value="$country ? $country->name_ar : '' "/>
<x-forms label="{{ __('models.name_en') }}" name="name_en" :value="$country ? $country->name_en : '' "/>
