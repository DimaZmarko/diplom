/*валидация формы*/
function validate(form, options) {
    const settings = {
        errorFunction: null,
        submitFunction: null,
        highlightFunction: null,
        unhighlightFunction: null
    };
    $.extend(settings, options);
    const $form = $(form);

    if ($form.length && $form.attr('novalidate') === undefined) {
        $form.on('submit', function (e) {
            e.preventDefault();
        });

        $form.validate({
            errorClass: 'errorText',
            focusCleanup: false,
            focusInvalid: true,
            onfocusout: true,
            invalidHandler: function (event, validator) {
                if (typeof (settings.errorFunction) === 'function') {
                    settings.errorFunction(form);
                }
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.closest('.form_input'));
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('error');
                $(element).closest('.rover').addClass('error').removeClass('valid');
                if (typeof (settings.highlightFunction) === 'function') {
                    settings.highlightFunction(form);
                }
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('error');
                if ($(element).closest('.rover').is('.error')) {
                    $(element).closest('.rover').removeClass('error').addClass('valid');
                }
                if (typeof (settings.unhighlightFunction) === 'function') {
                    settings.unhighlightFunction(form);
                }
            },
            submitHandler: function (form) {
                if (typeof (settings.submitFunction) === 'function') {
                    settings.submitFunction(form);
                } else {
                    $form[0].submit();
                }
            }
        });

        $('[required]', $form).each(function () {
            $(this).rules("add", {
                required: true,
                messages: {
                    required: "Вы пропустили"
                }
            });
        });

        if ($('[type="email"]', $form).length) {
            $('[type="email"]', $form).rules("add",
                {
                    messages: {
                        email: "Невалидный email"
                    }
                });
        }

        if ($('.tel-mask[required]', $form).length) {
            $('.tel-mask[required]', $form).rules("add",
                {
                    messages: {
                        required: "Введите номер мобильного телефона."
                    }
                });
        }

        $('[type="password"]', $form).each(function () {
            if ($(this).is("#re_password") == true) {
                $(this).rules("add", {
                    minlength: 3,
                    equalTo: "#password",
                    messages: {
                        equalTo: "Неверный пароль.",
                        minlength: "Недостаточно символов."
                    }
                });
            }
        })
    }
}

/*stripe*/
function cardValidation() {
    let valid = true;
    let cardNumber = $('#card-number').val();
    let month = $('#month').val();
    let year = $('#year').val();
    let cvc = $('#cvc').val();

    $("#error-message").html("").hide();

    if (cardNumber.trim() == "") {
        valid = false;
    }

    if (month.trim() == "") {
        valid = false;
    }
    if (year.trim() == "") {
        valid = false;
    }
    if (cvc.trim() == "") {
        valid = false;
    }

    if (valid == false) {
        // $("#error-message").html("All Fields are required").show();
        alert("Incorrect card fields!");
    }

    return valid;
}

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        $('#call_success .call-success').html(response.error.message);
        popNext("#call_success");
    } else {
        $('#p_prldr').show();
        const thisForm = $('.stripe_pay');
        //get token id
        const token = response['id'];
        //insert the token into the form
        thisForm.append("<input type='hidden' name='token' value='" + token + "' />");

        const formSur = thisForm.serialize();

        $.ajax({
            url: thisForm.attr('action'),
            data: formSur,
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#p_prldr').hide();

                $('#call_success .call-success').html(data.message);
                popNext("#call_success");
            }
        });
    }
}

function validationCallStripe(form) {
    const thisForm = $(form);
    const formSur = thisForm.serialize();
    const new_form = new FormData(thisForm[0]);
    const pub_key = $('input[name="stripe_public_key"]').val();

    //set your publishable key
    Stripe.setPublishableKey(pub_key);

    const valid = cardValidation();

    if (valid == true) {
        $("#submit-btn").hide();
        $("#loader").css("display", "inline-block");

        Stripe.createToken({
            number: $('#card-number').val(),
            cvc: $('#cvc').val(),
            exp_month: $('#month').val(),
            exp_year: $('#year').val()
        }, stripeResponseHandler);
    }
}


