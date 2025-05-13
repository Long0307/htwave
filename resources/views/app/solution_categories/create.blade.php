@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">
                <a
                    href="/solution-categories"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Create solution category name
            </h4>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
