jQuery(document).ready(function() {

    // SKIN SWITCHER
    var currectLinkHref = jQuery('#ui-current-skin').attr('href');
    currectLinkHref  = currectLinkHref .substr(0, currectLinkHref .lastIndexOf("/"));

    jQuery( ".colors_buttons > span" ).on( "click", function() {
        var newSkinName = jQuery( this ).attr('data-skin');
        var newSkinCssHref = currectLinkHref+'/'+newSkinName;
        
        // SET THE NEW STYLE
        jQuery('#ui-current-skin').attr("href", newSkinCssHref);
        jQuery(".colors_buttons > span").removeClass('currentStyle');
        jQuery( this ).addClass('currentStyle');

        // LOG
        // console.log( 'New Skin Applied: '+jQuery( this ).attr('data-skin') );
    });


    // SIDEBAR OPENER
    jQuery(".panel_button .toggle_sidebar").click(function(){
        jQuery("div#panel").animate({
            right: "0px"
        }, "fast");
        jQuery(".panel_button").animate({
            right: "300px"
        }, "fast");
        jQuery(".panel_button").toggle();
    }); 
    jQuery(".hide_button.hide_button").click(function(){
        jQuery("#panel").animate({
            right: "-300px"
        }, "fast");
        jQuery(".panel_button").animate({
            right: "0px"
        }, "fast");
        jQuery(".panel_button").toggle();
    });
});
