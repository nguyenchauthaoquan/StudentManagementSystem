import 'jquery-ui/ui/widgets/datepicker';
import 'jquery-ui/ui/widgets/accordion';

import './bootstrap';

$('.date-picker').datepicker({
    dateFormat: 'yy-mm-dd'
});

$('.menu-toggle').on('click', function () {
    $('.sidebar').toggleClass('active');
    $('.main').toggleClass('active');
});

$('.alert').fadeTo(2000, 500).slideUp(500, function () {
    $(this).slideUp(500);
})
