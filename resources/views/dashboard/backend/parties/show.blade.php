@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.party_details') }}
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/lity@2.4.1/dist/lity.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ __('models.party_details') }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.parties.index') }}">{{ __('models.parties') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('models.party_details') }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xxl-3">
        <div class="card">
            <div class="card-body text-center">
                <h6 class="card-title mb-3 flex-grow-1 text-start">{{ __('models.time') }}</h6>
                <div class="mb-2">
                    <lord-icon src="https://cdn.lordicon.com/kbtmbyzy.json" trigger="loop" colors="primary:#405189,secondary:#02a8b5" style="width:90px;height:90px"></lord-icon>
                </div>
                <h3 class="mb-1 text-info">{{ Carbon\Carbon::parse($party->time)->format('h:i A') }}</h3>
                <h2 class="mb-3 text-info">{{ $party->date }}</h2>

            </div>
        </div>
        <!--end card-->
        <div class="card mb-3">
            <div class="card-body">

                <div class="table-card">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td class="fw-medium">{{ __('models.party_name') }}</td>
                                <td>{{ $party->name }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">{{ __('models.code') }}</td>
                                <td>{{ $party->code }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">{{ __('models.img') }}</td>
                                <td>
                                    <a href="#" data-lity data-lity-target="{{ asset('storage/' . $party->img)}}">
                                        <img src="{{ asset('storage/' . $party->img)}}" alt="{{ $party->name }}" class="avatar-xl rounded-circle shadow test-popup-link">
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td class="fw-medium">{{ __('models.date') }}</td>
                                <td>{{ $party->date }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">{{ __('models.time') }}</td>
                                <td>{{ Carbon\Carbon::parse($party->time)->format('h:i A') }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">{{ __('models.location') }}</td>
                                <td>{{ $party->location }}</td>
                            </tr>

                        </tbody>
                    </table>
                    <!--end table-->
                </div>
            </div>
        </div>
        <!--end card-->
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <h6 class="card-title mb-0 flex-grow-1">{{ __('models.party_users') }}</h6>

                </div>
                <ul class="list-unstyled vstack gap-3 mb-0">
                  @foreach ($party['users'] as $user)
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/admins/1.png')}}" alt="" class="avatar-xs rounded-circle shadow">
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <h6 class="mb-1">{{ $user->phone }}</a></h6>
                                    <p class="text-muted mb-0">{{ $user->count }}</p>
                                </div>

                            </div>
                        </li>
                  @endforeach

                </ul>
            </div>
        </div>
        <!--end card-->




        <div class="col-md-12 col-12 mb-3">
            <div class="d-flex col-12 flex-column mb-7 fv-row fv-plugins-icon-container" style="height:100vh">

                <div id="map" style="height: 100%;width: 100%;">
            </div>
        </div>


    </div>

</div>
<!--end row-->




@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/lity@2.4.1/dist/lity.min.js"></script>
@include('dashboard.backend.parties.mab')

@endsection
