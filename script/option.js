$(document).ready(function () {
    var $selects = $('select');
    $selects.select2();
    $('select').change(function () {
        $('option:hidden', $selects).each(function () {
            var self = this,
                toShow = true;
            $selects.not($(this).parent()).each(function () {
                if (self.value == this.value) toShow = false;
            })
            if (toShow) {
                $(this).removeAttr('disabled');
                $(this).parent().select2();
            }
        });
        if (this.value != "") {
            $selects.not(this).children('option[value=' + this.value + ']').attr('disabled', 'disabled');
            $selects.select2();
        }
    });
});