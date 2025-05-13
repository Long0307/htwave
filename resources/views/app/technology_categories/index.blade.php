@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\TechnologyCategory::class)
                <a
                    href="{{ route('technology-categories.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.technology_categories.index_title')
                </h4>
            </div>
            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                No
                            </th>
                            <th class="text-left">
                                Name
                            </th>
                            <th class="text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $stt = 1;  // Khởi tạo biến số thứ tự
                        @endphp
                        @foreach ($technology_categories as $item)
                        <tr>
                            <td>
                            {{ $stt++ }}
                            </td>
                            <td>{{ $item->name }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    <form
                                        action="{{ route('items.destroy', $item->id) }}"
                                        method="POST"
                                    >
                                    @csrf
                                    @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
