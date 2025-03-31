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
                <form method="post" action="{{ route("cars.store") }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('Brand') }}:</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Model') }}:</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Registration Number') }}:</label>
                        <input type="text" class="form-control @error('reg_number') is-invalid @enderror" name="reg_number" value="{{ old('reg_number') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Owner ID') }}:</label>
                        <select class="form-control @error('owner_id') is-invalid @enderror" name="owner_id">
                            <option value="">-</option>
                            @foreach($owners as $owner)
                                <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Add') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
