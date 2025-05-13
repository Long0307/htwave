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
                Edit History
            </h4>

            <x-form
                method="PUT"
                action="{{ route('history.update', $history->id) }}"
                class="mt-4"
            >
            @php
                // Lấy URL hiện tại của trang
                $url = url()->current();

                // Xóa dấu "/" cuối URL nếu có
                $trimmedUrl = rtrim($url, '/');

                // Tách URL thành mảng dựa trên dấu "/"
                $urlArray = explode('/', $trimmedUrl);

                // Lấy phần tử cuối cùng của mảng
                $lastSegment = end($urlArray);

                // Xóa dấu "/" cuối URL nếu có
                $trimmedUrl = rtrim($lastSegment, '_');

                // Tách URL thành mảng dựa trên dấu "/"
                $trimmedUrl = explode('_', $trimmedUrl);

                // Lấy phần tử cuối cùng của mảng
                $lastSegment = reset($trimmedUrl);
            @endphp

            @if($lastSegment == 'edit')
                @include('app.history.update')
            @else
                @include('app.history.form-inputs')
            @endif
                <div class="mt-4">
                    <a
                        href="{{ route('history.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                    </a>
                    <a
                        href="{{ route('history.create') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-add text-primary"></i>
                    </a>
                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i> UPDATE
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
