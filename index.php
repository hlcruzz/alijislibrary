<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require 'home.php';
        break;
    case '/about':
        require 'about.php';
        break;
    case '/contacts':
        require 'contacts.php';
        break;
    case '/program':
        require 'program.php';
        break;
    case '/services':
        require 'services.php';
        break;
    case '/library-news':
        require 'library-news.php';
        break;
    case '/gallery':
        require 'gallery.php';
        break;
    case '/periodicals':
        require 'periodicals.php';
        break;
    case '/sections':
        require 'sections.php';
        break;
    case '/admin-login':
        require 'admin/admin.php';
        break;
    case '/admin-forgot-password':
        require 'admin/forgot.php';
        break;
    case '/admin-dashboard':
        require 'admin/dashboard.php';
        break;
    case '/admin-profile':
        require 'admin/profile.php';
        break;
    case '/admin-library-news':
        require 'admin/library-news.php';
        break;
    case '/admin-feedbacks':
        require 'admin/feedbacks.php';
        break;
    case '/admin-tools-and-resources':
        require 'admin/tools-and-resources.php';
        break;
    case '/admin-gallery':
        require 'admin/gallery.php';
        break;
    case '/admin-about-us':
        require 'admin/about.php';
        break;
    case '/admin-contacts':
        require 'admin/contacts.php';
        break;
    case '/admin-personnel':
        require 'admin/personnel.php';
        break;
    case '/admin-settings-archive':
        require 'admin/archive.php';
        break;
    case '/admin-services':
        require 'admin/services.php';
        break;
    case '/admin-periodicals':
        require 'admin/periodicals.php';
        break;
    case '/admin-sections':
        require 'admin/sections.php';
        break;
    case '/admin-activity-logs':
        require 'admin/activity-logs.php';
        break;
    default:
        require '404.php';
        break;
}
