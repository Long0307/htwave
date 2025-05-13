@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('contacts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.contacts.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.contacts.inputs.address')</h5>
                    <span>{{ $contact->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contacts.inputs.phone')</h5>
                    <span>{{ $contact->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contacts.inputs.email')</h5>
                    <span>{{ $contact->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contacts.inputs.fax')</h5>
                    <span>{{ $contact->fax ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contacts.inputs.logo1')</h5>
                    <x-partials.thumbnail
                        src="{{ $contact->logo1 ? \Storage::url($contact->logo1) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>lang('crud.solutions.inputs.Background2')</h5>
                    <x-partials.thumbnail
                        src="{{ $contact->logo2 ? \Storage::url($contact->logo2) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('contacts.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Contact::class)
                <a href="{{ route('contacts.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
