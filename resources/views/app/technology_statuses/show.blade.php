@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('technology-statuses.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.technology_statuses.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.technology_statuses.inputs.title')</h5>
                    <span>{{ $technologyStatus->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.technology_statuses.inputs.description')
                    </h5>
                    <span>{{ $technologyStatus->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('technology-statuses.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\TechnologyStatus::class)
                <a
                    href="{{ route('technology-statuses.create') }}"
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
