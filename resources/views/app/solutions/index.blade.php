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
                <!-- <a href="/solution-categories" class="btn btn-primary">
                    <i class="icon ion-md-add"> Solution categories list</i>
                </a> -->
                @can('create', App\Models\Solution::class)
                <a
                    href="{{ route('solutions.create') }}"
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
                <h4 class="card-title">@lang('crud.solutions.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                        <th class="text-left">
                                No
                            </th>
                            <th class="text-left">
                                @lang('crud.solutions.inputs.Background1')
                            </th>
                            <th class="text-left">
                                @lang('crud.solutions.inputs.Slogan')
                            </th>
                            <th class="text-left">
                                @lang('crud.solutions.inputs.Background2')
                            </th>
                            <th class="text-left">
                                Show on homepage
                            </th>
                            <th class="text-left">
                                @lang('crud.solutions.inputs.Title')
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
                        @forelse($solutions as $solution)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $solution->Background1 ? \Storage::url($solution->Background1) : '' }}"
                                />
                            </td>
                            <td>{{ $solution->Slogan ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $solution->Background2 ? \Storage::url($solution->Background2) : '' }}"
                                />
                            </td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $solution->background3 ? \Storage::url($solution->background3) : '' }}"
                                />
                            </td>
                            <td>{{ $solution->Title ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $solution)
                                    <a
                                        href="{{ route('solutions.edit', $solution) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $solution)
                                    <a
                                        href="{{ route('solutions.show', $solution) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $solution)
                                    <form
                                        action="{{ route('solutions.destroy', $solution) }}"
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
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">{!! $solutions->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
