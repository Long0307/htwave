@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('technologies.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.technologies.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.technologies.inputs.Background')</h5>
                    <span>{{ $technology->Background ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.technologies.inputs.Slogan')</h5>
                    <span>{{ $technology->Slogan ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.technologies.inputs.SubTitle')</h5>
                    <span>{{ $technology->SubTitle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.technologies.inputs.Description')</h5>
                    <span>{{ $technology->Description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.technologies.inputs.categories_id')</h5>
                    <span>{{ $technology->categories_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('technologies.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Technology::class)
                <a
                    href="{{ route('technologies.create') }}"
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
