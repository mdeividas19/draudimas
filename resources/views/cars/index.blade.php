@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("cars.create") }}" class="btn btn-success">{{ __('Add new car') }}</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('Brand') }}</th>
                        <th>{{ __('Model') }}</th>
                        <th>{{ __('Registration Number') }}</th>
                        <th>{{ __('Owner') }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <td>{{$car->brand}}</td>
                            <td>{{$car->model}}</td>
                            <td>{{$car->reg_number}}</td>
                            <td>
                                @if ($car->owner!=null)
                                    {{ $car->owner->name }} {{ $car->owner->surname }}
                                @else
                                    {{ __('undefined') }}
                                    @endif
                            </td>
                            <td>
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            </td>
                            <td>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button href="" class="btn btn-danger">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
