<?php

use App\Database\Models\User;

ob_start();
session_start();
require "vendor/autoload.php";
if (isset($_COOKIE['remember_me']) && empty($_SESSION['user'])) {
  $user = new User;
  $user->setEmail($_COOKIE['remember_me']);
  $databaseUser = $user->get()->fetch_object();
  $_SESSION['user'] = $databaseUser;
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Sabujcha - Matcha eCommerce <?= $pageName ?></title>
  <meta name="description" content="">
  <meta name="robots" content="noindex, follow" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/chosen.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/jquery-ui.css">
  <link rel="stylesheet" href="assets/css/meanmenu.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <link rel="stylesheet" href="assets/css/mycss.css">

  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

  <style>
    .content {
      text-align: center;
    }

    .content h1 {
      font-family: 'Sansita', sans-serif;
      letter-spacing: 1px;
      font-size: 50px;
      color: #282828;
      margin-bottom: 10px;
    }

    .content i {
      color: #FFC107;
    }

    .content span {
      position: relative;
      display: inline-block;
    }

    .content span:before,
    .content span:after {
      position: absolute;
      content: "";
      background-color: #282828;
      width: 40px;
      height: 2px;
      top: 40%;
    }

    .content span:before {
      left: -45px;
    }

    .content span:after {
      right: -45px;
    }

    .content p {
      font-family: 'Open Sans', sans-serif;
      font-size: 18px;
      letter-spacing: 1px;
    }

    .wrapper {
      position: relative;
      display: inline-block;
      border: none;
      font-size: 14px;
      margin: 50px auto;
      left: 50%;
      /* transform: translateX(-50%); */
    }

    .wrapper input {
      border: 0;
      width: 1px;
      height: 1px;
      overflow: hidden;
      position: absolute !important;
      clip: rect(1px 1px 1px 1px);
      clip: rect(1px, 1px, 1px, 1px);
      opacity: 0;
    }

    .wrapper label {
      position: relative;
      float: right;
      color: #C8C8C8;
    }

    .wrapper label:before {
      margin: 5px;
      content: "\f005";
      font-family: FontAwesome;
      display: inline-block;
      font-size: 1.5em;
      color: #ccc;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .wrapper input:checked~label:before {
      color: #FFC107;
    }

    .wrapper label:hover~label:before {
      color: #ffdb70;
    }

    .wrapper label:hover:before {
      color: #FFC107;
    }
  </style>
</head>

<body>