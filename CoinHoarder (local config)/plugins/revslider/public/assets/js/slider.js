


jQuery(document).ready(function () {
    var ajaxRevslider;

    // CUSTOM AJAX CONTENT LOADING FUNCTION
    ajaxRevslider = function (obj) {

        // obj.type : Post Type
        // obj.id : ID of Content to Load
        // obj.aspectratio : The Aspect Ratio of the Container / Media
        // obj.selector : The Container Selector where the Content of Ajax will be injected. It is done via the Essential Grid on Return of Content

        var content = "";

        data = {};

        data.action = 'revslider_ajax_call_front';
        data.client_action = 'get_slider_html';
        data.token = 'b038e4ad8a';
        data.type = obj.type;
        data.id = obj.id;
        data.aspectratio = obj.aspectratio;

        // SYNC AJAX REQUEST
        jQuery.ajax({
            type: "post",
            url: "https://modeltheme.com/mt_bitcurrency/wp-admin/admin-ajax.php",
            dataType: 'json',
            data: data,
            async: false,
            success: function (ret, textStatus, XMLHttpRequest) {
                if (ret.success == true)
                    content = ret.data;
            },
            error: function (e) {
                console.log(e);
            }
        });

        // FIRST RETURN THE CONTENT WHEN IT IS LOADED !!
        return content;
    };

    // CUSTOM AJAX FUNCTION TO REMOVE THE SLIDER
    var ajaxRemoveRevslider = function (obj) {
        return jQuery(obj.selector + " .rev_slider").revkill();
    };

    // EXTEND THE AJAX CONTENT LOADING TYPES WITH TYPE AND FUNCTION
    var extendessential = setInterval(function () {
        if (jQuery.fn.tpessential != undefined) {
            clearInterval(extendessential);
            if (typeof(jQuery.fn.tpessential.defaults) !== 'undefined') {
                jQuery.fn.tpessential.defaults.ajaxTypes.push({
                    type: "revslider",
                    func: ajaxRevslider,
                    killfunc: ajaxRemoveRevslider,
                    openAnimationSpeed: 0.3
                });
                // type:  Name of the Post to load via Ajax into the Essential Grid Ajax Container
                // func: the Function Name which is Called once the Item with the Post Type has been clicked
                // killfunc: function to kill in case the Ajax Window going to be removed (before Remove function !
                // openAnimationSpeed: how quick the Ajax Content window should be animated (default is 0.3)
            }
        }
    }, 30);
});


function setREVStartSize(e) {
    try {
        var i = jQuery(window).width(), t = 9999, r = 0, n = 0, l = 0, f = 0, s = 0, h = 0;
        if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function (e, f) {
            f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
        }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
            var u = (e.c.width(), jQuery(window).height());
            if (void 0 != e.fullScreenOffsetContainer) {
                var c = e.fullScreenOffsetContainer.split(",");
                if (c) jQuery.each(c, function (e, i) {
                    u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
            }
            f = u
        } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
        e.c.closest(".rev_slider_wrapper").css({height: f})
    } catch (d) {
        console.log("Failure at Presize of Slider:" + d)
    }
}
;
    function revslider_showDoubleJqueryError(sliderID) {
        var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
        errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
        errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
        errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
        errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
        jQuery(sliderID).show().html(errorMessage);
    }

