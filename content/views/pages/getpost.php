<section id="page_header">
    <div class="page_title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <h2 class="title">Blog</h2>
                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit</p> -->
                </div>
            </div>
        </div>
    </div>
</section>


<section class="feature_wrap padding-half">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <!-- <h2 class="heading ">Рассматриваем один пост</h2> -->
                <h2>Ето болванка, в контроллере постов заменить путь на: <br> PAGES_PATH . 'blog-detail' . EXT</h2>
                <hr class="heading_space">
                <p>Вернитесь на <a href="/">главную</a></p>
            </div>
        </div>
    </div>
</section>
<!-- ================ -->
<!-- Blog Details -->
<section id="blog" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="blog_item padding-bottom order-page">
                    <h2><?php

                        use function App\isChield; //удалить

                        echo $data['postdata']["title"] ?></h2>
                    <ul class="comments">
                        <li><a href="#.">Nov 10, 2016</a></li>
                        <li><a href="#."><?php echo $data['postdata']["DATE"] ?></a></li>
                        <li><a href="#."><i class="icon-chat-2"></i>5</a></li>
                    </ul>
                    <p>написать функцию что переводит цыфровое значение в месяц</p>
                    <div class="image_container">
                        <img src="<?php echo $data['postdata']["imgsrc"] ?>" class="img-responsive" alt="<?php echo $data['postdata']["imgalt"] ?>">
                    </div>
                    <p>слоган: <?php echo $data['postdata']["slogan"] ?></p>
                    <h3 class="half_space">Контент: </h3>
                    <p><?php echo $data['postdata']["content"] ?> ---</p>
                    <a class="btn-common button2" href="#"><?php echo $data['postdata']["price"] ?>$</a>
                    <blockquote class="bg_grey">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel
                        illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue
                        duis dolore te feugait nulla facilisi.</blockquote>

                    <div class="clearfix">
                        <ul class="comments pull-left">
                            <li><a href="#."><i class="icon-tag2"></i>benefits, continental, food</a></li>
                        </ul>
                        <ul class="social_icon pull-right">
                            <li><a href="#." class="black"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#." class="black"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#." class="black"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <h3><?php echo count($data['comments']) ?> Comments</h3>

                    <div class="container">
                        <div class="post-comments">
                            <div class="row">
                                <?php
                                // echo isChield($data['comments']);
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php

                    for ($i = 0; $i < count($data['comments']); $i++) {
                    ?>
                        <div class="media blog-reply  
                        <?php echo $data['comments'][$i]["parent_id"] != null ?  " col-md-offset-2" : null
                        ?>">
                            <div class="pull-left">
                                <a href="#.">
                                    <img class="avatar-class" alt="Аватар" src="<?php echo $data['comments'][$i]['avatar'] ?>">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4><?php echo $data['comments'][$i]['fio'] ?></h4>
                                <span><?php echo $data['comments'][$i]['date'] ?></span>
                                <p class="no-margin"><?php echo $data['comments'][$i]['comment'] ?></p>
                                <a class="reply" href="#.">Reply</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <h3>Leave a Reply</h3>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <form class="callus">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" required placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="email" required placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" required placeholder="Website">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-submit button3">Submit Request</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-5">
                <aside class="sidebar">
                    <div class="widget">
                        <ul class="tabs">
                            <li class="active" rel="tab1">Popular </li>
                            <li rel="tab2">Latest</li>
                            <li rel="tab3">Comments</li>
                        </ul>
                        <div class="tab_container bg_grey">
                            <h3 class="d_active tab_drawer_heading" rel="tab1">Popular</h3>
                            <div id="tab1" class="tab_content">
                                <div class="single_comments">
                                    <img alt="" src="images/avator1.jpg">
                                    <p><a href="#.">Celebration with Music </a>
                                        <span>Nov 05, 2016</span>
                                    </p>

                                </div>
                                <div class="clearfix"></div>
                                <div class="single_comments">
                                    <img alt="" src="images/avator1.jpg">
                                    <p><a href="#.">Duis autem vel eum iriure dolor</a><span>Nov 25, 2016</span></p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="single_comments no-margin">
                                    <img alt="" src="images/avator1.jpg">
                                    <p><a href="#.">Lorem ipsum dolor sit amet</a> <span>Nov 05, 2016</span></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <h3 class="tab_drawer_heading" rel="tab2">Latest</h3>
                            <div id="tab2" class="tab_content">
                                <div class="single_comments">
                                    <img alt="" src="images/avator1.jpg">
                                    <p><a href="#.">Lorem ipsum dolor sit amet</a> <span>Nov 05, 2016</span></p>
                                </div>
                            </div>
                            <h3 class="tab_drawer_heading" rel="tab3">Comments</h3>
                            <div id="tab3" class="tab_content">
                                <div class="single_comments">
                                    <img alt="" src="images/avator1.jpg">
                                    <p><a href="#.">Ut wisi enim ad minim</a> <span>Nov 05, 2016</span></p>

                                </div>
                                <div class="single_comments">
                                    <img alt="" src="images/avator1.jpg">
                                    <p><a href="#.">Lorem ipsum dolor</a> <span>Nov 05, 2016</span></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Categories</h3>
                        <ul class="widget_links">
                            <li><a href="#.">Food</a></li>
                            <li><a href="#.">Special Occasion</a></li>
                            <li><a href="#.">Presentation</a></li>
                            <li><a href="#.">Corporate Dining</a></li>
                            <li><a href="#.">Reservation</a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h3>Tags</h3>
                        <ul class="tags">
                            <li><a href="#.">Our Events</a></li>
                            <li><a href="#.">Lorem ipsum</a></li>
                            <li><a href="#.">sit amet</a></li>
                            <li><a href="#.">Lorem ipsum </a></li>
                            <li><a href="#.">Presentation</a></li>
                            <li><a href="#.">Reservation</a></li>
                            <li><a href="#.">Special Occasion</a></li>
                            <li><a href="#."> Lunch</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- ===================== -->
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
<!-- ===================== -->

<!-- <div class="container">
    <div class="post-comments">
        <div class="row">
            <div class="media">
                <div class="media-heading">
                    <button class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">12314</span> terminator 12 hours ago
                </div>
                <div class="panel-collapse collapse in" id="collapseOne">
                    <div class="media-left">
                        <div class="vote-wrap">
                            <div class="save-post">
                                <a href="#"><span class="glyphicon glyphicon-star" aria-label="Save"></span></a>
                            </div>
                            <div class="vote up">
                                <i class="glyphicon glyphicon-menu-up"></i>
                            </div>
                            <div class="vote inactive">
                                <i class="glyphicon glyphicon-menu-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="media-body">
                        <p>third ###############################################################################.</p>
                        <div class="comment-meta">
                            <span><a href="#">sil</a></span>
                            <span><a href="#">kaydet</a></span>
                            <span><a href="#">sikayer et</a></span>
                            <span>
                                <a class="" role="button" data-toggle="collapse" href="#replyCommentFour" aria-expanded="false" aria-controls="collapseExample">cevapla</a>
                            </span>
                            <div class="collapse" id="replyCommentFour">
                                <form>
                                    <div class="form-group">
                                        <label for="comment">Yorumunuz</label>
                                        <textarea name="comment" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">Yolla</button>
                                </form>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-heading">
                                <button class="btn btn-default btn-collapse btn-xs" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">12314</span> vertu 12 sat once yazmis
                            </div>
                            <div class="panel-collapse collapse in" id="collapseFour">
                                <div class="media-left">
                                    <div class="vote-wrap">
                                        <div class="save-post">
                                            <a href="#"><span class="glyphicon glyphicon-star" aria-label="Kaydet"></span></a>
                                        </div>
                                        <div class="vote up">
                                            <i class="glyphicon glyphicon-menu-up"></i>
                                        </div>
                                        <div class="vote inactive">
                                            <i class="glyphicon glyphicon-menu-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>forth ######################################################################.</p>
                                    <div class="comment-meta">
                                        <span><a href="#">sil</a></span>
                                        <span><a href="#">kaydet</a></span>
                                        <span><a href="#">sikayer et</a></span>
                                        <span>
                                            <a class="" role="button" data-toggle="collapse" href="#replyCommentFive" aria-expanded="false" aria-controls="collapseExample">cevapla</a>
                                        </span>
                                        <div class="collapse" id="replyCommentFive">
                                            <form>
                                                <div class="form-group">
                                                    <label for="comment">Yorumunuz</label>
                                                    <textarea name="comment" class="form-control" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-default">Yolla</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-heading">
                                            <button class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">12314</span> vertu 12 sat once yazmis
                                        </div>
                                        <div class="panel-collapse collapse in" id="collapseFive">
                                            <div class="media-left">
                                                <div class="vote-wrap">
                                                    <div class="save-post">
                                                        <a href="#"><span class="glyphicon glyphicon-star" aria-label="Kaydet"></span></a>
                                                    </div>
                                                    <div class="vote up">
                                                        <i class="glyphicon glyphicon-menu-up"></i>
                                                    </div>
                                                    <div class="vote inactive">
                                                        <i class="glyphicon glyphicon-menu-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <p>fifth ######################################################################.</p>
                                                <div class="comment-meta">
                                                    <span><a href="#">sil</a></span>
                                                    <span><a href="#">kaydet</a></span>
                                                    <span><a href="#">sikayer et</a></span>
                                                    <span>
                                                        <a class="" role="button" data-toggle="collapse" href="#replyCommentSix" aria-expanded="false" aria-controls="collapseExample">cevapla</a>
                                                    </span>
                                                    <div class="collapse" id="replyCommentSix">
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="comment">Yorumunuz</label>
                                                                <textarea name="comment" class="form-control" rows="3"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-default">Yolla</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <div class="media-heading">
                                                        <button class="btn btn-default btn-collapse btn-xs" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">12314</span> vertu 12 sat once yazmis
                                                    </div>
                                                    <div class="panel-collapse collapse in" id="collapseSix">
                                                        <div class="media-left">
                                                            <div class="vote-wrap">
                                                                <div class="save-post">
                                                                    <a href="#"><span class="glyphicon glyphicon-star" aria-label="Kaydet"></span></a>
                                                                </div>
                                                                <div class="vote up">
                                                                    <i class="glyphicon glyphicon-menu-up"></i>
                                                                </div>
                                                                <div class="vote inactive">
                                                                    <i class="glyphicon glyphicon-menu-down"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p>six ######################################################################################.</p>
                                                            <div class="comment-meta">
                                                                <span><a href="#">sil</a></span>
                                                                <span><a href="#">kaydet</a></span>
                                                                <span><a href="#">sikayer et</a></span>
                                                                <span>
                                                                    <a class="" role="button" data-toggle="collapse" href="#replyCommentOne" aria-expanded="false" aria-controls="collapseExample">cevapla</a>
                                                                </span>
                                                                <div class="collapse" id="replyCommentOne">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <label for="comment">Yorumunuz</label>
                                                                            <textarea name="comment" class="form-control" rows="3"></textarea>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-default">Yolla</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>







                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- ===================== -->