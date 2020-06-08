@extends('layouts.site')

@section('content')
    <section>
        <form action="{{route('pay', ['project' => $project->id])}}" class="former" method="post">
            <input type="hidden" name="post_id" value="1">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-8">
                        <div class="text_header_block">
                            <p>{{$project->title}}</p>
                        </div>

                        <div class="titel-part">
                            <h2>Ваш платіж</h2>
                        </div>
                        <div class="money-block">
                            <div class="add-sum-block">
                                <div class="topper">
                                    <p>Введіть суму котру готові пожертвувати</p>
                                </div>
                                <div class="selectet_input currency_select rover">
                                    <input type="number" name="paid_amount" required
                                           min="0" id="summ" value="{{$customAmount}}">

                                    <select class="js-example-basic-single" name="currency">
                                        <option value="usd" selected>$</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <form action="">
                            <div class="body-part">
                                <div class="rover">
                                    <div class="labled">
                                        Ім'я
                                    </div>
                                    <div class="inputer required-inp copy_input">
                                        <input type="text" name="first_name" required="required"
                                               placeholder="Ім'я">
                                    </div>
                                    <div class="error-text"><p>Введіть ваше ім'я</p></div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                       Прізвище
                                    </div>
                                    <div class="inputer target_input">
                                        <input type="text" name="last_name" required="required" placeholder="Прізвище">
                                    </div>
                                    <div class="error-text"><p>Введіть ваше прізвище</p></div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        Емейл (для чеку)
                                    </div>
                                    <div class="inputer required-inp">
                                        <input type="email" name="email" required="required" placeholder="Емейл">
                                    </div>
                                    <div class="error-text">
                                        <p>
                                            Введіть валідний емейл
                                        </p>
                                    </div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        Комент (необов'язково)
                                    </div>
                                    <div class="inputer">
                                        <textarea name="payer_comment" class="textarea_lich" maxlength="75"
                                                  placeholder="Комент (необов'язково)"></textarea>
                                    </div>
                                    <div class="sub-text">
                                        75 символів залишилось
                                    </div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        Телефон
                                    </div>
                                    <div class="inputer">
                                        <input type="tel" name="payer_phone" required="required" placeholder="Телефон">
                                    </div>
                                    <div class="error-text">
                                        <p>
                                            Введіть свій номер телефону
                                        </p>
                                    </div>
                                </div>

                                <div class="radio_append">
                                    <div class="radio">
                                        <div class="labled payment-type-label">Виберіть спосіб оплати</div>

                                        <div class="wrappe_paypal">
                                            <input type="radio" id="paypal" name="type_pay" value="paypal" checked>
                                            <label for="paypal"></label>
                                        </div>

                                        <div class="wrapper_cart">
                                            <input type="radio" id="card" name="type_pay" value="card">
                                            <label for="card"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkboxer">
                                    <div class="rover">
                                        <label>
                                            <input type="checkbox" name="confidentials1" required checked>
                                            <span class="beutify"></span>
                                            <a href="#" target="_blank">
                                        <span class="texter">
                                            Я погоджусь з правилами та умовами сайту
                                        </span>
                                            </a>
                                        </label>
                                    </div>
                                </div>
                                <div class="submiter">
                                    <button type="submit">Підтвердити платіж</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection