<?php

function loadUsers()
{
    $json = file_get_contents('users.json');
    return json_decode($json, true);
}

function saveUsers($users)
{
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
}
