<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require 'pages/home.php';
        break;
    case '/about':
        require 'pages/about.php';
        break;
    case '/contacts':
        require 'pages/contacts.php';
        break;
    case '/program':
        require 'pages/program.php';
        break;
    case '/services':
        require 'pages/services.php';
        break;
    case '/library-news':
        require 'pages/library-news.php';
        break;
    case '/admin-login':
        require 'admin/admin.php';
        break;
    case '/admin-dashboard':
        require 'admin/dashboard.php';
        break;
    case '/admin-library-news':
        require 'admin/library-news.php';
        break;
    case '/admin-feedbacks':
        require 'admin/feedbacks.php';
        break;
    default:
        http_response_code(404);
        echo "Page not found!";
        break;
}
