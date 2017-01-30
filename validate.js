var $input = $('.tbox');
var $error = $('.error');
var $submit = $('#submit');
var Filters = {
    min: {
        re: /.{3,}/,
        error: '*Must be at least 3 characters.'
    },
    char: {
        re: /^[a-z]+$/i,
        error: '*Must be only letters.'
    },
    vowel: {
        re: /[aeiou]/i,
        error: '*Must have at least one vowel.'
    }
};
 
function test(value, filters) {
    var isValid = false;
    for (var i in filters) {
        isValid = filters[i].re.test(value);
        $error.hide();
        $submit.prop('disabled', false);
        if (!isValid) {
            $error.show().text(filters[i].error);
            $submit.prop('disabled', true);
            break;
        }
    }
    return isValid;
}
 
test($input.val(), Filters);
$input.on('keyup blur', function() {
    test(this.value, Filters);
});
