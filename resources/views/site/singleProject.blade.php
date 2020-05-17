@extends('layouts.site')

@section('content')

    <?php
    $date1 = new DateTime();
    $date2 = new DateTime('11/05/2021');
    $daysLeft = $date2->diff($date1)->format('%a');

    if ($date1 < $date2) {
        $daysLeft = $date2->diff($date1)->format('%a');
    } else {
        $daysLeft = 0;
    }

    $time_to_end = strtotime('11/05/2021');
    $countGIfts = 3;

    $create_url = "/create-gift/?term=type_custom&postID=1";
    $single_already = 300;
    $single_full = 500;

    $percenter = round($single_already / $single_full * 100, 2);

    $echo_single_already = number_format($single_already, 0, ',', ',');
    $echo_single_full = number_format($single_full, 0, ',', ',');
    ?>

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
                        <h1> Project title </h1>
                        <h2> Project subtitle </h2>
                    </div>
                    <div class="about-item">
                        <div class="siders">
                            <div class="wrapper_video_and_clock">
                                <div class="promo">
                                    <div class="topper-video">
                                        <img src="{{asset('images/first-bunner-bg.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="siders-top">
                                        <div class="summ">
                                            <div class="already"><strong><?php echo $echo_single_already; ?></strong> $
                                            </div>
                                            <div class="need-to-be">
                                                Out of <strong> $ </strong> 900
                                            </div>
                                        </div>

                                        <div class="con-clock" data-endtime="<?php echo $time_to_end; ?>">
                                            @include('site.clock')
                                        </div>

                                    </div>

                                    <div class="progressbar">
                                        <div class="counter">56% funded</div>
                                        <div class="bar">
                                            <div class="readystate" style="right: calc(100% - 56%);"></div>
                                        </div>
                                    </div>

                                    <div class="siders">
                                        <div class="peoplels">
                                            <div class="humans-ico"></div>
                                            <div class="count">
                                                <strong> 3 </strong> donors
                                            </div>
                                        </div>
                                        <div class="timer">
                                            <div class="time-ico"></div>
                                            <div class="count">
                                                <strong> 9 </strong> days left
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button-part">
                                        <a href="#" class="butt">
                                        <span>
                                           Donate Now
                                        </span>
                                        </a>
                                    </div>
                                    <div class="after-text">
                                        Text under button
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
                                        <p>verified project</p>
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
                                        <a href="#" class="active">About</a>
                                    </li>

                                    <!--DONATIONS TAB-->
                                    <li>
                                        <a href="#">Donation (3)</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="content-tab">
                                <ul>
                                    <li class="active">
                                        <div class="texter">
                                            Single description Tiny MCE EDITOR
                                        </div>
                                    </li>

                                    <!--DONATIONS TAB-->

                                    <li>
                                        <div class="sort-parts">
                                            <div class="sort">
                                                <div class="sort_wrapp">
                                                    <b>Order By:</b>
                                                    <span data-sort="name" data-post_id="1">Name</span>
                                                    <span data-sort="date" data-post_id="1">Date</span>
                                                    <span data-sort="summ" data-post_id="1">Amount</span>
                                                </div>
                                                <form action="/wp-admin/admin-ajax.php"
                                                      class="search_donation_front search_form">
                                                    <input type="hidden" name="action" value="search_donations_front">
                                                    <input type="hidden" name="post_id" value="1">
                                                    <input type="text" class="input_sort" name="search_for"
                                                           placeholder="search...">
                                                    <button type="submit"><i class="fas ico_search fa-search"></i>
                                                    </button>
                                                </form>

                                            </div>
                                            <div class="view">
                                                <span data-view="list"><i class="fas fa-bars"></i></span>
                                                <span class="active" data-view="grid"><i
                                                            class="fas fa-th-large"></i></span>
                                            </div>


                                        </div>
                                        <div class="sortable-list conteiner-gifts">
                                            <div class="gift">
                                                <div class="topper">
                                                    <div class="summ"> 50
                                                        <small>
                                                            $
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="botter">
                                                    <div class="bootter_name_p">
                                                        <div class="name">
                                                           Name
                                                        </div>
                                                        <p>
                                                            Comment
                                                        </p>
                                                    </div>
                                                    <br>

                                                    <div class="info">
                                                        <div class="img_hand">

                                                            <img src="{{asset('images/hand.png')}}" alt="hand icon">
                                                        </div>
                                                        <span class="date"> 21/04/2020 </span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="gift">
                                                <div class="topper">
                                                    <div class="summ"> 50
                                                        <small>
                                                            $
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="botter">
                                                    <div class="bootter_name_p">
                                                        <div class="name">
                                                            Name
                                                        </div>
                                                        <p>
                                                            Comment
                                                        </p>
                                                    </div>
                                                    <br>

                                                    <div class="info">
                                                        <div class="img_hand">

                                                            <img src="{{asset('images/hand.png')}}" alt="hand icon">
                                                        </div>
                                                        <span class="date"> 21/04/2020 </span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="gift">
                                                <div class="topper">
                                                    <div class="summ"> 50
                                                        <small>
                                                            $
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="botter">
                                                    <div class="bootter_name_p">
                                                        <div class="name">
                                                            Name
                                                        </div>
                                                        <p>
                                                            Comment
                                                        </p>
                                                    </div>
                                                    <br>

                                                    <div class="info">
                                                        <div class="img_hand">

                                                            <img src="{{asset('images/hand.png')}}" alt="hand icon">
                                                        </div>
                                                        <span class="date"> 21/04/2020 </span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="gift">
                                                <div class="topper">
                                                    <div class="summ"> 50
                                                        <small>
                                                            $
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="botter">
                                                    <div class="bootter_name_p">
                                                        <div class="name">
                                                            Name
                                                        </div>
                                                        <p>
                                                            Comment
                                                        </p>
                                                    </div>
                                                    <br>

                                                    <div class="info">
                                                        <div class="img_hand">

                                                            <img src="{{asset('images/hand.png')}}" alt="hand icon">
                                                        </div>
                                                        <span class="date"> 21/04/2020 </span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="gift">
                                                <div class="topper">
                                                    <div class="summ"> 50
                                                        <small>
                                                            $
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="botter">
                                                    <div class="bootter_name_p">
                                                        <div class="name">
                                                            Name
                                                        </div>
                                                        <p>
                                                            Comment
                                                        </p>
                                                    </div>
                                                    <br>

                                                    <div class="info">
                                                        <div class="img_hand">

                                                            <img src="{{asset('images/hand.png')}}" alt="hand icon">
                                                        </div>
                                                        <span class="date"> 21/04/2020 </span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="gift">
                                                <div class="topper">
                                                    <div class="summ"> 50
                                                        <small>
                                                            $
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="botter">
                                                    <div class="bootter_name_p">
                                                        <div class="name">
                                                            Name
                                                        </div>
                                                        <p>
                                                            Comment
                                                        </p>
                                                    </div>
                                                    <br>

                                                    <div class="info">
                                                        <div class="img_hand">

                                                            <img src="{{asset('images/hand.png')}}" alt="hand icon">
                                                        </div>
                                                        <span class="date"> 21/04/2020 </span>
                                                    </div>

                                                </div>
                                            </div>
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
                                    Other amount
                                </div>
                                <form action="/create-gift" method="get">
                                    <input type="hidden" name="postID" value="1">
                                    <div class="selectet_input">
                                        <input type="number" name="summ">
                                        <select class="js-example-basic-single" name="currency">
                                            <option value="usd">$</option>
                                        </select>
                                    </div>
                                    <div class="wrap_btn">
                                        <button class="butt">Donate Now</button>
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