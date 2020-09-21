<?php

function isValid($sentence) {
    $valid_char = array("(", "{", "[", ")", "}", "]");
    if(in_array($sentence, $valid_char)):
        return true;
    endif;
    return false;
};

function isOpen($sentence) {
    $open_brackets = array("(", "{", "[");

    if (in_array($sentence, $open_brackets)):
        return true;
    endif;
    return false;
};

function isMatch($char_open, $char_close) {
    if ($char_open == "(" and $char_close == ")"):
        return true;
    endif;
    if ($char_open == "{" and $char_close == "}"):
        return true;
    endif;
    if ($char_open == "[" and $char_close == "]"):
        return true;
    endif;
    return false;
};

function bracketBalanced($sentences) {
    $balanced_array = array();
    $sentences = str_split($sentences);

    foreach ($sentences as $sentence) {
        if(!isValid($sentence)):
            print("Inside valid character\n");
            return;
        endif;

        if (isOpen($sentence)):
            $balanced_array[] = $sentence;
        else:
            if (count($balanced_array) == 0):
                print("is not valid\n");
                return;
            endif;
            $char_open = array_pop($balanced_array);
            $char_close = $sentence;
            if (!isMatch($char_open, $char_close)):
                print("is not valid\n");
                return;
            endif;
        endif;

    };
    if (count($balanced_array) == 0):
        print("is valid\n");
        return;
    else:
        print("is not valid\n");
        return;
    endif;
}

$sentence = readline("Inside the sequency of characters: ");
bracketBalanced($sentence);

?>
