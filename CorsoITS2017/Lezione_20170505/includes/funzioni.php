<?php

function formattaData($param) {
    return date("F j, Y, g:i a", strtotime($param));
}
