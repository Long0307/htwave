@extends('layouts.app')

@section('content')
<div class="container">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Create solution category name</h4></br>
            <form action="/solution-categories-create" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
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
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    Solution categories list
                </h4>
            </div>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
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
                        @foreach ($solution_categories as $item)
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
