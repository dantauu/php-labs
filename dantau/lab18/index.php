<?php
require_once 'blocks/db.php';
$isAuth = isset($_SESSION['login']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Города России</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <?php include "blocks/header.php"; ?>
        
        <div class="content">
            <div class="main-content">
                <?php
                if (isset($_GET['content'])) {
                    $content = $_GET['content'];
                    include $content;
                } else {
                    if (isset($_GET['region'])) {
                        $region_id = (int)$_GET['region'];
                        $stmt = $conn->prepare("
                            SELECT c.*, r.name as region_name 
                            FROM cities c 
                            JOIN region r ON c.region_id = r.id 
                            WHERE c.region_id = :region_id 
                            ORDER BY c.name
                        ");
                        $stmt->execute([':region_id' => $region_id]);
                    } else {
                        $stmt = $conn->query("
                            SELECT c.*, r.name as region_name 
                            FROM cities c 
                            JOIN region r ON c.region_id = r.id 
                            ORDER BY c.id DESC 
                            LIMIT 5
                        ");
                    }
                    
                    while ($city = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <div class="city-card">
                            <a href="?content=pages/single_city.php&city=<?php echo $city['id']; ?>">
                                <img src="img/cities/<?php echo $city['logo'] ?? 'default.jpg'; ?>" alt="<?php echo htmlspecialchars
                                ($city['name']); ?>" class="city-logo">
                            </a>
                            <div class="city-info">
                                <h2 class="city-name">
                                    <a href="?content=pages/single_city.php&city=<?php echo $city['id']; ?>">
                                        <?php echo htmlspecialchars($city['name']); ?>
                                    </a>
                                </h2>
                                <div class="region-name"><?php echo htmlspecialchars($city['region_name']); ?></div>
                                <p><?php echo htmlspecialchars($city['description']); ?></p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <?php include "blocks/sidebar.php"; ?>
        </div>
        
        <?php include "blocks/footer.php"; ?>
    </div>
</body>
</html> 