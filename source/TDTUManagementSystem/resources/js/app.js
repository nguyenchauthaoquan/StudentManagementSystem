require('./bootstrap');

import $ from 'jquery';
import 'jquery-ui/ui/widgets/datepicker.js';

window.$ = window.jQuery = $;

$('.date-picker').datepicker({
    dateFormat: 'yy-mm-dd'
});

$('.menu-toggle').on('click', function () {
    $('.sidebar').toggleClass('active');
    $('.main').toggleClass('active');
});

$(function () {
    const rowsPerPage = 8;
    const rows = $('.table tbody tr');
    const rowsCount = rows.length;
    const pageCount = Math.ceil(rowsCount/rowsPerPage);

    for (var i = 0; i < pageCount; i++) {
        $('.pagination').append(
            '<li class="page-item"><a href="#" class="page-link rounded-circle">'+ (i + 1) + '</a></li>'
        );
    }

    $('.pagination .page-item:first-child').addClass('active');
    displayRows(1);

    $('.pagination .page-item .page-link').click(function (e) {
        e.preventDefault();
        $('.pagination .page-item').toggleClass('active');
        displayRows($(this).text())

    });

    function displayRows(index) {
        var start = (index - 1) * rowsPerPage;
        var end = start + rowsPerPage;

        // Hide all rows.
        rows.hide();

        // Show the proper rows for this page.
        rows.slice(start, end).show();
    }

});
