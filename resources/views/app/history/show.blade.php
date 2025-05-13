@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('history.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.history.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.history.inputs.category_id')
                    </h5>
                    <span>{{ $history->year }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.history.inputs.name')</h5>
                    <span>{{ $history->description }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('history.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                </a>

                @can('create', App\Models\history::class)
                <a
                    href="{{ route('history.create') }}"
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
