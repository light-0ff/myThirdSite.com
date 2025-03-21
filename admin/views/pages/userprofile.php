<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <?php
        if (isset($data['succsess'])) {
            echo  '<div class="alert alert-success" role="alert">' . $data['succsess'] . '</div>';
        }
        if (isset($data['error'])) {
            echo '<div class="alert alert-danger" role="alert">' . $data['error'] . '</div>';
        }
        ?>
        <h1>Управление профилем</h1>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="row content-panel">

                    <!-- /col-md-4 -->
                    <div class="col-md-4 profile-text">
                        <h3><?php echo $data['userprofile']['fio'] ?></h3>
                        <!-- <h6>Main Administrator</h6> -->
                        <h4>Роль: </h4>
                        <p><?php echo $data['userprofile']['role'] ?></p>
                        <h4>О себе:</h4>
                        <p><?php echo $data['userprofile']['description'] ?></p>
                        <br>
                        <p><button class="btn btn-theme"><i class="fa fa-envelope"></i> Send Message</button></p>
                    </div>
                    <!-- /col-md-4 -->
                    <div class="col-md-4 centered">
                        <div class="profile-pic">
                            <p><img src="<?php echo $data['userprofile']['avatar'] ?>" class="img-circle"></p>
                            <!-- <p>
                    <button class="btn btn-theme"><i class="fa fa-check"></i> Follow</button>
                    <button class="btn btn-theme02">Add</button>
                  </p> -->
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /col-lg-12 -->
            <div class="col-lg-12 mt">
                <div class="row content-panel">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a data-toggle="tab" href="#overview">Overview</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#contact" class="contact-map">Contact</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#edit">Edit Profile</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /panel-heading -->
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="overview" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-6">
                                        <textarea rows="3" class="form-control" placeholder="Whats on your mind?"></textarea>
                                        <div class="grey-style">
                                            <div class="pull-left">
                                                <button class="btn btn-sm btn-theme"><i class="fa fa-camera"></i></button>
                                                <button class="btn btn-sm btn-theme"><i class="fa fa-map-marker"></i></button>
                                            </div>
                                            <div class="pull-right">
                                                <button class="btn btn-sm btn-theme03">POST</button>
                                            </div>
                                        </div>
                                        <div class="detailed mt">
                                            <h4>Recent Activity</h4>
                                            <div class="recent-activity">
                                                <div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
                                                <div class="activity-panel">
                                                    <h5>1 HOUR AGO</h5>
                                                    <p>Purchased: Dashio Admin Panel & Front-end theme.</p>
                                                </div>
                                                <div class="activity-icon bg-theme02"><i class="fa fa-trophy"></i></div>
                                                <div class="activity-panel">
                                                    <h5>5 HOURS AGO</h5>
                                                    <p>Task Completed. Resolved issue with Disk Space.</p>
                                                </div>
                                                <div class="activity-icon bg-theme04"><i class="fa fa-rocket"></i></div>
                                                <div class="activity-panel">
                                                    <h5>3 DAYS AGO</h5>
                                                    <p>Launched a new product: Flat Pack Heritage.</p>
                                                </div>
                                            </div>
                                            <!-- /recent-activity -->
                                        </div>
                                        <!-- /detailed -->
                                    </div>
                                    <!-- /col-md-6 -->
                                    <div class="col-md-6 detailed">
                                        <h4>User Stats</h4>
                                        <div class="row centered mt mb">
                                            <div class="col-sm-4">
                                                <h1><i class="fa fa-money"></i></h1>
                                                <h3>$22,980</h3>
                                                <h6>LIFETIME EARNINGS</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <h1><i class="fa fa-trophy"></i></h1>
                                                <h3>37</h3>
                                                <h6>COMPLETED TASKS</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <h1><i class="fa fa-shopping-cart"></i></h1>
                                                <h3>1980</h3>
                                                <h6>ITEMS SOLD</h6>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                        <h4>My Friends</h4>
                                        <div class="row centered mb">
                                            <ul class="my-friends">
                                                <li>
                                                    <div class="friends-pic"><img class="img-circle" width="35" height="35" src="/admin/static/img/friends/fr-01.jpg"></div>
                                                </li>
                                                <li>
                                                    <div class="friends-pic"><img class="img-circle" width="35" height="35" src="/admin/static/img/friends/fr-02.jpg"></div>
                                                </li>
                                                <li>
                                                    <div class="friends-pic"><img class="img-circle" width="35" height="35" src="/admin/static/img/friends/fr-03.jpg"></div>
                                                </li>
                                                <li>
                                                    <div class="friends-pic"><img class="img-circle" width="35" height="35" src="/admin/static/img/friends/fr-04.jpg"></div>
                                                </li>
                                                <li>
                                                    <div class="friends-pic"><img class="img-circle" width="35" height="35" src="/admin/static/img/friends/fr-05.jpg"></div>
                                                </li>
                                                <li>
                                                    <div class="friends-pic"><img class="img-circle" width="35" height="35" src="/admin/static/img/friends/fr-06.jpg"></div>
                                                </li>
                                                <li>
                                                    <div class="friends-pic"><img class="img-circle" width="35" height="35" src="/admin/static/img/friends/fr-07.jpg"></div>
                                                </li>
                                                <li>
                                                    <div class="friends-pic"><img class="img-circle" width="35" height="35" src="/admin/static/img/friends/fr-08.jpg"></div>
                                                </li>
                                                <li>
                                                    <div class="friends-pic"><img class="img-circle" width="35" height="35" src="/admin/static/img/friends/fr-09.jpg"></div>
                                                </li>
                                                <li>
                                                    <div class="friends-pic"><img class="img-circle" width="35" height="35" src="/admin/static/img/friends/fr-10.jpg"></div>
                                                </li>
                                                <li>
                                                    <div class="friends-pic"><img class="img-circle" width="35" height="35" src="/admin/static/img/friends/fr-11.jpg"></div>
                                                </li>
                                            </ul>
                                            <div class="row mt">
                                                <div class="col-md-4 col-md-offset-4">
                                                    <h6><a href="#">VIEW ALL</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                        <h4>Pending Tasks</h4>
                                        <div class="row centered">
                                            <div class="col-md-8 col-md-offset-2">
                                                <h5>Dashboard Update (40%)</h5>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                        <span class="sr-only">40% Complete (success)</span>
                                                    </div>
                                                </div>
                                                <h5>Unanswered Messages (80%)</h5>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                        <span class="sr-only">80% Complete (success)</span>
                                                    </div>
                                                </div>
                                                <h5>Product Review (60%)</h5>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                        <span class="sr-only">60% Complete (success)</span>
                                                    </div>
                                                </div>
                                                <h5>Friend Requests (90%)</h5>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                        <span class="sr-only">90% Complete (success)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /col-md-8 -->
                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /col-md-6 -->
                                </div>
                                <!-- /OVERVIEW -->
                            </div>
                            <!-- /tab-pane -->
                            <div id="contact" class="tab-pane">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="map"></div>
                                    </div>
                                    <!-- /col-md-6 -->
                                    <div class="col-md-6 detailed">
                                        <h4>Location</h4>
                                        <div class="col-md-8 col-md-offset-2 mt">
                                            <p>
                                                Postal Address<br /> PO BOX 12988, Sutter Ave<br /> Brownsville, New York.
                                            </p>
                                            <br>
                                            <p>
                                                Headquarters<br /> 844 Sutter Ave,<br /> 9003, New York.
                                            </p>
                                        </div>
                                        <h4>Contacts</h4>
                                        <div class="col-md-8 col-md-offset-2 mt">
                                            <p>
                                                Phone: +33 4898-4303<br /> Cell: 48 4389-4393<br />
                                            </p>
                                            <br>
                                            <p>
                                                Email: hello@dashiotheme.com<br /> Skype: UseDashio<br /> Website: http://Alvarez.is
                                            </p>
                                        </div>
                                    </div>
                                    <!-- /col-md-6 -->
                                </div>
                                <!-- /row -->
                            </div>
                            <!-- /tab-pane -->
                            <div id="edit" class="tab-pane">
                                <div class="row">
                                    <div class="col-lg-8 col-lg-offset-2 detailed">
                                        <h4 class="mb">Personal Information</h4>
                                        <form role="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="/admin/edituserprofile">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"> Avatar</label>
                                                <div class="col-lg-6">
                                                    <input type="file" id="exampleInputFile" class="file-pos" name="avatar">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">ФИО</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="ФИО" id="c-name" class="form-control" name="fio" value="<?php echo $data['userprofile']['fio'] ?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $data['userprofile']['user_id'] ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Таланты</label>
                                                <div class="col-lg-10">
                                                    <textarea rows="10" cols="30" class="form-control" name="skils"><?php echo $data['userprofile']['skils'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">О СЕБЕ</label>
                                                <div class="col-lg-10">
                                                    <textarea rows="10" cols="30" class="form-control" name="description"><?php echo $data['userprofile']['description'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" type="submit">Save</button>
                                                    <button class="btn btn-theme04" type="button">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="col-lg-8 col-lg-offset-2 detailed mt">
                        <h4 class="mb">Contact Information</h4>
                        <form role="form" class="form-horizontal">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Address 1</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="addr1" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Address 2</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="addr2" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Phone</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="phone" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Cell</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="cell" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="email" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Skype</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="skype" class="form-control">
                            </div>
                          </div>
                        </form>
                      </div> -->
                                    <!-- /col-lg-8 -->
                                </div>
                                <!-- /row -->
                            </div>
                            <!-- /tab-pane -->
                        </div>
                        <!-- /tab-content -->
                    </div>
                    <!-- /panel-body -->
                </div>
                <!-- /col-lg-12 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->