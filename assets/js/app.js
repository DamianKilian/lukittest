"use strict";

window.lukittest = {
    init: function () {
        lukittest.sortProductsBy();
        lukittest.menu();
    },
    sortProductsBy: function () {
        var sortProductsBy = $('#sortProductsBy');
        var products = $('#products');
        if (sortProductsBy.length) {
            sortProductsBy.on('change', function () {
                var that = $(this);
                $.ajax({
                    method: 'post',
                    url: window.location.pathname + '/' + that.val(),
                }).done(function (html) {
                    products.html(html);
                });

            });
        }
    },
    menu: function () {
        $('#main-nav').hcOffcanvasNav({
            disableAt: 1024,
            customToggle: $('#toggleMenu'),
            navTitle: 'All Categories',
            levelTitles: true,
            levelTitleAsBack: true
          });
    },
};


$(document).ready(function () {
    lukittest.init();
});

