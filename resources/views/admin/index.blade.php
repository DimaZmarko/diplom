@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12" style="text-align: center">
                <h4>{{ $title }}</h4>
                <ul style="display: flex; align-items: center; justify-content: space-evenly">
                    <li>
                        <a href="{{ route('allProjects') }}">
                            <h5>Подивитись список проектів</h5>
                        </a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="{{ route('tags') }}">--}}
{{--                            <h5>Список груп</h5>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li>
                        <a href="{{ route('allDonations') }}">
                            <h5>Подивитись список пожертв</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
