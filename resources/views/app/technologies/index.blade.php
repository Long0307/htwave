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
                <!-- <a href="/technology-categories" class="btn btn-primary">
                    <i class="icon ion-md-add"> Technology categories list</i>
                </a> -->
                @can('create', App\Models\Technology::class)
                <a
                    href="{{ route('technologies.create') }}"
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
                    @lang('crud.technologies.index_title')
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
                                @lang('crud.technologies.inputs.Background')
                            </th>
                            <th class="text-left">
                                @lang('crud.technologies.inputs.Slogan')
                            </th>
                            <th class="text-left">
                                @lang('crud.technologies.inputs.SubTitle')
                            </th>
                            <th class="text-left">
                                @lang('crud.technologies.inputs.Description')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $stt = 1;  // Khởi tạo biến số thứ tự
                        @endphp
                        @forelse($technologies as $technology)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $technology->Background ? \Storage::url($technology->Background) : '' }}"
                                />
                            </td>
                            <td>{{ $technology->Slogan ?? '-' }}</td>
                            <td>{{ $technology->SubTitle ?? '-' }}</td>
                            <td>{{ $technology->Description ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $technology)
                                    <a
                                        href="{{ route('technologies.edit', $technology) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $technology)
                                    <a
                                        href="{{ route('technologies.show', $technology) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $technology)
                                    <form
                                        action="{{ route('technologies.destroy', $technology) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">{!! $technologies->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
