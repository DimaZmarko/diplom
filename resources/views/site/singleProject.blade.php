@extends('layouts.site')

@section('content')
    <div class="main">
        <!-- add partials here -->
        <div class="single-page-wrap">
            <div class="topper-part">
                <div class="mbox">
                    <div class="breadcrumbs">
                        <ul>
                            <li>Breadcrumbs</li>
                            <li>Breadcrumbs</li>
                        </ul>
                    </div>

                    <div class="title-page">
                        <h1>{{$project->title}}</h1>
                        <h2>{{$project->subtitle}}</h2>
                    </div>
                    <div class="about-item">
                        <div class="siders">
                            <div class="wrapper_video_and_clock">
                                <div class="promo">
                                    <div class="topper-video">
                                        <img src="{{asset($project->thumbnail)}}" alt="">
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="siders-top">
                                        <div class="summ">
                                            <div class="already">
                                                <strong>{{number_format($project->paid_amount, 0, ',', ',')}}</strong> $
                                            </div>
                                            <div class="need-to-be">
                                                із {{number_format($project->full_amount, 0, ',', ',')}} $
                                            </div>
                                        </div>

                                        <div class="con-clock" data-endtime="{{strtotime($project->deadline)}}">
                                            @include('site.clock')
                                        </div>
                                    </div>

                                    <div class="progressbar">
                                        <div class="counter">{{round($project->paid_amount * 100 / $project->full_amount) . '%'}}
                                            зібрано
                                        </div>
                                        <div class="bar">
                                            <div class="readystate"
                                                 style="right: calc(100% - {{round($project->paid_amount * 100 / $project->full_amount) .'%'}});"></div>
                                        </div>
                                    </div>

                                    <div class="siders">
                                        <div class="peoplels">
                                            <div class="humans-ico"></div>
                                            <div class="count">
                                                <strong>{{ count($project->donations)}} пожертв</strong>
                                            </div>
                                        </div>
                                        <div class="timer">
                                            <div class="time-ico"></div>
                                            <div class="count">
                                                <strong>{{date_diff(new DateTime(), new DateTime($project->deadline))->format('%r%a днів залишилось')}}</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button-part">
                                        <a href="{{route('pay', ['project' => $project->id])}}" class="butt">
                                        <span>
                                           Внести пожертву
                                        </span>
                                        </a>
                                    </div>
                                    <div class="after-text">
                                        дай старт
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper_share_and_verifigate">
                                <div class="verifiend_wrap">

                                    <div class="verifiend">
                                        <svg width="17" height="19" viewBox="0 0 17 19" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.0717 5.90592L12.145 4.97949L7.51225 9.61222L5.19596 7.29593L4.26953 8.22221L7.51225 11.4654L13.0717 5.90592Z"
                                                  fill="#5EAC24"/>
                                            <path d="M8.49512 0V1.31042H15.0468V8.99525C15.0577 12.2243 13.2316 15.1789 10.3384 16.6133L8.49512 17.535V19L10.9245 17.7854C14.2539 16.1207 16.3572 12.7176 16.3572 8.99525V0H8.49512Z"
                                                  fill="#5EAC24"/>
                                            <path d="M6.65149 16.6133C3.75826 15.1789 1.93222 12.2245 1.94324 8.99525V1.31042H8.49493V0H0.632812V8.99525C0.632812 12.7176 2.73602 16.1207 6.06557 17.7854L8.49493 19V17.535L6.65149 16.6133Z"
                                                  fill="#4E901E"/>
                                            <path d="M1.94341 8.99538C1.93239 12.2245 3.75843 15.179 6.65181 16.6134L8.4951 17.5352V10.4829L7.51228 11.4656L4.26927 8.2226L5.19555 7.29617L7.51228 9.61247L8.4951 8.62979V1.31055H1.94341V8.99538Z"
                                                  fill="#B6EB92"/>
                                            <path d="M12.145 4.97945L13.0717 5.90588L8.49512 10.4829V17.5352L10.3384 16.6134C13.2316 15.1792 15.0577 12.2246 15.0468 8.99538V1.31055H8.49512V8.62979L12.145 4.97945Z"
                                                  fill="#C9EEAE"/>
                                        </svg>
                                        <p>підверджений</p>
                                    </div>

                                    <div class="ver_val">
                                        <p>$</p>
                                        <div class="ver_check">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="bottom-part">
                <div class="mbox">
                    <div class="content">
                        <div class="tab-about">
                            <div class="navigate-tabs">
                                <ul>
                                    <li>
                                        <a href="#" class="active">Про проект</a>
                                    </li>

                                    <!--DONATIONS TAB-->
                                    <li>
                                        <a href="#">Пожертви ({{ count($project->donations)}})</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="content-tab">
                                <ul>
                                    <li class="active">
                                        <div class="texter">
                                            {!! $project->description !!}
                                        </div>
                                    </li>

                                    <!--DONATIONS TAB-->

                                    <li>
                                        <div class="sort-parts">
                                            <div class="sort">
                                                <div class="sort_wrapp">
                                                    <b>Сортувати:</b>
                                                    <span data-sort="name" data-post_id="1">Ім'я</span>
                                                    <span data-sort="date" data-post_id="1">Дата</span>
                                                    <span data-sort="summ" data-post_id="1">Сума</span>
                                                </div>
                                            </div>
                                            <div class="view">
                                                <span data-view="list"><i class="fas fa-bars"></i></span>
                                                <span class="active" data-view="grid"><i
                                                            class="fas fa-th-large"></i></span>
                                            </div>
                                        </div>
                                        <div class="sortable-list conteiner-gifts">
                                            @if($project->donations)
                                                @foreach($project->donations as $donation)
                                                    <div class="gift">
                                                        <div class="topper">
                                                            <div class="summ"> {{$donation->paid_amount}}
                                                                <small>
                                                                    $
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="botter">
                                                            <div class="bootter_name_p">
                                                                <div class="name">
                                                                    {{$donation->payer_first_name}}
                                                                </div>
                                                                <p>
                                                                    {{$donation->payer_comment}}
                                                                </p>
                                                            </div>
                                                            <br>

                                                            <div class="info">
                                                                <div class="img_hand">

                                                                    <img src="{{asset('images/hand.png')}}" alt="hand icon">
                                                                </div>
                                                                <span class="date"> {{$donation->created_at}} </span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="asside">
                        <div class="counter-items">
                            <div class="item new_item">
                                <div class="name_other">
                                    Введіть суму
                                </div>
                                <form action="{{route('pay', ['project' => $project->id])}}" method="get">
                                    <div class="selectet_input">
                                        <input type="number" name="amount">
                                        <select class="js-example-basic-single" name="currency">
                                            <option value="usd" selected>$</option>
                                        </select>
                                    </div>
                                    <div class="wrap_btn">
                                        <button class="butt">Внести кошти</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection