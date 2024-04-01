<?php
if (!function_exists('level_select')) {
    function level_select($levels, $selected = null, $attributes = '') {
        $options = '<option value="" selected>Select level</option>';
        foreach ($levels as $level) {
            $options .= '<option value="' . $level['pkLevel'] . '"';
            if ($selected !== null && $selected == $level['pkLevel']) {
                $options .= ' selected';
            }
            $options .= '>' . $level['level'] . '</option>';
        }

        $error = isset($_SESSION['errors']['level']) ? $_SESSION['errors']['level'] : '';

        $select = '<div class="col-md-6">';
        $select .= '<label for="level" class="form-label">Level</label>';
        $select .= '<select class="form-select" aria-label="Default select example" name="level" id="level" ' . $attributes . '>';
        $select .= $options;
        $select .= '</select>';
        $select .= '<p class="is-danger help">' . $error . '</p>';
        $select .= '</div>';

        return $select;
    }
}