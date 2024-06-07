<?php

function getInitials($text) {
    $words = explode(' ', $text);
    $initials = '';

    foreach ($words as $word) {
        $initials .= strtoupper(substr($word, 0, 1));
    }

    return $initials;
}
