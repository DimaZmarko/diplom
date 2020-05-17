$(document).ready(function () {
    $("select").select2();

    if ($('.first-wrap').length) {

        setTimeout(function () {
            $('.first-wrap .texter').addClass('active');
        }, 500)
    }

    $('.hidden-opener').on('click', function (e) {
        e.preventDefault();

        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $('nav').slideUp(300, function () {
            });
        } else {
            $(this).addClass('active');
            $('nav').slideDown(300, function () {
            });
        }
    });

    $('.acordion-wrap .named').on('click', function (e) {
        e.preventDefault();

        if ($(this).closest('.line').hasClass('active')) {
            $(this).closest('.line').removeClass('active');
            $(this).closest('.line').find('.hidden').slideUp(300);

        } else {
            $('.acordion-wrap .line.active').removeClass('active').find('.hidden').slideUp(300, function () {
            });
            $(this).closest('.line').addClass('active');
            $(this).closest('.line').find('.hidden').slideDown(300);
        }
    });

    $('.list-items .item').on('mouseover', function () {
        const curr = $(this).index();
        $(this).closest('.list-items').addClass('active' + curr);
    });

    $('.list-items .item').on('mouseout', function () {
        const curr = $(this).index();
        $(this).closest('.list-items').removeClass('active' + curr);
    });

    $('.tab-about .navigate-tabs a').on('click', function (e) {
        e.preventDefault();

        const curr = $(this);
        const eq = $(this).closest('li').index();

        if (!curr.hasClass('active')) {

            $('.tab-about .navigate-tabs li a.active').removeClass('active');
            curr.addClass('active');

            $('.content-tab ul li.active').slideUp(300, function () {
                $(this).removeClass('active');
            });

            $('.content-tab ul li').eq(eq).slideDown(300, function () {
                $(this).addClass('active');
            });
        }
    });

    $('.swich-part input[name=type_pay]').on('change', function () {
        const curr = $(this).val();

        $('.card-info').each(function () {
            if ($(this).hasClass(curr)) {
                $(this).slideDown(300);
            } else {
                $(this).slideUp(300);
            }
        })
    });

    $('select[name="permission"]').on('change', function () {
        const val = $('option:selected', this).val();

        if (val == 'project_editor') {
            $('.project_editor').slideDown(300);
            $('.org_editor').slideUp(300);
        } else if (val == 'is_admin') {
            $('.org_editor').slideDown(300);
            $('.project_editor').slideUp(300);
        } else {
            $('.project_editor').slideUp(300);
            $('.org_editor').slideUp(300);
        }
    });


    $("#tabs").tabs();


    $("#export_user_donations").click(function (e) {
        e.preventDefault();
        $('#p_prldr').show();
        const user_id = $(this).attr('data-user_id');
        const own_donations = $(this).attr('data-own_donations');
        const data = {
            'action': 'excel_donation',
            'current_user': user_id,
            'own_donations': own_donations
        };
        const tabOpen = window.open("about:blank", 'newtab');

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                $('#p_prldr').hide();
                const url = data.link;

                if (data.success) {
                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });

                    tabOpen.location = url;
                    setTimeout(function () {
                        tabOpen.close();
                    }, 1);

                } else {
                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                }
            }
        });
    });

    $("#add_group").click(function (e) {
        e.preventDefault();

        $.fancybox.open({
            src: '#create-new-sub-group',
            type: 'inline',
            opts: {
                afterClose: function () {
                    $('form').trigger("reset");
                }
            }
        });
    });

    $("#add_org").click(function (e) {
        e.preventDefault();

        $.fancybox.open({
            src: '#create-new-group',
            type: 'inline',
            opts: {
                afterClose: function () {
                    $('form').trigger("reset");
                }
            }
        });
    });

    $("#add_matching").click(function (e) {
        e.preventDefault();

        $.fancybox.open({
            src: '#create-new-matching',
            type: 'inline',
            opts: {
                afterClose: function () {
                    $('form').trigger("reset");
                }
            }
        });
    });

    $('.edit_matching').on('click', function (e) {
        e.preventDefault();

        const match_id = $(this).attr('data-match_id');

        if (match_id) {
            const data = {
                'action': 'append_edit_matching',
                'post_id': match_id
            };

            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: data,
                type: 'POST',
                // dataType: 'json',
                success: function (data) {
                    if (data) {
                        $('.edit_matching_body').html(data);
                        $.fancybox.open({
                            src: '#edit-matching',
                            type: 'inline',
                            opts: {
                                afterClose: function () {
                                    $('form').trigger("reset");
                                }
                            }
                        });
                    }
                }
            });
        }
    });

    $('.edit_group').on('click', function (e) {
        e.preventDefault();

        const row_id = $(this).attr('data-row_id');
        const row_name = $(this).attr('data-row_name');
        const post_id = $(this).attr('data-post_id');

        if (post_id) {
            const data = {
                'action': 'append_edit_group',
                'project_id': post_id,
                'row_id': row_id,
                'row_name': row_name
            };

            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: data,
                type: 'POST',
                //dataType: 'json',
                success: function (data) {

                    if (data) {
                        $('.edit_group_body').html(data);
                        $.fancybox.open({
                            src: '#edit-group',
                            type: 'inline',
                            opts: {
                                afterClose: function () {
                                    $('form').trigger("reset");
                                }
                            }
                        });
                    }
                }
            });
        }
    });

    $('.edit_sub_group').on('click', function (e) {
        e.preventDefault();

        const row_id = $(this).attr('data-row_id');
        const row_name = $(this).attr('data-row_name');
        const post_id = $(this).attr('data-post_id');

        if (row_id) {
            const data = {
                'action': 'append_edit_sub_group',
                'project_id': post_id,
                'row_id': row_id,
                'row_name': row_name
            };

            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: data,
                type: 'POST',
                //dataType: 'json',
                success: function (data) {

                    //console.log(data);
                    if (data) {

                        $('.edit_sub_group_body').html(data);
                        $('.selection_block').select2();
                        $.fancybox.open({
                            src: '#edit-sub-group',
                            type: 'inline',
                            opts: {
                                afterClose: function () {
                                    $('form').trigger("reset");
                                }
                            }
                        });
                    }
                }
            });
        }
    });

    $("#add_packets").click(function (e) {
        e.preventDefault();
        var company = $(this).attr('data-company');
        var post_id = $(this).attr('data-post_id');
        var data = {
            'action': 'add_packets_repeater',
            'company': company,
            'post_id': post_id
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            type: 'POST',
            success: function (data) {

                if (data) {
                    $('.add_packets .table-block tbody').append(data);

                } else {

                }

            }
        });
    });

    //DELETE REPEATER FIELDs ACTION
    $(document).on('click', '.delete_repeater', function (e) {
        e.preventDefault();
        var row_id = parseInt($(this).attr('data-row_id'));
        var row_name = $(this).attr('data-row_name');
        var post_id = $(this).attr('data-post_id');

        row_id = row_id + 1;
        if (row_id) {

            console.log('ready');
            var data = {
                'action': 'delete_repeater_all',
                'row_id': row_id,
                'row_name': row_name,
                'post_id': post_id
            };

            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: data,
                type: 'POST',
                dataType: 'json',
                success: function (data) {

                    if (data.success) {

                        console.log(data.message);

                    }
                }
            });
        }

        $(this).closest('tr').remove();

    });

    // get_donation_field
    $(".get_donation_field").on('change', function (e) {

        e.preventDefault();
        var project_id = $(this).val();

        if (project_id != '0') {

            var data = {
                'action': 'get_donation_field',
                'project_id': project_id
            };

            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: data,
                type: 'POST',
                success: function (data) {
                    console.log(data);

                    if (data) {
                        $('.add_new_donation .body-part.append').html(data);
                        $("select").select2();
                        $('.add_new_donation .body-part.append').slideDown();
                        $('.submiter').slideDown();

                    } else {

                    }
                }
            });
        } else {
            $('.submiter').slideUp();
            $('.add_new_donation .body-part.append').slideUp();
        }
    });

    $('.sort-parts .view span').on('click', function (e) {

        var el = $(this);
        var view = el.attr('data-view');

        $('.view span').removeClass('active');

        if (view == 'list' && !el.hasClass('active')) {
            el.addClass('active');
            $('.sortable-list').removeClass('conteiner-gifts');
            $('.sortable-list').addClass('conteiner-gifts-list');

        } else if (view == 'grid' && !el.hasClass('active')) {
            el.addClass('active');
            $('.sortable-list').removeClass('conteiner-gifts-list');
            $('.sortable-list').addClass('conteiner-gifts');
        }

    });

    $('.sort-parts .sort span').on('click', function (e) {

        var el = $(this);

        $('#p_prldr').show();
        var post_id = el.attr('data-post_id');
        var sort = el.attr('data-sort');
        var group = el.attr('data-group');
        var org = el.attr('data-org');

        $('.sort span').removeClass('active');
        var data = {
            'action': 'sort_donation',
            'post_id': post_id,
            'sort': sort,
            'group': group,
            'org': org
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            type: 'POST',
            success: function (data) {
                //console.log(data);
                $('#p_prldr').hide();
                if (data) {

                    el.addClass('active');
                    $('.sortable-list').html(data);

                } else {

                }
            }
        });

    });

    $('body').delegate('.load_more_donations', 'click', function (e) {

        e.preventDefault();
        $('#p_prldr').show();
        var this_butt = $(this);
        var page = this_butt.attr('data-page');
        var post_id = this_butt.attr('data-post_id');
        // var post_id = $(this).attr('data-post_id');
        var data = {
            'action': 'load_more_donations',
            'page': page,
            'post_id': post_id
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            type: 'POST',
            success: function (data) {

                //console.log(data);
                $('#p_prldr').hide();
                this_butt.parent().remove();
                if (data) {
                    $('.sortable-list').append(data);

                } else {

                }

            }
        });
    });
    $('body').delegate('.load_more_sub_groups', 'click', function (e) {

        e.preventDefault();
        $('#p_prldr').show();
        var this_butt = $(this);
        var post_id = this_butt.attr('data-post_id');
        var offset = this_butt.attr('data-offset');
        var nonce = this_butt.attr('data-nonce');

        var data = {
            'action': 'load_more_sub_groups',
            'post_id': post_id,
            'offset': offset,
            'nonce': nonce
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            //dataType: 'json',
            type: 'POST',
            success: function (data) {

                console.log(data);
                $('#p_prldr').hide();
                this_butt.parent().remove();
                if (data) {
                    $('.append_sub_group').append(data);

                } else {

                }

            }
        });
    });

    $('body').delegate('.load_more_groups', 'click', function (e) {

        e.preventDefault();
        $('#p_prldr').show();
        var this_butt = $(this);
        var post_id = this_butt.attr('data-post_id');
        var offset = this_butt.attr('data-offset');
        var nonce = this_butt.attr('data-nonce');

        var data = {
            'action': 'load_more_groups',
            'post_id': post_id,
            'offset': offset,
            'nonce': nonce
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            //dataType: 'json',
            type: 'POST',
            success: function (data) {

                console.log(data);
                $('#p_prldr').hide();
                this_butt.parent().remove();
                if (data) {
                    $('.append_group').append(data);

                } else {

                }

            }
        });
    });

    $('.bank_transfer_butt').on('click', function (e) {
        e.preventDefault();


        $.fancybox.open({
            src: '#bank-form',
            type: 'inline',
            opts: {
                afterClose: function () {

                }
            }
        });

    });
    /* $('.submit_bank_transfer').on('click', function (e) {
         $('input[name="bank_transfer"]').val(1);

         $('.former').submit();
         $.fancybox.close();
     });*/

