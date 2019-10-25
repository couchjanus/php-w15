<div class="col-10 p-5 mx-auto">
    <div class="row">
        <div class="col-sm-10">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="col-sm-2">
            <a href="/profile" class="pull-right"><img title="profile image" class="img-circle img-responsive"
                    src="/assets/images/user.png"> <?= $user->name;?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            <ul class="list-group">
                <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> 2.13.2019</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Your Email</strong></span> <?= $user->email;?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Your Cname</strong></span> <?= $user->name;?></li>
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Website: <i class="fa fa-link fa-1x"></i> <a href="#">http://peculiar.my</a></div>
            </div>

            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">
                    <i class="fab fa-facebook fa-2x"></i> 
                    <i class="fab fa-github fa-2x"></i> 
                    <i class="fab fa-twitter fa-2x"></i> 
                    <i class="fab fa-pinterest fa-2x"></i> 
                    <i class="fab fa-google-plus fa-2x"></i>
                </div>
            </div>

        </div>
        <!--/col-3-->
        <div class="col-9 px-3 py-3">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Profile</a>
                    <a class="nav-item nav-link" href="/profile/orders">Orders</a>
                    <a class="nav-item nav-link" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false">Contact</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab"
                        aria-controls="nav-about" aria-selected="false">Information</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active showcase--wrapper" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat
                    veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim.
                    Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim
                    non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor
                    ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore.
                    Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat
                    veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim.
                    Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim
                    non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor
                    ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore.
                    Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat
                    veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim.
                    Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim
                    non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor
                    ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore.
                    Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                </div>
                <div class="tab-pane fade px-3" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">

                    <form method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">User Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $user->name;?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" value="<?= $user->first_name;?>" name="first_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $user->last_name;?>">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="<?= $user->phone_number;?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/row-->