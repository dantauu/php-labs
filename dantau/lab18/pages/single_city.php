<?php
if (!isset($_GET['city'])) {
    header('Location: index.php');
    exit();
}

$city_id = (int)$_GET['city'];
$stmt = $conn->prepare("
    SELECT c.*, r.name as region_name 
    FROM cities c 
    JOIN region r ON c.region_id = r.id 
    WHERE c.id = :id
");
$stmt->execute([':id' => $city_id]);
$city = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$city) {
    header('Location: index.php');
    exit();
}
?>

<div class="single-city">
    <div class="single-city-image">
        <img src="img/cities/<?php echo $city['logo'] ?? 'default.jpg'; ?>" alt="<?php echo htmlspecialchars($city['name']); ?>">
    </div>
    <div class="single-city-info">
        <h1 class="single-city-name"><?php echo htmlspecialchars($city['name']); ?></h1>
        <div class="region-name"><?php echo htmlspecialchars($city['region_name']); ?></div>
        <div class="single-city-description">
            <p><?php echo htmlspecialchars($city['description']); ?></p>
            <p><strong>Площадь:</strong> <?php echo number_format($city['area'], 2); ?> км²</p>
            <p><strong>Население:</strong> <?php echo number_format($city['population']); ?> человек</p>
        </div>
    </div>
</div> 