//Change the payment forms on CReate Gift Page
    $(document).delegate('.radio input[type=radio]', 'change', function (e) {
        $('.hidden').slideUp();
        var val = $(this).val();
        $('*[data-method=' + val + ']').slideDown();
    });

    //reset password form
    $('input[name=reset_pass]').on('change', function (e) {

        if ($(this).prop('checked')) {

            $('.reset_pass input').removeAttr('disabled');
            $('.reset_pass').slideDown();

        } else {

            $('.reset_pass input').attr('disabled', 'disabled');
            $('.reset_pass').slideUp();
        }

    });
    //project bonus
    $('input[name=bonus_is_visible]').on('change', function (e) {

        if ($(this).prop('checked')) {


            //$('.bonus_summ input').removeAttr('disabled');
            $('.bonus_sum').slideDown();

        } else {


            //$('.bonus_sum input').attr('disabled', 'disabled');
            $('.bonus_sum').slideUp();
        }

    });

    $('input[name=pay_to_another_project]').on('change', function (e) {

        if ($(this).prop('checked')) {

            //$('.another_project').removeAttr('disabled');
            $('.another_project').slideDown();

        } else {

            //$('.another_project').attr('disabled', 'disabled');
            $('.another_project').slideUp();
        }

    });

    $('.currency-block input[type="checkbox"]').on('change',
        function () {

            var el = $(this);
            var open = el.attr('data-open');

            if (el.prop('checked')) {
                $('.' + open).slideDown();
                $('.' + open + ' input').removeAttr('disabled');
            } else {
                $('.' + open + ' input').attr('disabled', 'disabled');
                $('.' + open).slideUp();
            }

        });

    $('.currency-block input[type="radio"]').on('change',
        function () {

            var el = $(this);
            var open = el.attr('data-open');
            var parent = el.closest('div.card_method');

            $(parent).children('.body-part').slideUp();
            $(parent).children('.body-part input').attr('disabled', 'disabled');

            if (el.prop('checked')) {
                $('.' + open + ' input').removeAttr('disabled');
                $('.' + open).slideDown();
            }
        });

    $(".currency_select select").on('change', function (e) {

        e.preventDefault();
        var cur_code = $(this).val();
        var post_id = $('input[name="post_id"]').val();

        if (cur_code != '') {

            var data = {
                'action': 'get_payment_methods',
                'cur_code': cur_code,
                'post_id': post_id
            };

            //console.log(data);
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: data,
                type: 'POST',
                success: function (data) {
                    //console.log(data);

                    if (data) {
                        $('.radio_append').html(data);

                    } else {

                    }
                }
            });
        } else {
        }
    });
    $('.hold_donation').on('click', function (e) {
        e.preventDefault();
        var donation_id = $(this).attr('data-postid');
        var data = {
            'action': 'hold_donation',
            'post_id': donation_id
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                //console.log(data);

                if (data.success) {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                    location.reload();

                } else {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                }
            }
        });

    });
    $('.delete_matching').on('click', function (e) {
        e.preventDefault();
        var match_id = $(this).attr('data-match_id');
        var data = {
            'action': 'delete_matching',
            'post_id': match_id
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                //console.log(data);

                if (data.success) {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                    location.reload();

                } else {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                }
            }
        });

    });
    $('.delete_user').on('click', function (e) {
        e.preventDefault();
        var user_id = $(this).attr('data-post_id');
        var data = {
            'action': 'my_delete_users',
            'user_id': user_id
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                //console.log(data);

                if (data.success) {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                    location.reload();

                } else {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                }
            }
        });

    });
    $('.back_donation').on('click', function (e) {
        e.preventDefault();
        var donation_id = $(this).attr('data-postid');
        var data = {
            'action': 'back_donation',
            'post_id': donation_id
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                //console.log(data);

                if (data.success) {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                    location.reload();

                } else {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                }
            }
        });

    });

    $('.delete.published').on('click', function (e) {
        e.preventDefault();
        var project_id = $(this).attr('data-post_id');
        var data = {
            'action': 'custom_move_to_draft',
            'post_id': project_id
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                //console.log(data);

                if (data.success) {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                    location.reload();

                } else {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                }
            }
        });

    });
    $('.delete.draft').on('click', function (e) {
        e.preventDefault();
        var project_id = $(this).attr('data-post_id');
        var data = {
            'action': 'custom_move_to_publish',
            'post_id': project_id
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                //console.log(data);

                if (data.success) {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                    location.reload();

                } else {

                    $('#call_success .call-success').html(data.message);
                    $.fancybox.open({
                        src: '#call_success',
                        type: 'inline',
                        opts: {
                            afterClose: function () {

                            }
                        }
                    });
                }
            }
        });

    });
    $('.copy_input input').keyup(function () {
        var copy_val = $(this).val();
        $('.target_input input').val(copy_val);
    });
});
