<?php
return [
    //Authentication and registration pages
    'login' => 'user/login',
    'logout' => 'user/logout',
    'registration' => 'user/registration',

    //Admin panel
    'admin' => 'admin/index',
    'user' => 'userAdmin/index',
    'users/page-([0-9]+)' => 'userAdmin/index/$1',
    'users/create' => 'userAdmin/create',
    'users/delete/([0-9]+)' => 'userAdmin/delete/$1',
    'users/update/([0-9]+)' => 'userAdmin/update/$1',
    'users/detailed/([0-9]+)' => 'userAdmin/detailed/$1',
];