<div class="album py-5 bg-light">
    <div class="container">
        <h2><?php echo $title; ?></h2>
        <?php 
        foreach ($posts as $post) {
            echo  "<h3>".$post['title']."</h3>";
            echo  "<p>Created At: ".$post['created_at']."</p>";
            echo  "<div>".$post['content']."</div>";
        }
        ?>
    </div>
</div>
