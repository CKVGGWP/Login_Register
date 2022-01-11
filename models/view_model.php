<?php

if (isset($_GET['replace'])) {
    $html = '';

    $html .= '<form method="POST" class="clearfix" id="Register">';
    $html .= '<div class="form-group">';
    $html .= '<div class="input-group mb-3">';
    $html .= '<span class="input-group-text">';
    $html .= '<i class="fas fa-user"></i>';
    $html .= '</span>';
    $html .= '<input type="text" class="form-control" id="name">';
    $html .= '</div>';
    $html .= '<div class="input-group mb-3">';
    $html .= '<span class="input-group-text">';
    $html .= '<i class="fas fa-envelope"></i>';
    $html .= '</span>';
    $html .= '<input type="email" class="form-control" id="email">';
    $html .= '</div>';
    $html .= '<div class="input-group mb-3">';
    $html .= '<span class="input-group-text">';
    $html .= '<i class="fas fa-lock"></i>';
    $html .= '</span>';
    $html .= '<input type="password" class="form-control" id="password">';
    $html .= '</div>';
    $html .= '<button type="submit" class="btn btn-primary" id="registerHere">Register</button>';
    $html .= '</div>';
    $html .= '</form>';

    echo json_encode($html);
}
