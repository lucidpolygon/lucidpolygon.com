<?php

return [
    'links' => [
        [
            'slug' => '/',
            'text' => 'Home',
            'name' => 'home',
            'view' => 'website.index',
        ],
        [
            'slug' => '/blog',
            'text' => 'Blog',
            'name' => 'blog',
            'view' => 'website.post.show',
        ],
        [
            'slug' => '/contact',
            'text' => 'Contact',
            'name' => 'contact',
            'view' => 'website.post.show',
        ],
    ]
];
