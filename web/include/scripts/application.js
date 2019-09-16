$(function () {

    // Simple router function
    //if ($("body.page-template-default")[0]){
    //    alert("page");
    //} else if ($("body.home")[0]){
    //    alert("index");
    //}

    // **********************************
    // *** Scrolla högst upp på sidan ***
    // **********************************
    $("#back-to-top").hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('#back-to-top').fadeIn("slow");
        } else {
            $('#back-to-top').fadeOut("slow");
        }
    });
    $('#back-to-top').click(function () {
        $('body,html').animate({ scrollTop: 0 }, 800);
        return false;
    });

    // ***************************************
    // *** Hamburger menu overlay function ***
    // ***************************************
    $(".burger-menu__button, .overlay").on("click", function () {
        $(".burger-dropdown__container").toggle();
        $(".overlay").toggle();
        $(".burger-menu__burger-icon").toggle();
        $(".burger-menu__close-icon").toggle();
    });

    // ************************************
    // *** Find on page scroll function ***
    // ************************************    
    $('a[href^="#"]').on("click", function () {
        var target = $(this.hash);
        if (target.length) {
            // Animate target
            $('html,body').animate({ scrollTop: target.offset().top }, 1000);
            // Add class for highlight the text
            $(target).addClass("content-highlight");
            // Wait 1.5 s and then remove the highlight class
            setTimeout(function () {
                $(target).removeClass("content-highlight");
            }, 1500);
            return false;
        }
    });



    // *****************************
    // *** Fix fixed css for IE  ***
    // *****************************    
    if ($("body.page-template-default")[0]) {
        $(window).scroll(debounce(function () {
            if ($('#content-nav-placeholder').length) {
                //var myContentPosition = Math.round($('#content-nav-placeholder').offset().top);
                var myPosition = Math.round($('#content-nav-placeholder').offset().top - $(window).scrollTop());
                if (myPosition < 30) {
                    $("#content-nav-container").addClass("rh-get-fixed-sticky");
                } else {
                    $("#content-nav-container").removeClass("rh-get-fixed-sticky");
                }
            }
        }, 10));
    }

});


// ************************************
// *** Javascript debounce function ***
// ************************************
//$('input.username').keypress(debounce(function (event) {
// do the Ajax request
//}, 250));
// https://remysharp.com/2010/07/21/throttling-function-calls
function debounce(fn, delay) {
    var timer = null;
    return function () {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            fn.apply(context, args);
        }, delay);
    };
}

// ************************************
// *** Javascript throttle function ***
// ************************************
//$('body').on('mousemove', throttle(function (event) {
//console.log('tick');
//}, 1000));
// https://remysharp.com/2010/07/21/throttling-function-calls
function throttle(fn, threshhold, scope) {
    threshhold || (threshhold = 250);
    var last,
        deferTimer;
    return function () {
        var context = scope || this;

        var now = +new Date,
            args = arguments;
        if (last && now < last + threshhold) {
            // hold on to it
            clearTimeout(deferTimer);
            deferTimer = setTimeout(function () {
                last = now;
                fn.apply(context, args);
            }, threshhold);
        } else {
            last = now;
            fn.apply(context, args);
        }
    };
}

/* Dropdown menu */
$(document).ready(function () {
    var scrollbarWidth = calculateScrollbarWidth(),
        isIDevice = isMobileDevice();

    var $body = $('body'),
        $menuMainButton = $('#rh-menu-main-button'),
        $menuCloseButton = $('#rh-menu-close-button'),
        $menuBody = $('#rh-menu-body');

    var $menuOverlay = $('.rh-menu__overlay'),
        $menuTopBar = $('.rh-menu__top-bar'),
        $menuBodyOffsetTop = $('.rh-menu__offset-top');

    var $menuBodySpaceTop = 30;

    // Check screen size
    $(window).resize(function () {
        // Update max-width for menu when windows resizing
        $menuTopBar.css({ "max-width": $menuBody.width() });
    });

    $(document).scroll(throttle(function () {
        $menuBody.css({ "top": $(window).scrollTop() });
    }, 100));

    $menuMainButton.click(function () {
        lockBodyScrolling(true, makeScrollBarOffset(true));

        $menuOverlay.toggleClass('rh-dp--show rh-dp--none');

        $menuTopBar
            .addClass('rh-pos--fixed')
            .css({
                "width": "100%",
                "max-width": $menuBody.width(),
                "padding-right": parseInt($menuTopBar.css('padding-right')) + scrollbarWidth
            });

        $menuBody
            .removeClass('rh-pos--fixed')
            .addClass('rh-pos--absolute')// Using the position "absolute" for iOS performance
            .css({ "top": $(window).scrollTop() })
            .addClass('rh-menu__body--show');

        $menuBodyOffsetTop.css({ "height": parseInt($menuTopBar.height() + $menuBodySpaceTop) });
    });

    $menuCloseButton.click(function () {
        lockBodyScrolling(false, makeScrollBarOffset(false));

        $menuOverlay.toggleClass('rh-dp--none rh-dp--show');

        $menuTopBar
            .removeClass('rh-pos--fixed')
            .css({
                "width": "",
                "max-width": "",
                "padding-right": "11.2px"
            }); //11.2px === .7em - Default

        $('#rh-menu-body').removeClass('rh-menu__body--show');
        hideMenuBody();

        $menuBodyOffsetTop.css({ "height": $menuBodySpaceTop });
    });

    var menuBodyHidden;
    function hideMenuBody() {
        clearTimeout(menuBodyHidden);
        menuBodyHidden = setTimeout(function () {
            $('#rh-menu-body').removeClass('rh-pos--absolute').addClass('rh-pos--fixed');
            console.log('I am here now');
        }, 600);

        /* clearTimeout(menuBodyHidden);
        menuBodyHidden = null; */
    }
    /* Common */
    function lockBodyScrolling(status, fnCallback) {
        //github.com/willmcpo/body-scroll-lock
        var disableBodyScroll = bodyScrollLock.disableBodyScroll,
            enableBodyScroll = bodyScrollLock.enableBodyScroll;

        var targetElement = document.querySelector(".rh-menu__body");

        if (status) {
            $body.addClass("rh-noscroll");
            isIDevice && disableBodyScroll(targetElement);
        } else {
            $body.removeClass("rh-noscroll");
            isIDevice && enableBodyScroll(targetElement);
        }

        typeof fnCallback === 'function' && fnCallback();
    }

    function makeScrollBarOffset(status) {
        if (status) {
            $body.css({ "margin-right": scrollbarWidth });
        } else {
            $body.css({ "margin-right": "" }); // Reset to default
        }
    }

    /* Helpers */
    function calculateScrollbarWidth() {
        return (window.innerWidth - document.body.clientWidth);
    }

    function isMobileDevice() {
        return !!navigator.platform && /iPad|iPhone|iPod/g.test(navigator.platform);
    }
});
