/*!
 * Start Bootstrap - SB Admin v6.0.0 (https://startbootstrap.com/templates/sb-admin)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
 */

function authorsAutocomplete() {
    if ($("#authors")) {
        authautocomplete = $("#authors").autocomplete({
            source: "admin/authors/search",
            minLength: 2,
            select: function(event, ui) {
                console.log("Selected: " + ui.item.name + " aka " + ui.item.id);
                bookid = $(this).attr('data-bookid');
                window.location.href = "admin/books/" + bookid + "/assignauthor/" + ui.item.id;
            }
        });

        if (authautocomplete.autocomplete("instance") != undefined) {
            authautocomplete.autocomplete("instance")._renderItem = function(ul, item) {
                return $("<li>")
                    .append("<div>" + item.name + "</div>")
                    .appendTo(ul);
            };
        }
    }
}

function booksAutocomplete() {
    if ($("#books")) {
        bautocomplete = $("#books").autocomplete({
            source: "admin/books/search",
            minLength: 2,
            select: function(event, ui) {
                authorid = $(this).attr('data-authorid');
                window.location.href = "admin/authors/" + authorid + "/assignbook/" + ui.item.id;
            }
        });

        if (bautocomplete.autocomplete("instance") != undefined) {
            bautocomplete.autocomplete("instance")._renderItem = function(ul, item) {
                return $('<li>')
                    .append("<div><strong>" + item.title + "</strong></div><div>" + item.description.substring(0, 100) + "</div>")
                    .appendTo(ul);
            };
        }
    }
}

function categoriesAutocomplete() {
    if ($("#categories")) {
        bautocomplete = $("#categories").autocomplete({
            source: "admin/categories/search",
            minLength: 2,
            select: function(event, ui) {
                bookid = $(this).attr('data-bookid');
                window.location.href = "admin/books/" + bookid + "/assigncategory/" + ui.item.id;
            }
        });

        if (bautocomplete.autocomplete("instance") != undefined) {
            bautocomplete.autocomplete("instance")._renderItem = function(ul, item) {
                return $('<li>')
                    .append("<div>" + item.name + "</div>")
                    .appendTo(ul);
            };
        }
    }
}

function previewLatex() {


    let latex = "Hi, this is a line of text."

    let generator = new HtmlGenerator({ hyphenate: false })

    let doc = parse(latex, { generator: generator }).htmlDocument()

    console.log(doc.documentElement.outerHTML)
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
    booksAutocomplete();
    categoriesAutocomplete();

    previewLatex();
})(jQuery);