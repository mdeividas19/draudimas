@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{ route("cars.update", $car) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">{{ __('Brand') }}:</label>
                        <input type="text" class="form-control" name="brand" value="{{ $car->brand }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Model') }}:</label>
                        <input type="text" class="form-control" name="model" value="{{ $car->model }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Registration Number') }}:</label>
                        <input type="text" class="form-control" name="reg_number" value="{{ $car->reg_number }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Owner ID') }}:</label>
                        <select class="form-control" name="owner_id">
                            <option value="" selected>-</option>
                            @foreach($owners as $owner)
                                <option value="{{ $owner->id }}" {{ ($car->owner_id==$owner->id)?'selected':'' }} >{{ $owner->name }} {{ $owner->surname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
