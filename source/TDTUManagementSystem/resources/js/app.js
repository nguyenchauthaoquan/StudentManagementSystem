require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;
import 'jquery-ui/ui/widgets/datepicker.js';

$('.date-picker').datepicker({
    dateFormat: 'yy-mm-dd'
});

$('.menu-toggle').on('click', function () {
    $('.sidebar').toggleClass('active');
    $('.main').toggleClass('active');
});
