<?php

function getCities($conn) {
    $stmt = $conn->prepare("SELECT * FROM cities");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addCity($conn, $name, $area, $population) {
    $stmt = $conn->prepare("INSERT INTO cities (name, area, population) VALUES (:name, :area, :population)");
    return $stmt->execute([
        ':name' => $name,
        ':area' => $area,
        ':population' => $population
    ]);
}

function deleteCity($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM cities WHERE id = :id");
    return $stmt->execute([':id' => $id]);
}

function updateUserAvatar($conn, $login, $avatar) {
    $stmt = $conn->prepare("UPDATE users SET avatar = :avatar WHERE login = :login");
    return $stmt->execute([
        ':avatar' => $avatar,
        ':login' => $login
    ]);
} 