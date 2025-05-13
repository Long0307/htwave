@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('awards-and-certifications.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.awards_and_certifications.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.awards_and_certifications.inputs.images')
                    </h5>
                    <x-partials.thumbnail
                        src="{{ $awardsAndCertification->images ? \Storage::url($awardsAndCertification->images) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.awards_and_certifications.inputs.title')
                    </h5>
                    <span>{{ $awardsAndCertification->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.awards_and_certifications.inputs.description')
                    </h5>
                    <span
                        >{{ $awardsAndCertification->description ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.awards_and_certifications.inputs.link')</h5>
                    <span>{{ $awardsAndCertification->link ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('awards-and-certifications.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\AwardsAndCertification::class)
                <a
                    href="{{ route('awards-and-certifications.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