function validationCall(form) {
    const thisForm = $(form);
    const formSur = thisForm.serialize();
    const new_form = new FormData(thisForm[0]);
    const type_pay = $('input[name="type_pay"]:checked').val();

    $.ajax({
        url: thisForm.attr('action'),
        data: new_form,
        method: 'POST',
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                if (data.bank) {
                    $('#call_success .call-success').html(data.message);
                    popNext("#call_success");
                } else {
                    location.replace(data.redirect);
                }
            } else {
                console.log('dd');
                $('#call_success .call-success').html(data.message);
                popNext("#call_success");
            }

            /*
            if ( data.trim() == 'true') {
                thisForm.trigger("reset");
                popNext("#call_success");
            }
            else {
               thisForm.trigger('reset');
            }

            */
        }
    });
}


//input type media

const stackFiles = [];
/*Push files in the stack */
jQuery(document).delegate('.aditional_file', 'change', function () {
    const curr = jQuery(this);
    const stackName = jQuery(this).attr('id');

    if (typeof stackFiles[stackName] === 'undefined') {
        stackFiles[stackName] = [];
    }

    if (jQuery(this)[0].files.length > 0) {
        for (let i = 0; i < jQuery(this)[0].files.length; i++) {
            stackFiles[stackName][stackFiles[stackName].length] = curr[0].files[i];
        }
    }

    jQuery(this).closest('ul').find('li').each(function () {
        if (!jQuery(this).hasClass('placeholder')) {
            jQuery(this).remove();
        }
    });

    stackFiles[stackName].forEach(function (item) {
        const reader = new FileReader();
        const fileTypes = ['jpg', 'jpeg', 'png'];  //acceptable file types

        reader.onload = function (e) {
            const extension = item.name.split('.').pop().toLowerCase(),  //file extension from input file
                isSuccess = fileTypes.indexOf(extension) > -1;
            let urlLink = '';
            let fileName = '';

            if (isSuccess) {
                urlLink = e.target.result;
                fileName = '';
            } else {
                urlLink = '';
                fileName = item.name;
            }

            const insert = '<li><div class="con" style="background-image: url(' + urlLink + '); background-position:center; background-size: cover"><div class="deleter"> <i class="far fa-trash-alt"></i> <p> DELETE </p></div><div class="filename">' + fileName + '</div></div></li>';
            curr.closest('ul').append(insert);
        };

        reader.readAsDataURL(item);
    })
});


/*END PUSH files*/

/*Delete photos in stack*/
jQuery(document).delegate('li .deleter', 'click', function (e) {
    e.preventDefault();
    const currFile = jQuery(this).closest('.con').find('.filename').text();
    const currStack = jQuery(this).closest('ul').find('li.placeholder input[type=file]').attr('id');
    let currIndex = -1;

    jQuery(this).closest('li').hide(300, function () {
        jQuery(this).remove();
    });

    stackFiles[currStack].forEach(function (item, index) {
        if (item.name == currFile) {
            currIndex = index;
        }
    });
    if (currIndex > -1) {
        stackFiles[currStack].splice(currIndex, 1);
    }
});

//Forms with media files
function validationCallMedia(targetForm) {
    $('#p_prldr').show();
    const form = $(targetForm);
    const formData = new FormData();
    const stackCount = form.serializeArray();

    console.log(stackCount);
    for (let i = 0; i < stackCount.length; i++) {
        formData.append(stackCount[i].name, stackCount[i].value);
    }

    form.find('input[type=file]').each(function () {
        const curr = $(this).attr('id');

        if (typeof stackFiles[curr] === 'undefined') {

        } else {
            stackFiles[curr].forEach(function (item, index) {
                formData.append(curr + "[]", item, item.name);
            });
        }
    });
    console.log(formData);

    $.ajax({
        url: form.attr('action'),
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        method: 'POST',
        success: function (data) {
            console.log(data);
            $('#p_prldr').hide();

            if (data.success === true) {
                $('#call_success .call-success').html(data.message);
                form.trigger("reset");
                popNext("#call_success");
                if (data.redirect) {
                    location.replace(data.redirect);
                } else {
                    setTimeout(location.reload(), 5000);
                }
            } else {
                $('#call_success .call-success').html(data.message);
                popNext("#call_success");
            }
        }
    });
}

