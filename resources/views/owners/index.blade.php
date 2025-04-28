@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <a href="{{ route("owners.create") }}" class="btn btn-success">{{ __('Add new car owner') }}</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Surname') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('Cars') }}</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($owners as $owner)
                        @can('viewOwner', $owner)
                            <tr>
                                <td>{{$owner->name}}</td>
                                <td>{{$owner->surname}}</td>
                                <td>{{$owner->phone}}</td>
                                <td>{{$owner->email}}</td>
                                <td>{{$owner->address}}</td>
                                <td>
                                    @foreach ($owner->cars as $car)
                                        {{$car->brand}} {{$car->model}} <br>
                                    @endforeach
                                </td>
                                @can('modifyOwner', $owner)
                                    <td>
                                        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button href="" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endcan
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
