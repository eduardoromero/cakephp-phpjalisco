$(document).ready(function () {
    /* fetch cities on change */
    $('#RentalStateId').bind('change', function() {
        var value = $('.search.state').dropdown('get value');

        get_cities(value);
    });

    /* UI magic */
    $('.search.city')
        .dropdown({
            transition: 'drop'
        })
    ;
    $('.search.state')
        .dropdown({
            transition: 'drop'
        })
    ;

    $('#RentalFee').inputmask('$ 99,999', {
        numericInput: true,
        placeholder: ' ',
        rightAlign: false,
        groupSeparator: ',',
        autoGroup: true,
        autoUnmask: true,
        removeMaskOnSubmit: true,
        unmaskAsNumber: true,
        onUnMask: function (maskedValue, unmaskedValue) {
            /* let's do the magic (remove the extra chars) */
            return maskedValue.replace(/[_,$ ]/g, '');
        }
    });

});

function get_cities(state_id) {
    $('.search.city').addClass('loading');

    $.ajax({
            method: "POST",
            dataType: 'json',
            url: cities_url + state_id + '.json',
            beforeSend: function() {
                /* clear select */
                $('#RentalCityId').find('option').remove();
                $('.search.city').dropdown('clear');
            }
        })
        .done(function( response ) {
            console.log('done', response);
            var cities = response.cities;
            jQuery.each(cities, function(i, city) {
                /* add */
                var option = {
                    value: i,
                    text : city
                };

                if(i == current_city) {
                    option.selected = 'selected';
                }

                $('#RentalCityId').append($('<option>', option));
            });
        })
        .fail(function(jqHXR, status) {
            console.log('fail', status);
        })
        .always(function() {
            $('.search.city').removeClass("loading");
            $('.search.city').dropdown('refresh');

            $('.search.city').dropdown('set selected', current_city);
        })
    ;
}