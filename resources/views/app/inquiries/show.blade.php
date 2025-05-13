@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('inquiries.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.inquiries.show_title')
            </h4>
            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.inquiries.inputs.name')</h5>
                    <span>{{ $inquiry->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.inquiries.inputs.email')</h5>
                    <span>{{ $inquiry->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.inquiries.inputs.phoneNumber')</h5>
                    <span>{{ $inquiry->phoneNumber ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.inquiries.inputs.enquiries')</h5>
                    <span>{{ $inquiry->enquiries ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('inquiries.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                <!-- @can('create', App\Models\Inquiry::class)
                <a href="{{ route('inquiries.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan -->
            </div>
        </div>
    </div>
</div>
@endsection
