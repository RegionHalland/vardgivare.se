$(function() {

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
            $('body,html').animate({scrollTop: 0}, 800);
            return false;
        });
            
        // ***************************************
        // *** Hamburger menu overlay function ***
        // ***************************************
        $(".burger-menu__button, .overlay" ).on( "click", function() {
            $(".burger-dropdown__container").toggle();
            $(".overlay").toggle();
            $(".burger-menu__burger-icon").toggle();
            $(".burger-menu__close-icon").toggle();
        });

        // ************************************
        // *** Find on page scroll function ***
        // ************************************    
        $('a[href^="#"]').on( "click", function() {
        var target = $(this.hash);
            if (target.length) {
                // Animate target
                $('html,body').animate({scrollTop: target.offset().top}, 1000);
                // Add class for highlight the text
                $(target).addClass("content-highlight");
                // Wait 1.5 s and then remove the highlight class
                setTimeout(function(){
                    $(target).removeClass("content-highlight");
                }, 1500);
                return false;
            }
        });



        // *****************************
        // *** Fix fixed css for IE  ***
        // *****************************    
        if ($("body.page-template-default")[0]){
            $(window).scroll(debounce(function() {
                var myContentPosition = Math.round($('#content-nav-placeholder').offset().top);
                var myPosition = Math.round($('#content-nav-placeholder').offset().top - $(window).scrollTop());
                if (myPosition < 30) {
                    $("#content-nav-container").addClass("rh-get-fixed-sticky");
                } else {
                    $("#content-nav-container").removeClass("rh-get-fixed-sticky");
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