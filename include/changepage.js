jQuery(function ($) {
    $("li a")
        .click(function (e) {

            var link = $(this);

            var item = link.parent("li");

            if (item.hasClass("active")) {
                item.removeClass("active").children("a").removeClass("active");
            } else {
                item.addClass("active").children("a").addClass("active");
            }


        })
        .each(function () {
            var link = $(this);
            
            if (link.get(0).href === location.href) {
                link.addClass("active").parents("li").addClass("active");
                return false;
            }
        });
});