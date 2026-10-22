<?php
require_once __DIR__ . '/includes/config.php';

unset($_SESSION['user']);
session_regenerate_id(true);

redirect('index.php');
