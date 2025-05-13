@extends('layouts.app')

@section('content')
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
                            placeholder=""
                            value=""
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
            <!-- <div class="col-md-6 text-right">
                <a href="{{ route('bannerintro.create') }}" class="btn btn-primary">
                    <i class="icon ion-md-add"></i> Create
                </a>
            </div> -->
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">Banner introduction</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                No
                            </th>
                            <th class="text-left">
                                Slogan
                            </th>
                            <th class="text-left">
                                Images
                            </th>
                            <th class="text-left">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $stt = 1;  // Khởi tạo biến số thứ tự
                        @endphp
                        @forelse($bannerintro as $banner)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td>{{ $banner->slogan }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $banner->images }}"
                                />
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    <a
                                        href="{{ route('bannerintro.edit', $banner->id) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    <a
                                        href="{{ route('bannerintro.show', $banner->id) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    <form
                                        action="{{ route('bannerintro.destroy', $banner->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        <!-- @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button> -->
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
