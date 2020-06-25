/*!
 * Start Bootstrap - SB Admin v6.0.0 (https://startbootstrap.com/templates/sb-admin)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
 */

function authorsAutocomplete() {
    $("#authors").autocomplete({
            source: "admin/authors/search",
            minLength: 2,
            select: function(event, ui) {
                console.log("Selected: " + ui.item.name + " aka " + ui.item.id);
                bookid = $(this).attr('data-bookid');
                window.location.href = "admin/books/" + bookid + "/assignauthor/" + ui.item.id;
            }
        })
        .autocomplete("instance")._renderItem = function(ul, item) {
            return $("<li>")
                .append("<div>" + item.name + "</div>")
                .appendTo(ul);
        };

}

(function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });


    setTimeout(function() {
        $('.alert-info').remove()
    }, 5 * 1000);

    authorsAutocomplete();

})(jQuery);