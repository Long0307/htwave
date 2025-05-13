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
                <a
                    href="{{ route('history.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"> Create</i>
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    History list
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
                                Year
                            </th>
                            <th class="text-left">
                                Description
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
                        @forelse($history as $items)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td>{{ $items->year ?? '-' }}</td>
                            <td>{!! $items->description !!}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    <a
                                        href="{{ route('history.edit', $items->id) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    <form
                                        action="{{ route('history.destroy', $items->id) }}"
                                        method="POST"
                                    >
                                        @csrf @method('DELETE')
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
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
