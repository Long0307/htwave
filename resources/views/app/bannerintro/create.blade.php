@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('bannerintro.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
            </h4>
            <x-form
                method="POST"
                action="{{ route('bannerintro.store') }}"
                has-files
                class="mt-4"
            >
                @include('app.bannerintro.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('bannerintro.store') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                    </a>
                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i> Create
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
