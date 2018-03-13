<h2><?php echo $title ?></h2>
<ul>
    <?php foreach ($todolist as $todo_item ): ?>
    <?php echo "<li>".$todo_item ['id']. ". ".$todo_item['title']. "</li>"; ?>
    <?php endforeach ?>
</ul>
