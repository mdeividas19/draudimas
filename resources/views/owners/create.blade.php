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
                <form method="post" action="{{ route("owners.store") }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('Name') }}:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Surname') }}:</label>
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Phone') }}:</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Email') }}:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Address') }}:</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Add') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
