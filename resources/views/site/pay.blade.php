@extends('layouts.site')

@section('content')
    <section>
        <form action="/wp-admin/admin-ajax.php" class="former">
            <input type="hidden" name="action" value="add_new_gift">
            <input type="hidden" name="lang" value="en">

            <input type="hidden" name="post_id" value="1">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-8">
                        <div class="text_header_block">
                            <p>Project title</p>
                        </div>

                        <div class="verified">
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

                        <div class="titel-part">
                            <h2>Payment</h2>
                        </div>
                        <div class="money-block">
                            <div class="add-sum-block">


                                <div class="topper">
                                    <p>Write the sum you want to share</p>
                                </div>
                                <div class="selectet_input currency_select rover">
                                    <input type="number" name="summ" required
                                           min="0" id="summ"

                                           <?php if ($summFromSlug != '' ) :?>
                                           value="<?php echo $summFromSlug; ?>"
                                    <?php endif;?>
                                    >

                                    <select class="js-example-basic-single" name="valute">
                                        <option value="usd" selected>$</option>
                                    </select>
                                    <div class="error-text"><p>
                                            Please enter a full name
                                        </p>
                                    </div>
                                </div>

                                <div class="checkboxer">
                                    <div class="rover">
                                        <label>
                                            <input type="checkbox" name="monthly_payment">
                                            <span class="beutify"></span>
                                            <span class="texter">
                                           Payment by direct debit (without seizure of the credit limit)
                                        </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="rover choose-month" style="display: none;">

                                    <div class="inputer">
                                        <div class="valute-selector">
                                            <select name="month" id="months">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="periods_desc" style="display: none; text-align: center">
                                    <div>
                                        <span>'סה"כ תרומתך הינה</span>
                                        <span class="month_pay_summ"> 200 </span>
                                        <span>ש"ח</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="">
                            <div class="body-part">
                                <div class="rover">
                                    <div class="labled">
                                        Full name
                                    </div>
                                    <div class="inputer required-inp copy_input">
                                        <input type="text" name="full_name" required="required" placeholder="Full name">
                                    </div>
                                    <div class="error-text"><p>Please enter a full name</p></div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        Site display name
                                    </div>
                                    <div class="inputer target_input">
                                        <input type="text" name="site_name" placeholder="Site display name">
                                    </div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        ID
                                    </div>
                                    <div class="inputer required-inp ">
                                        <input type="text" name="pasport_info" required="required" placeholder="ID">
                                    </div>
                                    <div class="error-text"><p>
                                            Fill your passport info
                                        </p>
                                    </div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        Email (for receipt)
                                    </div>
                                    <div class="inputer required-inp ">
                                        <input type="email" name="email" required="required" placeholder="Email">
                                    </div>
                                    <div class="error-text"><p>
                                            Please enter a valid email address
                                        </p>
                                    </div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        Dedication (optional)
                                    </div>
                                    <div class="inputer">
                                        <textarea name="texter" class="textarea_lich" maxlength="75"
                                                  placeholder="Dedication (optional)"></textarea>
                                    </div>
                                    <div class="sub-text">
                                        75 characters left
                                    </div>
                                </div>
                                <div class="rover">
                                    <div class="labled">
                                        phone
                                    </div>
                                    <div class="inputer">
                                        <input type="tel" name="tel" required="required" placeholder="phone">
                                    </div>
                                </div>


                                <div class="radio_append">

                                    <?php get_payments($valute, $post_id_current);?>

                                </div>
                                <div class="submiter">
                                    <button type="submit">Done</button>
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
                                <div class="rover">
                                    <label>
                                        <input type="checkbox" name="confidentials2" checked>
                                        <span class="beutify"></span>
                                        <span class="texter">
                                        I accept receiving emails containing relevant information
                                    </span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection