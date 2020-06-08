@extends('layouts.app')

@section('content')
    <div class="wrapper container">
        <form action="{{ route('addProject') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Назва проекту</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Назва проекту">
                </div>
                <div class="col-md-6">
                    <label for="subtitle">Короткий опис</label>
                    <input type="text" id="subtitle" name="subtitle" class="form-control"
                           placeholder="Короткий опис">
                </div>
            </div>
            <div class="row" style="margin-top: 2rem">
                <div class="col-md-12">
                    <label for="description">Опис проекту</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
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
                           placeholder="Повинні зібрати">
                </div>

                <div class="col-md-4">
                    <label for="paid_amount">Уже зібрано</label>
                    <input type="number" id="paid_amount" name="paid_amount" class="form-control"
                           placeholder="Уже зібрано" value="0">
                </div>
                <div class="col-md-4">
                    <label for="deadline">Дата завершення</label>
                    <input type="date" id="deadline" name="deadline" class="form-control" placeholder="Дата завершення">
                </div>
            </div>

            <div class="row" style="margin-top: 2rem">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Створити проект</button>
                </div>
            </div>
        </form>
    </div>
@endsection