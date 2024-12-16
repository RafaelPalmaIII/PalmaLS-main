<?php

// Admin routes
$app->get('/admin/adminlog.php', function ($request, $response, $args) {
    return $this->view->render($response, 'admin/adminlog.php');
});

$app->get('/admin/topbar.php', function ($request, $response, $args) {
    return $this->view->render($response, 'admin/topbar.php');
});
