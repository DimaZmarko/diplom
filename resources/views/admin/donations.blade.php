@extends('layouts.app')

@section('content')
    <div style="margin:0 50px">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if($donations)
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Проект</th>
                    <th>Сума пожертви</th>
                    <th>Ім'я</th>
                    <th>Прізвище</th>
                    <th>Емейл</th>
                    <th>Дата</th>
                    <th>Змінити</th>
                    <th>Видалити</th>
                </tr>
                </thead>
                <tbody>
                @foreach($donations as $donation)
                    <tr>
                        <td>{{$donation->id}}</td>
                        <td>{{$donation->project->title}}</td>
                        <td>{{$donation->paid_amount}}</td>
                        <td>{{$donation->payer_first_name}}</td>
                        <td>{{$donation->payer_last_name}}</td>
                        <td>{{$donation->payer_email}}</td>
                        <td>{{$donation->created_at}}</td>
                        <td>
                            <form action="{{route('editDonation', ['donation' => $donation->id])}}" class="form-horizontal"
                                  method="GET">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-info">Змінити</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('deleteDonation', ['$donation' => $donation->id])}}" class="form-horizontal"
                                  method="POST">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{route('addDonation')}}">Нова пожертва</a>
    </div>

@endsection