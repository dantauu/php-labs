<div class="sidebar">
    <h3>Регионы</h3>
    <ul class="regions-list">
        <?php
        $stmt = $conn->query("SELECT * FROM region ORDER BY name");
        while ($region = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<li><a href="?region=' . $region['id'] . '">' . htmlspecialchars($region['name']) . '</a></li>';
        }
        ?>
    </ul>
</div> 