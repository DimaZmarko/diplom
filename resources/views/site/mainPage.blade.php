@extends('layouts.site')

@section('content')
    <div class="main">
        <div class="first-wrap" style="background-image: url({{asset('images/first-bunner-bg.jpg')}});">
            <div class="mbox">
                <div class="conteiner">
                    <div class="texter-part">
                        <div class="texter">
                            <h1>
                                First Title
                            </h1>
                            <h3>
                                First Subtitle
                            </h3>
                            <p>

                            </p>
                            <div class="read-more">
                                <a href="/">
                                    <span>
                                        About us
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-tabs-wrap">
            <div class="mbox">

                <div class="topper-category">
                </div>

                <div class="content-items">
                    <div class="list-items">
                        <div class="item">
                            <div class="con">

                                <div class="verified_con">
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
                                </div>

                                <div class="wrapper_item">
                                    <a href="{{route('project')}}">View Project<i class="far fa-eye"></i></a>
                                </div>

                                <img src="{{asset('images/first-bunner-bg.jpg')}}" alt="">
                                <span class="tag">
                                 tag
                            </span>

                            </div>
                            <div class="bot-part">
                                <div class="named">
                                    <a href="#">
                                        Title
                                    </a>
                                </div>
                                <div class="total-pay">
                                    funded 300 UAH
                                </div>

                                <div class="progressbar">
                                    <div class="counter">56 %</div>
                                    <div class="bar">
                                        <div class="readystate" style="right: calc(100% - 56%);"></div>
                                    </div>
                                </div>
                                <div class="siders">
                                    <div class="peoplels">
                                        <div class="humans-ico"></div>
                                        <div class="count">
                                            <strong> 3 </strong>
                                            donors
                                        </div>
                                    </div>
                                    <div class="timer">
                                        <div class="time-ico"></div>
                                        <div class="count">
                                            <strong> 9 </strong>
                                            days left
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="steps-wrap">
            <div class="mbox">
                <div class="title-row">
                    <h2>
                        Steps title
                    </h2>
                </div>
                <div class="content-part">
                    <img src="{{asset('images/leaf-ico.png')}}" class="asside-image" alt="">
                    <div class="list-items">
                        <div class="item">
                            <div class="con">
                                {!! file_get_contents(asset('images/svg1.svg')) !!}
                            </div>
                            <div class="about-text">
                                <div class="name">
                                    Title
                                </div>
                                <div class="after-text">
                                    Description
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="con">
                                {!! file_get_contents(asset('images/svg2.svg')) !!}
                            </div>
                            <div class="about-text">
                                <div class="name">
                                    Title
                                </div>
                                <div class="after-text">
                                    Description
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="con">
                                {!! file_get_contents(asset('images/svg3.svg')) !!}
                            </div>
                            <div class="about-text">
                                <div class="name">
                                    Title
                                </div>
                                <div class="after-text">
                                    Description
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="readmore">
                    <a href="#" class="butt btn-6">
                        <span class="sp"></span>
                        <span> About us </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="acordion-wrap" style="background-image: url( {{asset('images/acordion-bg.jpg')}} );">
            <div class="mbox">
                <div class="title-row">
                    <h2> FAQ </h2>
                </div>
                <div class="content-acordion">
                    <div class="list-acc">
                        <div class="line">
                            <div class="named">
                                Title
                            </div>
                            <div class="hidden">
                                <div class="texter">
                                    Description
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="content-acordion">
                    <div class="list-acc">
                        <div class="line">
                            <div class="named">
                                Title
                            </div>
                            <div class="hidden">
                                <div class="texter">
                                    Description
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="partner-block">
            <div class="mbox">
                <div class="topper-part">
                    <div class="con">
                        <img src="{{asset('images/drop-leaves.png')}}" alt="">
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection