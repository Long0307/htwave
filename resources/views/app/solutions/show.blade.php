@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('solutions.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.solutions.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.solutions.inputs.Background1')</h5>
                    <x-partials.thumbnail
                        src="{{ $solution->Background1 ? \Storage::url($solution->Background1) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.solutions.inputs.Slogan')</h5>
                    <span>{{ $solution->Slogan ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.solutions.inputs.Background2')</h5>
                    <x-partials.thumbnail
                        src="{{ $solution->Background2 ? \Storage::url($solution->Background2) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.solutions.inputs.Title')</h5>
                    <span>{{ $solution->Title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.solutions.inputs.Description')</h5>
                    <span>{{ $solution->Description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.solutions.inputs.Content')</h5>
                    <span>{{ $solution->Content ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('solutions.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Solution::class)
                <a href="{{ route('solutions.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
