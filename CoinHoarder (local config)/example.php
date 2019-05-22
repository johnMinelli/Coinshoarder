<?php
/**
 * Created by PhpStorm.
 * User: Gio
 * Date: 09/01/2018
 * Time: 21:45
 */

require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en-US">

<head>

    <?PHP
    include(linkrel);
    ?>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <style id='rs-plugin-settings-inline-css' type='text/css'>
        #rs-demo-id {
        }
    </style>
    <style id='cryptic-mt-style-inline-css' type='text/css'>

        .is_header_semitransparent .navbar-default {
            background: rgba(35, 35, 49, 0.2) none repeat scroll 0 0;
        }

        .is_header_semitransparent .sticky-wrapper.is-sticky .navbar-default {
            background: rgba(35, 35, 49, 0.9) none repeat scroll 0 0;
        }

        .back-to-top {
            background: transparent;
            color: #ffffff;
        }

        .back-to-top:hover {
            background: transparent;
            color: #ffffff;
        }

        .breadcrumb a::after {
            content: "/";
        }

        body {
            background: #ffffff;
        }

        .logo img,
        .navbar-header .logo img {
            max-width: 140px;
        }

        ::selection {
            color: #ffffff;
            background: #ffd600;
        }

        ::-moz-selection { /* Code for Firefox */
            color: #ffffff;
            background: #ffd600;
        }

        a {
            color: #ffd600;
        }

        a:focus,
        a:visited,
        a:hover {
            color: #e5c000;
        }

        /*------------------------------------------------------------------
            COLOR
        ------------------------------------------------------------------*/
        a,
        a:hover,
        a:focus,
        .mt_car--tax-type,
        span.amount,
        .widget_popular_recent_tabs .nav-tabs li.active a,
        .widget_product_categories .cat-item:hover,
        .widget_product_categories .cat-item a:hover,
        .widget_archive li:hover,
        .widget_archive li a:hover,
        .widget_categories .cat-item:hover,
        .widget_categories li a:hover,
        .pricing-table.recomended .button.solid-button,
        .pricing-table .table-content:hover .button.solid-button,
        .pricing-table.Recommended .button.solid-button,
        .pricing-table.recommended .button.solid-button,
        #sync2 .owl-item.synced .post_slider_title,
        #sync2 .owl-item:hover .post_slider_title,
        #sync2 .owl-item:active .post_slider_title,
        .pricing-table.recomended .button.solid-button,
        .pricing-table .table-content:hover .button.solid-button,
        .testimonial-author,
        .testimonials-container blockquote::before,
        .testimonials-container blockquote::after,
        .post-author > a,
        h2 span,
        label.error,
        .author-name,
        .prev-next-post a:hover,
        .prev-text,
        .wpb_button.btn-filled:hover,
        .next-text,
        .social ul li a:hover i,
        .wpcf7-form span.wpcf7-not-valid-tip,
        .text-dark .statistics .stats-head *,
        .wpb_button.btn-filled,
        footer ul.menu li.menu-item a:hover,
        .widget_meta a:hover,
        .widget_pages a:hover,
        .blogloop-v1 .post-name a:hover,
        .blogloop-v2 .post-name a:hover,
        .blogloop-v3 .post-name a:hover,
        .blogloop-v4 .post-name a:hover,
        .blogloop-v5 .post-name a:hover,
        .post-category-comment-date span a:hover,
        .post-category-comment-date span:hover,
        .list-view .post-details .post-category-comment-date i:hover,
        .list-view .post-details .post-category-comment-date a:hover,
        .simple_sermon_content_top h4,
        .page_404_v1 h1,
        .mt_cars--single-main-pic .post-name > a,
        .widget_recent_comments li:hover a,
        .list-view .post-details .post-name a:hover,
        .blogloop-v5 .post-details .post-sticky-label i,
        header.header2 .header-info-group .header_text_title strong,
        .widget_recent_entries_with_thumbnail li:hover a,
        .widget_recent_entries li a:hover,
        .blogloop-v1 .post-details .post-sticky-label i,
        .blogloop-v2 .post-details .post-sticky-label i,
        .blogloop-v3 .post-details .post-sticky-label i,
        .blogloop-v4 .post-details .post-sticky-label i,
        .blogloop-v5 .post-details .post-sticky-label i,
        .error-404.not-found h1,
        .header-info-group i,
        .action-expand::after,
        .list-view .post-details .post-excerpt .more-link:hover,
        .header4 header .right-side-social-actions .social-links a:hover i,
        #navbar .menu-item.selected > a, #navbar .menu-item:hover > a,
        .sidebar-content .widget_nav_menu li a:hover {
            color: #ffd600;
        }

        /* NAVIGATION */
        .navstyle-v8.header3 #navbar .menu > .menu-item.current-menu-item > a,
        .navstyle-v8.header3 #navbar .menu > .menu-item:hover > a,
        .navstyle-v1.header3 #navbar .menu > .menu-item:hover > a,
        .navstyle-v1.header2 #navbar .menu > .menu-item:hover > a,
        #navbar ul.sub-menu li a:hover,
        .navstyle-v4 #navbar .menu > .menu-item.current-menu-item > a,
        .navstyle-v4 #navbar .menu > .menu-item:hover > a,
        .navstyle-v3 #navbar .menu > .menu-item.current-menu-item > a,
        .navstyle-v3 #navbar .menu > .menu-item:hover > a,
        .navstyle-v3 #navbar .menu > .menu-item > a::before,
        .navstyle-v3 #navbar .menu > .menu-item > a::after,
        .navstyle-v2 #navbar .menu > .menu-item.current-menu-item > a,
        .navstyle-v2 #navbar .menu > .menu-item:hover > a,
        #navbar .menu-item.selected > a, #navbar .menu-item:hover > a {
            color: #ffd600;
        }

        .navstyle-v2.header3 #navbar .menu > .menu-item > a::before,
        .navstyle-v2.header3 #navbar .menu > .menu-item > a::after,
        .navstyle-v8 #navbar .menu > .menu-item > a::before,
        .navstyle-v7 #navbar .menu > .menu-item .sub-menu > .menu-item > a:hover,
        .navstyle-v7 #navbar .menu > .menu-item.current_page_item > a,
        .navstyle-v7 #navbar .menu > .menu-item.current-menu-item > a,
        .navstyle-v7 #navbar .menu > .menu-item:hover > a,
        .navstyle-v6 #navbar .menu > .menu-item.current_page_item > a,
        .navstyle-v6 #navbar .menu > .menu-item.current-menu-item > a,
        .navstyle-v6 #navbar .menu > .menu-item:hover > a,
        .navstyle-v5 #navbar .menu > .menu-item.current_page_item > a,
        .navstyle-v5 #navbar .menu > .menu-item.current-menu-item > a,
        .navstyle-v5 #navbar .menu > .menu-item:hover > a,
        .navstyle-v2 #navbar .menu > .menu-item > a::before,
        .navstyle-v2 #navbar .menu > .menu-item > a::after {
            background: #ffd600;
        }

        /* Color Dark / Hovers */
        .related-posts .post-name:hover a {
            color: #e5c000;
        }

        /*------------------------------------------------------------------
            BACKGROUND + BACKGROUND-COLOR
        ------------------------------------------------------------------*/
        .tagcloud > a:hover,
        .modeltheme-icon-search,
        .wpb_button::after,
        .rotate45,
        .latest-posts .post-date-day,
        .latest-posts h3,
        .latest-tweets h3,
        .latest-videos h3,
        .button.solid-button,
        button.vc_btn,
        .pricing-table.recomended .table-content,
        .pricing-table .table-content:hover,
        .pricing-table.Recommended .table-content,
        .pricing-table.recommended .table-content,
        .pricing-table.recomended .table-content,
        .pricing-table .table-content:hover,
        .block-triangle,
        .owl-theme .owl-controls .owl-page span,
        body .vc_btn.vc_btn-blue,
        body a.vc_btn.vc_btn-blue,
        body button.vc_btn.vc_btn-blue,
        .pagination .page-numbers.current,
        .pagination .page-numbers:hover,
        #subscribe > button[type='submit'],
        .social-sharer > li:hover,
        .prev-next-post a:hover .rotate45,
        .masonry_banner.default-skin,
        .form-submit input,
        .member-header::before,
        .member-header::after,
        .member-footer .social::before,
        .member-footer .social::after,
        .subscribe > button[type='submit'],
        .no-results input[type='submit'],
        h3#reply-title::after,
        .newspaper-info,
        header.header1 .header-nav-actions .shop_cart,
        .categories_shortcode .owl-controls .owl-buttons i:hover,
        .widget-title:after,
        h2.heading-bottom:after,
        .single .content-car-heading:after,
        .wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header.ui-state-active,
        #primary .main-content ul li:not(.rotate45)::before,
        .wpcf7-form .wpcf7-submit,
        ul.ecs-event-list li span,
        #contact_form2 .solid-button.button,
        .navbar-default .navbar-toggle .icon-bar,
        .details-container > div.details-item .amount, .details-container > div.details-item ins,
        .modeltheme-search .search-submit,
        .pricing-table.recommended .table-content .title-pricing,
        .pricing-table .table-content:hover .title-pricing,
        .pricing-table.recommended .button.solid-button,
        #navbar ul.sub-menu li a:hover,
        .blogloop-v5 .absolute-date-badge span,
        .post-category-date a[rel="tag"]
        #navbar .mt-icon-list-item:hover,
        .mt_car--single-gallery.mt_car--featured-single-gallery:hover,
        footer .mc4wp-form-fields input[type="submit"],
        .modeltheme-pagination.pagination .page-numbers.current,
        .pricing-table .table-content:hover .button.solid-button,
        footer .footer-top .menu .menu-item a::before,
        .mt-car-search .submit .form-control,
        .blogloop-v4.list-view .post-date,
        header .top-header,
        .navbar-toggle .icon-bar,
        .back-to-top,
        .post-password-form input[type="submit"],
        .search-form input[type="submit"],
        .post-password-form input[type='submit'] {
            background: #ffd600;
        }

        .modeltheme-search.modeltheme-search-open .modeltheme-icon-search,
        .no-js .modeltheme-search .modeltheme-icon-search,
        .modeltheme-icon-search:hover,
        .latest-posts .post-date-month,
        .button.solid-button:hover,
        body .vc_btn.vc_btn-blue:hover,
        body a.vc_btn.vc_btn-blue:hover,
        .post-category-date a[rel="tag"]:hover,
        .single-post-tags > a:hover,
        body button.vc_btn.vc_btn-blue:hover,
        .blogloop-v5 .absolute-date-badge span:hover,
        .mt-car-search .submit .form-control:hover,
        #contact_form2 .solid-button.button:hover,
        .subscribe > button[type='submit']:hover,
        footer .mc4wp-form-fields input[type="submit"]:hover,
        .no-results.not-found .search-submit:hover,
        .no-results input[type='submit']:hover,
        ul.ecs-event-list li span:hover,
        .pricing-table.recommended .table-content .price_circle,
        .pricing-table .table-content:hover .price_circle,
        #modal-search-form .modal-content input.search-input,
        .wpcf7-form .wpcf7-submit:hover,
        .form-submit input:hover,
        .blogloop-v4.list-view .post-date a:hover,
        .pricing-table.recommended .button.solid-button:hover,
        .search-form input[type="submit"]:hover,
        .modeltheme-pagination.pagination .page-numbers.current:hover,
        .error-return-home.text-center > a:hover,
        .pricing-table .table-content:hover .button.solid-button:hover,
        .post-password-form input[type="submit"]:hover,
        .navbar-toggle .navbar-toggle:hover .icon-bar,
        .back-to-top:hover,
        .post-password-form input[type='submit']:hover {
            background: #e5c000;
        }

        .tagcloud > a:hover {
            background: #e5c000 !important;
        }

        .flickr_badge_image a::after,
        .thumbnail-overlay,
        .portfolio-hover,
        .pastor-image-content .details-holder,
        .item-description .holder-top,
        blockquote::before {
            background: rgba(255, 214, 0, 0.7);
        }

        /*------------------------------------------------------------------
            BORDER-COLOR
        ------------------------------------------------------------------*/
        .comment-form input,
        .comment-form textarea,
        .author-bio,
        blockquote,
        .widget_popular_recent_tabs .nav-tabs > li.active,
        body .left-border,
        body .right-border,
        body .member-header,
        body .member-footer .social,
        body .button[type='submit'],
        .navbar ul li ul.sub-menu,
        .wpb_content_element .wpb_tabs_nav li.ui-tabs-active,
        #contact-us .form-control:focus,
        .sale_banner_holder:hover,
        .testimonial-img,
        .wpcf7-form input:focus,
        .wpcf7-form textarea:focus,
        .navbar-default .navbar-toggle:hover,
        .header_search_form,
        .list-view .post-details .post-excerpt .more-link:hover {
            border-color: #ffd600;
        }

        header .navbar-toggle,
        .navbar-default .navbar-toggle {
            border: 3px solid #ffd600;
        }
    </style>
    <style type="text/css">.recentcomments a {
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
    <style type="text/css" title="dynamic-css" class="options-output">

        #navbar .menu-item > a,
        .navbar-nav .search_products a,
        .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus,
        .navbar-default .navbar-nav > li > a {
            color: #ffffff;
        }

        body #navbar .menu-item.selected > a, body #navbar .menu-item:hover > a {
            color: #ffd600;
        }

        #navbar .sub-menu, .navbar ul li ul.sub-menu {
            background-color: #f7f7f7;
        }

        #navbar ul.sub-menu li a {
            color: #252525;
        }

        #navbar ul.sub-menu li a:hover {
            background-color: transparent;
        }

        body {
            font-family: Montserrat;
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.24s ease-in-out;
            -moz-transition: opacity 0.24s ease-in-out;
            transition: opacity 0.24s ease-in-out;
        }

        .wf-loading body, {
            opacity: 0;
        }

        .ie.wf-loading body, {
            visibility: hidden;
        }

        h1, h1 span {
            font-family: Montserrat;
            line-height: 36px;
            font-size: 36px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.24s ease-in-out;
            -moz-transition: opacity 0.24s ease-in-out;
            transition: opacity 0.24s ease-in-out;
        }

        .wf-loading h1, .wf-loading h1 span, {
            opacity: 0;
        }

        .ie.wf-loading h1, .ie.wf-loading h1 span, {
            visibility: hidden;
        }

        h2 {
            font-family: Montserrat;
            line-height: 30px;
            font-size: 30px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.24s ease-in-out;
            -moz-transition: opacity 0.24s ease-in-out;
            transition: opacity 0.24s ease-in-out;
        }

        .wf-loading h2, {
            opacity: 0;
        }

        .ie.wf-loading h2, {
            visibility: hidden;
        }

        h3 {
            font-family: Montserrat;
            line-height: 24px;
            font-size: 24px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.24s ease-in-out;
            -moz-transition: opacity 0.24s ease-in-out;
            transition: opacity 0.24s ease-in-out;
        }

        .wf-loading h3, {
            opacity: 0;
        }

        .ie.wf-loading h3, {
            visibility: hidden;
        }

        h4 {
            font-family: Montserrat;
            line-height: 18px;
            font-size: 18px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.24s ease-in-out;
            -moz-transition: opacity 0.24s ease-in-out;
            transition: opacity 0.24s ease-in-out;
        }

        .wf-loading h4, {
            opacity: 0;
        }

        .ie.wf-loading h4, {
            visibility: hidden;
        }

        h5 {
            font-family: Montserrat;
            line-height: 14px;
            font-size: 14px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.24s ease-in-out;
            -moz-transition: opacity 0.24s ease-in-out;
            transition: opacity 0.24s ease-in-out;
        }

        .wf-loading h5, {
            opacity: 0;
        }

        .ie.wf-loading h5, {
            visibility: hidden;
        }

        h6 {
            font-family: Montserrat;
            line-height: 12px;
            font-size: 12px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.24s ease-in-out;
            -moz-transition: opacity 0.24s ease-in-out;
            transition: opacity 0.24s ease-in-out;
        }

        .wf-loading h6, {
            opacity: 0;
        }

        .ie.wf-loading h6, {
            visibility: hidden;
        }

        input, textarea {
            font-family: Montserrat;
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.24s ease-in-out;
            -moz-transition: opacity 0.24s ease-in-out;
            transition: opacity 0.24s ease-in-out;
        }

        .wf-loading input, .wf-loading textarea, {
            opacity: 0;
        }

        .ie.wf-loading input, .ie.wf-loading textarea, {
            visibility: hidden;
        }

        input[type="submit"] {
            font-family: Montserrat;
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.24s ease-in-out;
            -moz-transition: opacity 0.24s ease-in-out;
            transition: opacity 0.24s ease-in-out;
        }

        .wf-loading input[type="submit"], {
            opacity: 0;
        }

        .ie.wf-loading input[type="submit"], {
            visibility: hidden;
        }

        .navbar-default {
            background-color: #252525;
        }

        footer .footer-top {
            background-size: cover;
            background-image: url('/CoinHoarder/img/footer.jpg');
        }

        footer .footer-top h1.widget-title, footer .footer-top h3.widget-title, footer .footer-top .widget-title {
            color: #ffffff;
        }

        .footer-row-1 {
            padding-top: 90px;
            padding-bottom: 90px;
        }

        .footer-row-1 {
            margin-top: 0;
            margin-bottom: 0;
        }

        .footer-row-1 {
            border-top: 0px solid #515b5e;
            border-bottom: 0px solid #515b5e;
            border-left: 0px solid #515b5e;
            border-right: 0px solid #515b5e;
        }

        footer .footer {
            background-color: #202020;
        }

        footer .footer h1.widget-title, footer .footer h3.widget-title, footer .footer .widget-title {
            color: #ffffff;
        }

        .single article .article-content p, p, .post-excerpt {
            font-family: Montserrat;
            line-height: 25px;
            color: #666666;
            font-size: 15px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.24s ease-in-out;
            -moz-transition: opacity 0.24s ease-in-out;
            transition: opacity 0.24s ease-in-out;
        }

        .wf-loading .single article .article-content p, .wf-loading p, .wf-loading .post-excerpt, {
            opacity: 0;
        }

        .ie.wf-loading .single article .article-content p, .ie.wf-loading p, .ie.wf-loading .post-excerpt, {
            visibility: hidden;
        }
    </style>
    <style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1510145298908 {
            margin-top: 0px !important;
            margin-bottom: 0px !important;
            padding-top: 90px !important;
            padding-bottom: 90px !important;
            background: #252525 url(/CoinHoarder/img/slider/background5.jpg) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1509621455423 {
            margin-top: 0px !important;
            margin-bottom: 0px !important;
            padding-top: 90px !important;
            padding-bottom: 90px !important;
            background-image: url(/CoinHoarder/img/slider/background6.jpg) !important;
        }

        .vc_custom_1510218413928 {
            margin-bottom: 0px !important;
            padding-top: 105px !important;
            padding-bottom: 120px !important;
            background-image: url(/CoinHoarder/img/slider/background3.jpg) !important;
        }

        .vc_custom_1509623301946 {
            margin-top: 0px !important;
            margin-bottom: 0px !important;
            padding-top: 90px !important;
            padding-bottom: 90px !important;
            background-image: url(/CoinHoarder/img/slider/background7.jpg) !important;
        }

        .vc_custom_1510219006291 {
            margin-top: 0px !important;
            margin-bottom: 0px !important;
            padding-top: 90px !important;
            padding-bottom: 90px !important;
        }

        .vc_custom_1509627633817 {
            margin-top: 0px !important;
            margin-bottom: 0px !important;
            padding-top: 90px !important;
            padding-bottom: 70px !important;
            background-image: url(/CoinHoarder/img/slider/background8.jpg) !important;
        }

        .vc_custom_1509630501820 {
            margin-top: 0px !important;
            margin-bottom: 0px !important;
            padding-top: 90px !important;
            padding-bottom: 90px !important;
            background-image: url(/CoinHoarder/img/slider/background2.jpg) !important;
        }

        .vc_custom_1509630337729 {
            margin-bottom: 0px !important;
            padding-top: 50px !important;
            padding-bottom: 50px !important;
            background-color: #ffd600 !important;
        }

        .vc_custom_1509617964904 {
            padding-top: 0px !important;
        }

        .vc_custom_1510663320281 {
            margin-top: 30px !important;
            margin-bottom: 0px !important;
        }

        .vc_custom_1510221826540 {
            margin-top: 5px !important;
            margin-bottom: 10px !important;
        }

        .vc_custom_1510222242762 {
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }

        .vc_custom_1510144209821 {
            margin-bottom: 5px !important;
        }

        .vc_custom_1509621838573 {
            padding-top: 0px !important;
        }

        .vc_custom_1509621896054 {
            margin-bottom: 0px !important;
        }

        .vc_custom_1510670706843 {
            padding-top: 5px !important;
        }

        .vc_custom_1510147428598 {
            margin-top: 6px !important;
            margin-bottom: 15px !important;
        }

        .vc_custom_1510670714563 {
            padding-top: 5px !important;
        }

        .vc_custom_1510147403534 {
            margin-top: 6px !important;
            margin-bottom: 15px !important;
        }

        .vc_custom_1510670725003 {
            padding-top: 5px !important;
        }

        .vc_custom_1510147414492 {
            margin-top: 6px !important;
            margin-bottom: 15px !important;
        }

        .vc_custom_1510149372559 {
            padding-top: 0px !important;
        }

        .vc_custom_1510149379207 {
            padding-top: 0px !important;
        }

        .vc_custom_1510149385785 {
            padding-top: 0px !important;
        }

        .vc_custom_1510149391738 {
            padding-top: 0px !important;
        }

        .vc_custom_1509623292032 {
            padding-top: 0px !important;
        }

        .vc_custom_1509623317857 {
            margin-bottom: 0px !important;
            padding-top: 0px !important;
        }

        .vc_custom_1509699679373 {
            padding-top: 30px !important;
        }

        .vc_custom_1509699688509 {
            padding-top: 30px !important;
        }

        .vc_custom_1509626766777 {
            padding-top: 30px !important;
        }

        .vc_custom_1510234808641 {
            padding-top: 0px !important;
        }

        .vc_custom_1509627496151 {
            padding-top: 0px !important;
        }

        .vc_custom_1509623292032 {
            padding-top: 0px !important;
        }

        .vc_custom_1509630229674 {
            padding-top: 0px !important;
        }

        .vc_custom_1510307086908 {
            padding-top: 20px !important;
        }

        .vc_custom_1510670755553 {
            margin-top: 0px !important;
        }
    </style>
    <title>Coinshoarder</title>
</head>

<body class="home page-template-default page page-id-5 widgets_v2   navstyle-v1        header4   wpb-js-composer js-comp-ver-5.4.5 vc_responsive">
<!-- PAGE #page -->
<div id="page" class="hfeed site">

    <?PHP
    include(homeBar);

    include(example);
    ?>
</div>


</body>
</html>




<!--        LAYOUT
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">

                            </div>
                        </div>
                    </div>
                    <div class="vc_row wpb_row vc_row-fluid">

                        <div class="wpb_column vc_column_container vc_col-sm-11">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">

                                    <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_bottom-to-top bottom-to-top wpb_start_animation animated">
                                        <div class="wpb_wrapper">

                                        </div>
                                    </div>
                                    <div class="vc_row wpb_row vc_row-fluid">

                                        <div class="wpb_column vc_column_container vc_col-sm-6">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-6">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">

                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="wpb_column vc_column_container vc_col-sm-1">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">

                                </div>
                            </div>
                        </div>

                    </div>
-->