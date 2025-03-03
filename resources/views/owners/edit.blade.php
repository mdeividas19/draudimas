@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <form method="post" action="{{ route("owners.update", $owner) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ $owner->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Surname:</label>
                        <input type="text" class="form-control" name="surname" value="{{ $owner->surname }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone:</label>
                        <input type="text" class="form-control" name="phone" value="{{ $owner->phone }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" value="{{ $owner->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address:</label>
                        <input type="text" class="form-control" name="address" value="{{ $owner->address }}">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
