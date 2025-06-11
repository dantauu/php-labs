<?php
if (!isset($_SESSION['login']) || $_SESSION['login'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$regions = $conn->query("SELECT * FROM region ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="admin-section">
    <h3>Добавить регион</h3>
    <form action="add_region.php" method="POST" class="form-container">
        <input type="text" name="name" placeholder="Название региона" required>
        <input type="text" name="code" placeholder="Код региона" required>
        <input type="submit" value="Добавить регион">
    </form>
</div>

<div class="admin-section">
    <h3>Список регионов</h3>
    <table class="admin-table">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Код</th>
            <th>Действия</th>
        </tr>
        <?php
        foreach ($regions as $region) {
            echo "<tr>";
            echo "<td>{$region['id']}</td>";
            echo "<td>" . htmlspecialchars($region['name']) . "</td>";
            echo "<td>{$region['code']}</td>";
            echo "<td><a href='delete_region.php?id={$region['id']}' onclick='return confirm(\"Удалить регион?\")'>Удалить</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<div class="admin-section">
    <h3>Добавить город</h3>
    <form action="add_city.php" method="POST" enctype="multipart/form-data" class="form-container">
        <input type="text" name="name" placeholder="Название города" required>
        <input type="number" name="area" placeholder="Площадь" required>
        <input type="number" name="population" placeholder="Население" required>
        <select name="region_id" required>
            <option value="">Выберите регион</option>
            <?php foreach ($regions as $region): ?>
                <option value="<?php echo $region['id']; ?>">
                    <?php echo htmlspecialchars($region['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <textarea name="description" placeholder="Описание города" required></textarea>
        <input type="file" name="logo">
        <input type="submit" value="Добавить город">
    </form>
</div>

<div class="admin-section">
    <h3>Список городов</h3>
    <table class="admin-table">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Регион</th>
            <th>Площадь</th>
            <th>Население</th>
            <th>Действия</th>
        </tr>
        <?php
        $stmt = $conn->query("
            SELECT c.*, r.name as region_name 
            FROM cities c 
            JOIN region r ON c.region_id = r.id 
            ORDER BY c.name
        ");
        while ($city = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$city['id']}</td>";
            echo "<td>" . htmlspecialchars($city['name']) . "</td>";
            echo "<td>" . htmlspecialchars($city['region_name']) . "</td>";
            echo "<td>" . number_format($city['area'], 2) . " км²</td>";
            echo "<td>" . number_format($city['population']) . "</td>";
            echo "<td><a href='delete_city.php?id={$city['id']}' onclick='return confirm(\"Удалить город?\")'>Удалить</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<style>
.admin-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.admin-table th,
.admin-table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

.admin-table th {
    background-color: #f8f9fa;
    font-weight: bold;
}

.admin-table tr:nth-child(even) {
    background-color: #f8f9fa;
}

.admin-table tr:hover {
    background-color: #f0f0f0;
}
</style> 