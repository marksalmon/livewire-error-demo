<?php

$fields = [
    [
        'name' => 'ID',
        'id' => 'id',
        'type' => 'numeric'
    ],
    [
        'name' => 'Full name',
        'id' => 'name',
        'type' => 'text'
    ],
    [
        'name' => 'Favorite character',
        'id' => 'character',
        'type' => 'select',
        'valueOptions' => [
            'dustin' => 'Dustin',
            'eleven' => 'Eleven',
            'hopper' => 'Hopper',
            'lucas' => 'Lucas',
            'mike' => 'Mike',
            'will' => 'Will'
        ]
    ]
];

Route::get('/', function () use ($fields) {
    return view('welcome')->with('fields', $fields);
});

Route::get('/without', function () use ($fields) {
    return view('welcome-without')->with('fields', $fields);
});
