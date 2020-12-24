require('./bootstrap');

import 'jquery-ui/ui/widgets/datepicker';
import 'jquery-ui/ui/widgets/accordion';

$('.date-picker').datepicker({
    dateFormat: 'yy-mm-dd'
});
$('.accordion').accordion();

$('.menu-toggle').on('click', function () {
    $('.sidebar').toggleClass('active');
    $('.main').toggleClass('active');
});

$(".roles").change(function () {
    $('.list-roles').submit();
});
