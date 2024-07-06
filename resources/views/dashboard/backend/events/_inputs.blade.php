<x-hidden name="id" :value="$event ? $event->id : ''"/>
<x-forms label="{{ __('models.price') }}" name="price" :value="$event ? $event->price : '' "/>
<x-forms label="{{ __('models.count') }}" name="count" :value="$event ? $event->count : '' " type="number"/>
