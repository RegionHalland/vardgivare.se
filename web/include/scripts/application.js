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

    // ****************************
    // *** Cookie notice accept ***
    // ****************************    
    $("#cookie-consent").on("click", function () {
        // set cookie with vanilla javascript function
        setCookie('cookie_notice_accepted', '1', 365);
        // Hide div with cookie notice text + button
        $("#cookie-notice").hide();
    });


    // **************************************
    // *** Javascript set cookie function ***
    // **************************************
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }


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

    if ($("body.page-template-default")[0]) {
        $(window).scroll(debounce(function () {

            var myPosition = Math.round($('#content-nav-placeholder').offset().top - $(window).scrollTop());
            var myFooterTop = Math.round($('#footer-top-placeholder').offset().top - $(window).scrollTop());
            var myContentNavBottom = Math.round($('#content-nav-bottom-placeholder').offset().top - $(window).scrollTop());
            console.log(myPosition, myFooterTop, myContentNavBottom);
            if (myPosition < 30) {
                if (myFooterTop < myContentNavBottom + 40) {
                    $(".content-nav__item").addClass("content-nav__item--tight");
                } else {
                    $("#content-nav-container").addClass("rh-get-fixed-sticky");
                    $(".content-nav__item--tight").removeClass("content-nav__item--tight");
                }
            } else {
                $("#content-nav-container").removeClass("rh-get-fixed-sticky");
                $(".content-nav__item--tight").removeClass("content-nav__item--tight");

            }
        }, 250));
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

/* Slide menu (from right) */
$(document).ready(function () {
    var scrollbarWidth = calculateScrollbarWidth(),
        isIDevice = isMobileDevice(),
        isSmallScreen = $(document).width() < 768;

    var $body = $('body'),
        $menuMainButton = $('#rh-menu-main-button'),
        $menuCloseButton = $('#rh-menu-close-button'),
        $menuBody = $('#rh-menu-body');

    var $menuOverlay = $('.rh-menu__overlay'),
        $menuTopBar = $('.rh-menu__top-bar'),
        $menuBodyOffsetTop = $('.rh-menu__offset-top');

    var $menuItemButton = $('.rh-menu__item-button'),
        $menuSubContainers = $('.rh-menu__item-sub-container');

    var $menuMainButtonDefaultPaddingRight = isSmallScreen ? "0.84375em" : "0.7em", // View more in CSS
        $menuBodySpaceTop = 30;

    // Initial state
    $menuSubContainers.addClass('rh-dp--none');
    $menuBody.addClass('rh-pos--fixed').css({ "top": $(window).scrollTop() });
    $menuTopBar.css({ "max-width": $menuBody.width() });

    $(window).resize(throttle(function () {
        // Update max-width for menu when windows resizing
        scrollbarWidth = calculateScrollbarWidth();
        $menuMainButtonDefaultPaddingRight = isSmallScreen ? "0.84375em" : "0.7em";
        $menuTopBar.css({ "max-width": $menuBody.width() });
    }, 80));

    $(document).scroll(throttle(function () {
        // Update menu position when scrolling
        $menuBody.css({ "top": $(window).scrollTop() });
    }, 200));

    $menuMainButton.click(function () {
        lockBodyScrolling(true);

        $menuOverlay.toggleClass('rh-dp--none rh-dp--show');

        $menuTopBar
            .addClass('rh-pos--fixed')
            .css({
                "width": "100%",
                "max-width": $menuBody.width(),
                "padding-right": parseInt($menuTopBar.css('padding-right')) + scrollbarWidth
            });

        $menuBody
            .removeClass('rh-dp--none')
            .addClass('rh-dp--show')
            .removeClass('rh-pos--fixed')
            .addClass('rh-pos--absolute')// Using the position "absolute" for iOS performance
            .css({ "top": $(window).scrollTop() })
            .addClass('rh-menu__body--show');

        $menuBodyOffsetTop.css({ "height": parseInt($menuTopBar.height() + $menuBodySpaceTop) });
    });

    $menuCloseButton.click(function () {
        $menuTopBar
            .removeClass('rh-pos--fixed')
            .css({
                "width": "",
                "max-width": "",
                "padding-right": $menuMainButtonDefaultPaddingRight
            });

        $('#rh-menu-body').removeClass('rh-menu__body--show');
        hideMenuBody();

        $menuBodyOffsetTop.css({ "height": $menuBodySpaceTop });
        $menuOverlay.toggleClass('rh-dp--none rh-dp--show');
    });

    $menuItemButton.click(function () {
        var $menuItemButton = $(this),
            $menuItemSubContainer = $("#sub" + $menuItemButton.attr('id')),  // Menu item's sub container ID
            $menuItemIsLevel1 = false,
            $menuItemLink = $(this).closest("div[class^='rh-menu__item']").find("a");

        if ($menuItemButton.hasClass("rh-menu__item-button-parent")) {
            $menuItemIsLevel1 = true;
        }

        $menuItemButton.find("span").toggleClass("icon-plus icon-minus");

        if (!$menuItemIsLevel1) {
            $menuItemButton.toggleClass("rh-menu__item-button-sub-item rh-menu__item-button-sub-item--active");
            $menuItemLink.toggleClass("rh-menu__link--active");
        }

        $menuItemSubContainer.length && $menuItemSubContainer.toggleClass("rh-dp--none rh-dp--show");
    });

    var menuBodyHiddenTimer;
    var menuScrollbarShowingTimer;
    function hideMenuBody() {
        menuScrollbarShowingTimer && clearTimeout(menuScrollbarShowingTimer);
        menuScrollbarShowingTimer = setTimeout(function () {
            lockBodyScrolling(false);
        }, 160);

        menuBodyHiddenTimer && clearTimeout(menuBodyHiddenTimer);
        menuBodyHiddenTimer = setTimeout(function () {
            $('#rh-menu-body')
                .removeClass('rh-pos--absolute')
                .addClass('rh-pos--fixed')
                .removeClass('rh-dp--show')
                .addClass('rh-dp--none');
            
        }, 600);
    }

    /* Common */
    function lockBodyScrolling(status, fnCallback) {
        //github.com/willmcpo/body-scroll-lock
        var disableBodyScroll = bodyScrollLock.disableBodyScroll,
            enableBodyScroll = bodyScrollLock.enableBodyScroll;

        var targetElement = document.querySelector(".rh-menu__body");

        if (status) {
            $body.addClass("rh-noscroll").css({ "margin-right": scrollbarWidth });
            isIDevice && disableBodyScroll(targetElement);
        } else {
            $body.removeClass("rh-noscroll").css({ "margin-right": "" });
            isIDevice && enableBodyScroll(targetElement);
        }

        typeof fnCallback === 'function' && fnCallback();
    }

    /* Helpers */
    function calculateScrollbarWidth() {
        return (window.innerWidth - document.body.clientWidth);
    }

    function isMobileDevice() {
        return !!navigator.platform && /iPad|iPhone|iPod/g.test(navigator.platform);
    }
});
