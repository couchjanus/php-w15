<div class="album py-5 bg-light">
    <div class="container">
        <h2><?php echo $title; ?></h2>
        <?php 
        if (isset($posts)):
            printf("<h3>There Are %d Posts In Blog</h3>", count($posts));  
            foreach ($posts as $post) {
                echo  "<li>".$post['title']."</li>";
            }     
        else:
            printf("<h2 style='color: #%x%x%x'>No Posts Yet...</h2>", 165, 27, 45);
        endif;
        ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Add New Post.
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="name" name="title"
                                    aria-describedby="emailHelp" placeholder="Enter name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Content</label>
                                <textarea class="form-control" id="message" name="content" rows="6" required></textarea>
                            </div>
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary text-right">Add New</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>