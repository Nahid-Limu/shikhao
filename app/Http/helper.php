<?php
function checkPermission($permissions){
    $userAccess = getMyPermission(auth()->user()->is_permission);
    foreach ($permissions as $key => $value) {
        if($value == $userAccess){
            return true;
        }
    }
    return false;
}

function getMyPermission($id)
{
    switch ($id) {
        case 1:
            return 'super';
            break;
        case 2:
            return 'admin';
            break;
        case 3:
            return 'executive';
            break;
        case 5:
            return 'tutor';
            break;
        case 6:
            return 'student';
            break;
    }
}


