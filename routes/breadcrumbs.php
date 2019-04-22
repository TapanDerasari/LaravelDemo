<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('customers', function ($trail) {
    $trail->parent('home');
    $trail->push('Customer Details', route('customer.list'));
});
Breadcrumbs::for('create-customers', function ($trail) {
    $trail->parent('customers');
    $trail->push('Create customer', route('customer.create'));
});
Breadcrumbs::for('permissions', function ($trail) {
    $trail->parent('home');
    $trail->push('Permissions', route('permissions.index'));
});
Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('home');
    $trail->push('Posts', route('posts.index'));
});


Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('posts');
    $trail->push($post->title, route('posts.show', $post->id));
});
