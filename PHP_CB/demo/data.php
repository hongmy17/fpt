<?php
session_start();

$_SESSION["persons"] = [
  [
    "id" => 1,
    "name" => "John Doe",
    "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    "image" => "https://via.placeholder.com/150",
    "status" => 1,
  ],
  [
    "id" => 2,
    "name" => "Jane Smith",
    "description" => "Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
    "image" => "https://via.placeholder.com/150",
    "status" => 0,
  ],
  [
    "id" => 3,
    "name" => "Alice Johnson",
    "description" => "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
    "image" => "https://via.placeholder.com/150",
    "status" => 1,
  ]
];