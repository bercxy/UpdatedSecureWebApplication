<?php
session_start();

if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], ['admin', 'supervisor'])) {
    http_response_code(403);
    die("Access denied");
}
