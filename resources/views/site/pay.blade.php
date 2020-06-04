@extends('layouts.site')

@section('content')
    <section>
        <form action="/wp-admin/admin-ajax.php" class="former">
            <input type="hidden" name="post_id" value="1">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-8">
                        <div class="text_header_block">
                            <p>Project title</p>
                        </div>

                        <div class="titel-part">
                            <h2>Place your Payment</h2>
                        </div>
                        <div class="money-block">
                            <div class="add-sum-block">
                                <div class="topper">
                                    <p>Write the sum you want to share</p>
                                </div>
                                <div class="selectet_input currency_select rover">
                                    <input type="number" name="paid_amount" required
                                           min="0" id="summ" value="">

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
                                        First name
                                    </div>
                                    <div class="inputer required-inp copy_input">
                                        <input type="text" name="first_name" required="required"
                                               placeholder="First name">
                                    </div>
                                    <div class="error-text"><p>Please enter a first name</p></div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        Last name
                                    </div>
                                    <div class="inputer target_input">
                                        <input type="text" name="last_name" required="required" placeholder="Last name">
                                    </div>
                                    <div class="error-text"><p>Please enter a last name</p></div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        Email (for receipt)
                                    </div>
                                    <div class="inputer required-inp">
                                        <input type="email" name="email" required="required" placeholder="Email">
                                    </div>
                                    <div class="error-text">
                                        <p>
                                            Please enter a valid email address
                                        </p>
                                    </div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        Comment (optional)
                                    </div>
                                    <div class="inputer">
                                        <textarea name="payer_comment" class="textarea_lich" maxlength="75"
                                                  placeholder="Comment (optional)"></textarea>
                                    </div>
                                    <div class="sub-text">
                                        75 characters left
                                    </div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        Phone
                                    </div>
                                    <div class="inputer">
                                        <input type="tel" name="payer_phone" required="required" placeholder="Phone">
                                    </div>
                                    <div class="error-text">
                                        <p>
                                            Please enter a phone number
                                        </p>
                                    </div>
                                </div>

                                <div class="radio_append">
                                    <div class="radio">
                                        <div class="labled payment-type-label">Choose payment type</div>

                                        <div class="wrappe_paypal">
                                            <input type="radio" id="paypal" name="type_pay" value="paypal">
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
                                            I agree to the Terms of Use and Site Privacy Policy
                                        </span>
                                            </a>
                                        </label>
                                    </div>
                                </div>
                                <div class="submiter">
                                    <button type="submit">Submit Payment</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection