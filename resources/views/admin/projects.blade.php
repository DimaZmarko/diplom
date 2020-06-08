@extends('layouts.app')

@section('content')
    <div style="margin:0 50px">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if($projects)
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Назва</th>
                    <th>Повинні зібрати</th>
                    <th>Зібрано</th>
                    <th>Пожертви</th>
                    <th>Створено</th>
                    <th>Дата завершення</th>
                    <th>Змінити</th>
                    <th>Видалити</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{$project->id}}</td>
                        <td><a href="{{route('editProject', ['project' => $project->id])}}">{{$project->title}}</a></td>
                        <td>{{$project->full_amount}}$</td>
                        <td>{{$project->paid_amount}}$</td>
                        <td>{{count($project->donations)}}</td>
                        <td>{{$project->created_at}}</td>
                        <td>{{$project->deadline}}</td>
                        <td>
                            <form action="{{route('editProject', ['project' => $project->id])}}" class="form-horizontal"
                                  method="GET">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-info">Змінити</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('deleteProject', ['project' => $project->id])}}"
                                  class="form-horizontal"
                                  method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{route('addProject')}}">Створити новий проект</a>
    </div>
@endsection