/*Register action*/
function validationCallReg(form) {
    $('#p_prldr').show();
    const thisForm = $(form);
    const formSur = thisForm.serialize();

    $.ajax({
        url: thisForm.attr('action'),
        data: formSur,
        dataType: 'json',
        method: 'POST',
        success: function (data) {
            console.log(data);
            $('#p_prldr').hide();

            if (data.success === true) {
                $('#call_success .call-success').html(data.message);
                thisForm.trigger("reset");
                popNext("#call_success");
                setTimeout(location.reload(), 2000);
            } else {
                $('#call_success .call-success').html(data.message);
                popNext("#call_success");
            }
        }
    });
}

/*Add donation form*/
function validationCallAddDonation(form) {
    const thisForm = $(form);
    const formSur = thisForm.serialize();

    $.ajax({
        url: thisForm.attr('action'),
        data: formSur,
        dataType: 'json',
        method: 'POST',
        success: function (data) {
            if (data.success === true) {
                $('#call_success .call-success').html(data.message);
                thisForm.trigger("reset");
                popNext("#call_success");
            } else {
                $('#call_success .call-success').html(data.message);
                popNext("#call_success");
            }
        }
    });
}


/*Register action end*/
function validationCallAuth(form) {
    const thisForm = $(form);
    const formSur = thisForm.serializeArray();

    $.ajax({
        url: thisForm.attr('action'),
        data: formSur,
        dataType: 'json',
        method: 'POST',
        success: function (data) {
            console.log(data);
            if (data.success == true) {
                $('#call_success .call-success').html(data.message);
                thisForm.trigger("reset");
                popNext("#call_success");
                setTimeout(location.reload(), 2000);
            } else {
                $('#call_success .call-success').html(data.message);
                popNext("#call_success");
            }
        }
    });
}

function validationCallForRepeater(form) {
    const thisForm = $(form);
    const formSur = thisForm.serializeArray();
    console.log(formSur);

    $.ajax({
        url: thisForm.attr('action'),
        data: formSur,
        dataType: 'json',
        method: 'POST',
        success: function (data) {

            console.log(data);
            if (data.success == true) {
                $('#call_success .call-success').html(data.message);
                thisForm.trigger("reset");
                popNext("#call_success");
                setTimeout(location.reload(), 2000);

            } else {
                $('#call_success .call-success').html(data.message);
                popNext("#call_success");
            }
        }
    });
}

function validationCallForDonationSearch(form) {
    $('#p_prldr').show();
    const thisForm = $(form);
    const formSur = thisForm.serializeArray();
    console.log(formSur);

    $.ajax({
        url: thisForm.attr('action'),
        data: formSur,
        //dataType: 'json',
        method: 'POST',
        success: function (data) {
            console.log(data);
            $('#p_prldr').hide();
            if (data) {
                $('.sortable-list').html(data);
            }
        }
    });
}

function validationCallForGroupSearchFront(form) {
    $('#p_prldr').show();
    const thisForm = $(form);
    const formSur = thisForm.serializeArray();

    $.ajax({
        url: thisForm.attr('action'),
        data: formSur,
        //dataType: 'json',
        method: 'POST',
        success: function (data) {
            console.log(data);
            $('#p_prldr').hide();
            if (data) {
                $('.append_group').html(data);
            }
        }
    });
}

function validationCallForSubGroupSearchFront(form) {
    $('#p_prldr').show();
    const thisForm = $(form);
    const formSur = thisForm.serializeArray();

    $.ajax({
        url: thisForm.attr('action'),
        data: formSur,
        //dataType: 'json',
        method: 'POST',
        success: function (data) {
            console.log(data);
            $('#p_prldr').hide();
            if (data) {
                $('.append_sub_group').html(data);
            }
        }
    });
}

