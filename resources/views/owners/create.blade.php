@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <form method="post" action="{{ route("owners.store") }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('Name') }}:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Surname') }}:</label>
                        <input type="text" class="form-control" name="surname">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Phone') }}:</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Email') }}:</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Address') }}:</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Add') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
