@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('technology-categories.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.technology_categories.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.technology_categories.inputs.category_id')
                    </h5>
                    <span
                        >{{
                        optional($technologyCategory->technology)->Background ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.technology_categories.inputs.name')</h5>
                    <span>{{ $technologyCategory->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('technology-categories.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\TechnologyCategory::class)
                <a
                    href="{{ route('technology-categories.create') }}"
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
