$(document).ready(function () {
    const mob = window.matchMedia("(max-width: 460px)");

    function More() {
        if (mob.matches) {
            $('.ham').click(function () {
                if (this.classList.contains('active')) {
                    $('body[dir=ltr] .menu_wrapper_new').css('top', '0px');
                    $('body[dir=rtl] .menu_wrapper_new').css('top', '0px');
                } else {
                    $('body[dir=ltr] .menu_wrapper_new').css('top', '-100%');
                    $('body[dir=rtl] .menu_wrapper_new').css('top', '-100%');
                }
            });

        } else {
            $('.heder_ico').on('click', function () {
                if (this.classList.contains('active_mnu')) {
                    $('body[dir=rtl] .menu_wrapper_new').css('display', 'block');
                    $('body[dir=ltr] .menu_wrapper_new').css('display', 'block');
                    setTimeout(function () {
                        $('body[dir=rtl] .menu_new').css('left', '-30px',);
                        $('body[dir=ltr] .menu_new').css('right', '-15px');
                    }, 100);
                } else {
                    $('body[dir=rtl] .menu_new').css('left', '-250px');
                    $('body[dir=ltr] .menu_new').css('right', '-250px');
                }
                // $('body[dir=ltr] .menu_new').css('right', '0px');

            });
            $('.ico_close').on('click', function () {
                $('.heder_ico').removeClass('active_mnu');
                // $('.heder_ico').addClass();
                $('body[dir=rtl] .menu_new').css('left', '-250px');
                $('body[dir=ltr] .menu_new').css('right', '-250px');
                setTimeout(function () {
                    $('body[dir=rtl] .menu_wrapper_new').css('display', 'none');
                    $('body[dir=ltr] .menu_wrapper_new').css('display', 'none');
                }, 2000);
            });
        }
    }

    More();

    $("a.popupbox-video").fancybox();
    $("a.arrow_sheer").fancybox({
        'hideOnContentClick': true,
        'touch': false
    });

    function slickList() {
        const indexItem = $('.proj_item').length;
        if (indexItem <= 3) {
            $('.slick-track').addClass('slick-track-1');
            $('.slick-list').addClass('slick-list-1');
            $('.list-items').addClass('list-items-1');
            $('.slick-slide').addClass('slick-slide-1');
        }
    }


    $('.slick-item').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '<button type="button" class="slick-prev slick-arrow"><i class="fas fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next slick-arrow"><i class="fas fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 1050,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    slickList();
});

const TabsBlock = document.querySelector('.tabs_block');
if (TabsBlock != null) {
    TabsBlock.addEventListener('click', Tabs);

    function Tabs(event) {
        // console.log(event);
        const dataTab = event.target.getAttribute('data-tads');
        const tabBody = document.getElementsByClassName('tabs_text');
        const tabH = document.getElementsByClassName('tabs_btn');
        for (let k = 0; k < tabH.length; k++) {
            tabH[k].classList.remove('active_tab');
        }
        event.target.classList.add('active_tab');
        for (let i = 0; i < tabBody.length; i++) {
            if (dataTab == i) {
                tabBody[i].style.display = 'block';
            } else {
                tabBody[i].style.display = 'none';
            }
        }
    }
}

$('.slider_new_design').slick({
    autoplay: true,
});

$(document).on('keyup', '.textarea_lich', function () {
    const len = $(this).val().length;
    let max = 75;
    max -= len;
    $('.sub-text').html(max + '  ' + 'characters left');
});

$('.input_block .view_group span').on('click', function (e) {
    const el = $(this);
    const view = el.attr('data-view');

    $('.view_group span').removeClass('active');

    if (view == 'list' && !el.hasClass('active')) {
        el.addClass('active');
        $('.append_sub_group').removeClass('conteiner-group');
        $('.append_sub_group').addClass('conteiner-group-list');

    } else if (view == 'grid' && !el.hasClass('active')) {
        el.addClass('active');
        $('.append_sub_group').removeClass('conteiner-group-list');
        $('.append_sub_group').addClass('conteiner-gropu');
    }
});

$('.input_block .view_group_1 span').on('click', function (e) {
    const el = $(this);
    const view = el.attr('data-view');

    $('.view_group_1 span').removeClass('active');

    if (view == 'list' && !el.hasClass('active')) {
        el.addClass('active');
        $('.append_group').removeClass('conteiner-group');
        $('.append_group').addClass('conteiner-group-list');

    } else if (view == 'grid' && !el.hasClass('active')) {
        el.addClass('active');
        $('.append_group').removeClass('conteiner-group-list');
        $('.append_group').addClass('conteiner-gropu');
    }
});

