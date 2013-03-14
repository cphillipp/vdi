(function(jQuery) {

    jQuery('ul.tabs-nav').delegate('li:not(.active)', 'click', function(e) {
        jQuery(this).addClass('active').siblings().removeClass('active')
        .parent().next('.tabs-container').find(".tab-content").hide().eq(jQuery(this).index()).fadeIn(150);
        e.preventDefault();
    });

    jQuery('ul.tabs-nav').find("li:first").addClass("active");
    jQuery('.tabs-container').find("> div:first").show();


})(jQuery)


