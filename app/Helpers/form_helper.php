<?php

if (!function_exists('profession_select')) {
    function profession_select($professions, $selected = null, $attributes = '') {
        $options = '<option value="" selected>Select profession</option>';
        foreach ($professions as $profession) {
            $options .= '<option value="' . $profession['pkProfession'] . '"';
            if ($selected !== null && $selected == $profession['pkProfession']) {
                $options .= ' selected';
            }
            $options .= '>' . $profession['Profession'] . '</option>';
        }

        $error = isset($_SESSION['errors']['profession']) ? $_SESSION['errors']['profession'] : '';

        $select = '<select class="form-select" aria-label="Default select example" name="profession" id="profession" ' . $attributes . '>';
        $select .= $options;
        $select .= '</select>';
        $select .= '<p class="is-danger help">' . $error . '</p>';

        return $select;
    }
}

?>