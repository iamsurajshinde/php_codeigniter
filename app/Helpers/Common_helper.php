<?php

function getFormValue($fieldName, $form)
{
    if (set_value($fieldName))
        return set_value($fieldName);
    if (isset($form))
        return $form[$fieldName];
    return "";
}


function getAction($form)
{
    if (isset($form))
        return "/home/edit/" . $form['id'];
    return "/home/add";
}