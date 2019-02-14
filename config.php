<?php

return [
    'production' => false,
    'baseUrl' => '',
    'collections' => [
        'events' => [
            'path' => 'events',
        ],
    ],
    'getTechEventsCount' => function($page, $events) {
        return $events->where('isnontech', false)->count();
    },
    'getNonTechEventsCount' => function ($page, $events) {
        return $events->where('isnontech', true)->count();
    },
    'people' => require('data/people.php'),
    'sponsors' => require('data/sponsors.php'),
    'getPersonByKey' => function($page, $key) {
        return (object) $page->people->has($key) ? $page->people[$key] : [];
    },
];
