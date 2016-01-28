$(document).ready(function () {
    /* fetch cities on change */

    /* UI magic */
    $('.rating.widget')
        .rating({
            initialRating: $('#RatingRating').val(),
            maxRating: 5,
            onRate: function(rating) {
                $('#RatingRating').val(rating);
            }
        })
    ;

});