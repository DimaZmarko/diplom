@extends('layouts.app')

@section('content')
    <div class="wrapper container">
        <form action="{{ route('editDonation', ['donation' => $donation->id]) }}" class="form-horizontal" method="POST"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <label for="payer_first_name">Ім'я</label>
                    <input type="text" id="payer_first_name" required name="payer_first_name" class="form-control"
                           placeholder="Ім'я" value="{{$donation->payer_first_name}}">
                </div>
                <div class="col-md-6">
                    <label for="payer_last_name">Прізвище</label>
                    <input type="text" id="payer_last_name" name="payer_last_name" class="form-control" required
                           placeholder="Прізвище" value="{{$donation->payer_last_name}}">
                </div>
                <div class="col-md-6">
                    <label for="payer_email">Емейл</label>
                    <input type="email" id="payer_email" name="payer_email" class="form-control" required
                           placeholder="Емейл" value="{{$donation->payer_email}}">
                </div>
                <div class="col-md-6">
                    <label for="payer_phone">Телефон</label>
                    <input type="tel" id="payer_phone" name="payer_phone" class="form-control" required
                           placeholder="Телефон" value="{{$donation->payer_phone}}">
                </div>
            </div>
            <div class="row" style="margin-top: 2rem">
                <div class="col-md-12">
                    <label for="payer_comment">Комент від жертвувальника</label>
                    <textarea name="payer_comment" id="payer_comment" cols="30" rows="5"
                              class="form-control">{{$donation->payer_comment}}</textarea>
                </div>
            </div>

            <div class="row" style="margin-top: 2rem">
                <div class="col-md-4">
                    <label for="paid_amount">Сума внеску</label>
                    <input type="number" id="paid_amount" name="paid_amount" class="form-control"
                           placeholder="Сума внеску" required value="{{$donation->paid_amount}}">
                </div>

                <div class="col-md-4">
                    <label for="project_id">Виберіть проект</label>
                    @if($projects)
                        <select id="project_id" name="project_id" class="form-control">
                            @foreach($projects as $project)
                                <option value="{{$project->id}}" {{($donation->project_id === $project->id) ? 'selected': '' }}>
                                    {{$project->title}}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>

            </div>

            <div class="row" style="margin-top: 2rem">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Редагувати пожертву</button>
                </div>
            </div>
        </form>
    </div>
@endsection