function validationCallForGroupSearchBack(form) {
    $('#p_prldr').show();
    const thisForm = $(form);
    const formSur = thisForm.serializeArray();

    $.ajax({
        url: thisForm.attr('action'),
        data: formSur,
        //dataType: 'json',
        method: 'POST',
        success: function (data) {
            // console.log(data);
            $('#p_prldr').hide();
            if (data) {
                $('.append_group_back tbody').html(data);
            }
        }
    });
}

function validationCallForSubGroupSearchBack(form) {
    $('#p_prldr').show();
    const thisForm = $(form);
    const formSur = thisForm.serializeArray();

    $.ajax({
        url: thisForm.attr('action'),
        data: formSur,
        //dataType: 'json',
        method: 'POST',
        success: function (data) {
            // console.log(data);
            $('#p_prldr').hide();
            if (data) {
                $('.append_sub_group_back tbody').html(data);
            }
        }
    });
}

function validationCallSimple(form) {
    const thisForm = $(form);
    const formSur = thisForm.serialize();

    $.ajax({
        url: thisForm.attr('action'),
        data: formSur,
        method: 'POST',
        success: function (data) {
            if (data.trim() == 'true') {
                thisForm.trigger("reset");
                popNext("#call_success");
            } else {
                thisForm.trigger('reset');
            }
        }
    });
}

function validationCallGroups(form) {
    $('#p_prldr').show();
    const thisForm = $(form);
    const formSur = thisForm.serialize();
    const formData = new FormData(thisForm[0]);

    $.ajax({
        url: thisForm.attr('action'),
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        method: 'POST',
        success: function (data) {
            console.log(data);
            $('#p_prldr').hide();

            if (data.success === true) {
                $('#call_success .call-success').html(data.message);
                thisForm.trigger("reset");
                popNext("#call_success");
                setTimeout(location.reload(), 2000);
            } else {
                $('#call_success .call-success').html(data.message);
                popNext("#call_success");
            }
        }
    });
}

function popNext(popupId) {
    $.fancybox.open({
        src: popupId,
        type: 'inline',
        opts: {
            afterClose: function () {
                $('form').trigger("reset");
            }
        }
    });
}

/*маска на инпуте*/
function Maskedinput() {
    if ($('.tel-mask')) {
        $('.tel-mask').mask('+9 (999) 999-99-99');
    }

    if ($('.mask-number')) {
        $('.mask-number').mask('9999 - 9999 - 9999 - 9999');
    }

    if ($('.mask-date')) {
        $('.mask-date').mask('99 / 99');
    }
}

