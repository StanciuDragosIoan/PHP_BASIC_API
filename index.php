<?php


require_once __DIR__ . '/../src/functions.php';

// Default index page
route('GET', '^/$', function() {
    echo '<a href="users">List users</a><br>';
});

// GET request to /users
route('GET', '^/users$', function() {
    echo '<a href="users/1000">Show user: 1000</a>';
});

// With named parameters
route('GET', '^/users/(?<id>\d+)$', function($params) {
    echo "You selected User-ID: ";
    var_dump($params);
});

// POST request to /users
route('POST', '^/users$', function() {
    // Send a json response
    header('Content-Type: application/json');
    $json = json_decode(file_get_contents('php://input'), true);
    echo json_encode(['success' => true]);
});

header('HTTP/1.0 404 Not Found');
echo '404 Not Found';