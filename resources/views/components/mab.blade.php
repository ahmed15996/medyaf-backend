@props([
    'value'
])

<div class="col-md-12 col-12 mb-3">
    <div class="d-flex col-md-12 flex-column mb-7 fv-row fv-plugins-icon-container">
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required" style="font-weight:bold">
                    {{ __('models.location') . ' ('.__('models.search_in_map').')' }}
                </span>

            </label>
                <input type="text"  name="location"  class="form-control form-control-solid" id="searchInput" value="{{ old('location' , $value->location) }}" >

    </div> <br>
</div>

<div class="col-md-12 col-12 mb-3">
    <div class="d-flex col-12 flex-column mb-7 fv-row fv-plugins-icon-container" style="height:100vh">
        <input type="hidden" name="location" class="form-control" id="location"  value="{{ old('location' , $value->location) }}">
        <input type="hidden" name="lat" class="form-control" id="lat"  value="{{ old('lat' , $value->lat) }}">
        <input type="hidden" name="lng" class="form-control" id="lng"  value="{{ old('lng' , $value->lng) }}">
        <div id="map" style="height: 100%;width: 100%;">
    </div>
</div>
