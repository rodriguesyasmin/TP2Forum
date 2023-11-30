<?php
require_once('lib/connex.php');
$sql = "SELECT * FROM forum order by dateArticle limit 5";
$result = mysqli_query($connex, $sql);

if (!$_SESSION) {
} else {
?>
    <h1> Oi, <?= $_SESSION['nom']; ?>!
    <?php
}

    ?>
      <h1>Bienvenue dans le forum!</h1>

<?php
foreach ($result as $row) {
?>
    <div class="forum-post">
        <div class="post-title">Titre: <?= $row['titre']; ?></div>
        <div class="post-content">Article: <?= $row['article']; ?></div>
        <div class="post-info">
            <div class="post-date">Date: <?= $row['dateArticle']; ?></div>
            <div class="post-author">Author: <?= $row['author']; ?></div>
        </div>
        <div class="invisible"><?= $_SESSION['id']; ?></div>
        <a href="index.php?controller=forum&function=deleterArticle&id=<?= $row['id']; ?>"><button type="submit">deleter</button></a>
    </div>
<?php
}
?>

<div class="logout-link">
    <a href="index.php?controller=forum&function=logout">Logout</a>
</div>