@extends('layouts.app')

@section('content')
    <div class="wrapper container">
        <form action="{{ route('editProject', array('project' => $data['id'])) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Назва проекту</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Назва проекту"
                           value="{{ $data['title'] }}">
                </div>
                <div class="col-md-6">
                    <label for="subtitle">Короткий опис</label>
                    <input type="text" id="subtitle" name="subtitle" class="form-control"
                           placeholder="Короткий опис" value="{{ $data['subtitle'] }}">
                </div>
            </div>
            <div class="row" style="margin-top: 2rem">
                <div class="col-md-12">
                    <label for="description">Опис проекту</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $data['description'] }}</textarea>
                </div>
            </div>
            <div class="row" style="margin-top: 2rem">
                <div class="col-md-12">
                    <label for="thumbnail">Зображення проекту</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                </div>
            </div>

            <div class="row" style="margin-top: 2rem">
                <div class="col-md-4">
                    <label for="full_amount">Повинні зібрати</label>
                    <input type="number" id="full_amount" name="full_amount" class="form-control"
                           placeholder="Повинні зібрати" value="{{ $data['full_amount'] }}">
                </div>

                <div class="col-md-4">
                    <label for="paid_amount">Вже зібрано</label>
                    <input type="number" id="paid_amount" name="paid_amount" class="form-control"
                           placeholder="Вже зібрано" value="{{ $data['paid_amount'] }}">
                </div>
                <div class="col-md-4">
                    <label for="deadline">Дата заверщення</label>
                    <input type="date" id="deadline" name="deadline" class="form-control" placeholder="Дата завершення"
                           value="{{ $data['deadline'] }}">
                </div>
            </div>

            <div class="row" style="margin-top: 2rem">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Редагувати проект</button>
                </div>
            </div>
        </form>
    </div>
@endsection