$(document).ready(function () {
    jQuery('input[name=monthly_payment]').change(function (e) {

        if (jQuery(this).prop('checked') == true) {
            jQuery('.choose-month').slideDown(300);
        } else {
            $("#months").val(1).change();
            jQuery('.choose-month').slideUp(300);
        }
    });

    jQuery('#months').on('change', function (e) {
        const multiplier = parseFloat(jQuery('p.multiplier').text());
        const months_count = $("option:selected", this).val();
        const start_sum = parseFloat(jQuery('#summ').val());
        const sum = start_sum * months_count;
        const outSum = sum * multiplier;

        if (months_count > 1) {
            jQuery('.periods_desc').slideDown(300);
        } else {
            jQuery('.periods_desc').slideUp(300);
        }

        jQuery('.month_pay_summ').text(sum);
        jQuery('.out_summ').text(outSum.toFixed(2));
    });

    jQuery('#summ').on('keyup', function (e) {
        let sum = 0;
        let monthSum = 0;
        const multiplier = parseFloat(jQuery('p.multiplier').text());
        const startSum = parseFloat(jQuery(this).val());
        const monthsCount = $("option:selected", '#months').val();

        if (monthsCount > 1) {
            sum = startSum * monthsCount;
            monthSum = startSum * monthsCount;
        } else {
            sum = startSum;
        }

        if (isNaN(sum)) {
            sum = 0;
        }
        let outSum = sum * multiplier;

        jQuery('.out_summ').text(outSum.toFixed(2));
        jQuery('.month_pay_summ').text(monthSum.toFixed(2));
    });


    jQuery('select[name=valute]').change(function (e) {
        const currency = $("option:selected", this).text();
        const curValue = $(this).val();
        const curMinAmount = $('.currency_select input[name=summ]').attr('data-min_' + curValue);
        $('.currency_select input[name=summ]').attr('min', curMinAmount);

        jQuery('.out_currency').text(currency);

        if (jQuery('input[name=monthly_payment]').prop('checked') === true && jQuery(this).val() === 'ils') {
            jQuery('.choose-month').slideDown(300);
        } else {
            jQuery('.choose-month').slideUp(300);
        }

        if (jQuery(this).val() === 'ils') {
            $('.money-block .checkboxer').slideDown(300);
        } else {
            $('.money-block .checkboxer').slideUp(300);
        }
    });

    validate('.former', {submitFunction: validationCall});
    validate('.register', {submitFunction: validationCallGroups});
    validate('.register_new_member', {submitFunction: validationCallReg});

    /*creation*/
    validate('.register_new_project', {submitFunction: validationCallMedia});
    validate('.register_new_users', {submitFunction: validationCallReg});
    validate('.register_new_organization', {submitFunction: validationCallReg});
    validate('.register_new_group', {submitFunction: validationCallReg});
    validate('.register_new_user', {submitFunction: validationCallReg});

    /*editing*/
    validate('.edit_project', {submitFunction: validationCallMedia});
    validate('.edit_users', {submitFunction: validationCallReg});
    validate('.edit_donation', {submitFunction: validationCallReg});
    validate('.edit_organization', {submitFunction: validationCallReg});
    validate('.edit_group', {submitFunction: validationCallReg});
    validate('.edit_company', {submitFunction: validationCallReg});
    validate('.edit_my_account', {submitFunction: validationCallReg});

    validate('.project_payment', {submitFunction: validationCallReg});
    validate('.matching_coeff', {submitFunction: validationCallReg});

    validate('#call-popup .contact-form', {submitFunction: validationCall});
    Maskedinput();

    validate('#create-new form', {submitFunction: validationCallSimple});
    validate('#login-form form', {submitFunction: validationCallAuth});

    //Group and Sub group

    validate('#create-new-group form', {submitFunction: validationCallGroups});
    validate('#create-new-sub-group form', {submitFunction: validationCallGroups});
    validate('#create-new-matching form', {submitFunction: validationCallGroups});

    validate('#edit-group form', {submitFunction: validationCallGroups});
    validate('#edit-sub-group form', {submitFunction: validationCallGroups});
    validate('#edit-matching form', {submitFunction: validationCallGroups});
    /*for repeater*/

    validate('.add_org', {submitFunction: validationCallForRepeater});
    validate('.add_group', {submitFunction: validationCallForRepeater});
    validate('.add_packets', {submitFunction: validationCallForRepeater});

    //front-searches
    validate('.search_donation_front', {submitFunction: validationCallForDonationSearch});
    validate('.search_group_front', {submitFunction: validationCallForGroupSearchFront});
    validate('.search_sub_group_front', {submitFunction: validationCallForSubGroupSearchFront});
    //back-searches
    validate('.search_group_back', {submitFunction: validationCallForGroupSearchBack});
    validate('.search_sub_group_back', {submitFunction: validationCallForSubGroupSearchBack});
    /*Add new donation form*/
    validate('.add_new_donation', {submitFunction: validationCallAddDonation});

    /*Stripe payment*/
    validate('.stripe_pay', {submitFunction: validationCallStripe});

    $('.loadblog').on('click', function (e) {
        e.preventDefault();

        const data = {
            'action': 'loadmore_blog',
            'query': true_posts,
            'page': current_page
        };

        $.ajax({
            url: $(this).attr('href'),
            data: data,
            type: 'POST',
            success: function (data) {
                console.log(data);

                if (data) {
                    $('.list-gift-mass').append(data);
                    current_page++;
                    if (current_page == max_pages) $(".loadblog").remove();

                } else {
                    $('.loadblog').remove();
                }
            }
        });
    })
});