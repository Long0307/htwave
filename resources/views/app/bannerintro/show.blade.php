@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('banners.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.banners.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.banners.inputs.title')</h5>
                    <span>{{ $banner->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.banners.inputs.images')</h5>
                    <x-partials.thumbnail
                        src="{{ $banner->images ? \Storage::url($banner->images) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('banners.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Banner::class)
                <a href="{{ route('banners.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
