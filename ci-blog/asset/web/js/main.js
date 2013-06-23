$(document).ready(function () {
    /* =====================================================       
     Shortcodes     
     ===================================================== */

	/* -----------------------------------------------------
     Progress bar (About us)
     ----------------------------------------------------- */
    $(".meter > span").each(function () {
        $(this)
            .data("origWidth", $(this).width())
            .width(0)
            .animate({
                width:$(this).data("origWidth")
            }, 1200);
    });

    /* -----------------------------------------------------
     Alerts
     ----------------------------------------------------- */
    $(".alert-message a").click(function () {
        $(this).parent().slideUp();
        return false;
    });

    /* =====================================================
     Back to top
     ===================================================== */
    $(function() {
        var $totop = $('.to-top'); /* <-- Change this */
        
        $(window).scroll(function() {
            if($(this).scrollTop() != 0) {
                $totop.fadeIn();
            } else {
                $totop.fadeOut();
            }
        });

        $totop.click(function() {
            $('body,html').animate({scrollTop:0},800);
        });
    });

    /* =====================================================       
     Contact     
     ===================================================== */
    $("#map").gMap({markers:[
        {
            latitude:47.660937,
            longitude:9.569803
        }
    ],
        zoom:10
    });
    /* -----------------------------------------------------
     Tabs
     ----------------------------------------------------- */
    $('div.tabs ul.tab_navigation a').click(
        function () {
            $('div.tabs > div').hide().filter(this.hash).show();
            $('div.tabs ul.tab_navigation a').removeClass('active');
            $(this).addClass('active');
            return false;
        }).filter(':first').click();
    /* -----------------------------------------------------
     Accordion
     ----------------------------------------------------- */
    $(".accordion .title").click(function () {
        if($(this).hasClass('active')){        
            $(this).removeClass("active").closest($('.accordion')).find('.inner').slideUp(400, 'easeOutCirc', function () {
                $(this).next('.inner').css("display", "none");
            });               
        }
        else{
            $(this).addClass("active").closest($('.accordion')).find('.inner').slideDown(400, 'easeOutBounce', function () {
                $(this).next('.inner').css("display", "block");
            });            
        }
    });
    /* -----------------------------------------------------
     Testimonials
     ----------------------------------------------------- */
    $('.testimonials').flexslider({
        animation: "slide",
        controlNav: false,
        manualControls: ".flex-control-nav_ li",
    });
    /* -----------------------------------------------------
     About us slider
     ----------------------------------------------------- */
    $('.about-us-slider').flexslider({
        animation: "slide",
        controlNav: false,
        manualControls: ".flex-control-nav_ li",
    });
    /* -----------------------------------------------------
     Jcarousel
     ----------------------------------------------------- */
    (function($) {
        $(function() {

            $('[data-jcarousel]').each(function() {               
                var el = $(this);
                el.jcarousel(el.data());
            });

            $('[data-jcarousel-control]').each(function() {
                var el = $(this);
                el.jcarouselControl(el.data());
            });

        });
    })(jQuery);
    /* -----------------------------------------------------
     Single portfolio slider
     ----------------------------------------------------- */
    $('.single-portfolio-slider').flexslider({
        animation: "slide",
        controlNav: false,
        manualControls: ".flex-control-nav_ li",
    }); 
    /* =====================================================       
     Footer    
     ===================================================== */   
     $(".tweet").tweet({
        username:"Rizal_afani",
        join_text:"auto",
        avatar_size:40,
        count:3,
        auto_join_text_default:"we said,",
        auto_join_text_ed:"we",
        auto_join_text_ing:"we were",
        auto_join_text_reply:"we replied to",
        auto_join_text_url:"we were checking out",
        loading_text:"loading tweets..."
    });
    /* =====================================================       
     Isotope     
     ===================================================== */
    var $container = $('#portfolio'); /* <-- Change this */
        $container.isotope({
            transformsEnabled:true,
            filter:'.portfolio-element',
            getSortData:{
                number:function ($elem) {
                    return parseFloat($elem.find('.player_numbers').text().replace(/[\(\)]/g, ''));
                }
            },
            sortBy:'number',
            sortAscending:false
        });
        
        var $optionSets = $('.option-set'),
            $optionLinks = $optionSets.find('a');
        $optionLinks.click(function () {
            var $this = $(this);
            var $optionSet = $this.parents('.option-set');
            if ($this.hasClass('selected'))
                return false;
            $optionSet.find('.selected').removeClass('selected');
            $this.addClass('selected');
            var filter = '.' + $this.attr("id").toLowerCase();
            if (filter == '.all')
                filter = '.portfolio-element';
            $container.isotope({
                transformsEnabled:true,
                filter:filter,
                getSortData:{
                    number:function ($elem) {
                        return parseFloat($elem.find('.player_numbers').text().replace(/[\(\)]/g, ''));
                    }
                },
                sortBy:'number',
                sortAscending:false
            });
            return false;
        });
    /* =====================================================
     Mobil menu
     ===================================================== */
    $('.menu-system ul.absolution').mobileMenu({
        defaultText:'Navigate to...',
        className:'select-menu',
        subMenuDash:'&nbsp;&nbsp;&nbsp;&ndash;'
    });

    /* =====================================================       
     Home     
     ===================================================== */
    $('.fullwidthbanner').revolution(
        {
        delay:9000,
        startwidth:960,
        startheight:500,

        onHoverStop:"on",                       // Stop Banner Timet at Hover on Slide on/off

        thumbWidth:100,                         // Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
        thumbHeight:50,
        thumbAmount:3,

        hideThumbs:0,
        navigationType:"none",                // bullet, thumb, none
        navigationArrows:"solo",                // nexttobullets, solo (old name verticalcentered), none

        navigationStyle:"round",                // round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


        navigationHAlign:"center",              // Vertical Align top,center,bottom
        navigationVAlign:"top",                 // Horizontal Align left,center,right
        navigationHOffset:0,
        navigationVOffset:20,

        soloArrowLeftHalign:"left",
        soloArrowLeftValign:"center",
        soloArrowLeftHOffset:0,
        soloArrowLeftVOffset:0,

        soloArrowRightHalign:"right",
        soloArrowRightValign:"center",
        soloArrowRightHOffset:0,
        soloArrowRightVOffset:0,

        touchenabled:"on",                      // Enable Swipe Function : on/off

        stopAtSlide:-1,                         // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
        stopAfterLoops:-1,                      // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

        hideCaptionAtLimit:0,                   // It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
        hideAllCaptionAtLilmit:0,               // Hide all The Captions if Width of Browser is less then this value
        hideSliderAtLimit:0,                    // Hide the whole slider, and stop also functions if Width of Browser is less than this value

        fullWidth:"on",

        shadow:0                                //0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)
    });    

});