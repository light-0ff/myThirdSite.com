<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Редактировать Пост</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Пост</h4>
                    <?php
                    $id = $data['postdata']['id'];
                    $category_id = $data['postdata']['category_id'];
                    $title = $data['postdata']['title'];
                    $slogan = $data['postdata']['slogan'];
                    $imgsrc = $data['postdata']["imgsrc"];
                    $imgalt = $data['postdata']["imgalt"];
                    $price =  $data['postdata']["price"];
                    $content = $data['postdata']["content"];

                    ?>
                    <form role="form" class="form-horizontal" enctype="multipart/form-data" action="/admin/post_choice" method="POST">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">id</label>
                            <div class="col-lg-6">
                                <input type="text" id="c-name" name="id" value="<?php echo $id ?>" class="form-control" placeholder="id" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Category id</label>
                            <div class="col-lg-6">
                                <select class="form-control selectCurrentCategory" name="currentcateg_id">
                                    <?php
                                    for ($c = 0; $c < count($data['categories']); $c++) {
                                        $id = $data['categories'][$c]['id'];
                                        $cat = $data['categories'][$c]['category'];
                                        echo "<option value='$id' " . (($id == $category_id) ? "selected" : "") . " >$cat</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Title</label>
                            <div class="col-lg-6">
                                <input type="text" id="c-name" name="title" value="<?php echo $title ?>" class="form-control" placeholder="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Slogan</label>
                            <div class="col-lg-6">
                                <input type="text" id="c-name" name="slogan" value="<?php echo $slogan ?>" class="form-control" placeholder="slogan">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-lg-2 control-label">Img Src</label>
                            <div class="col-lg-10">
                                <textarea rows="10" cols="30" class="form-control" name="imgsrc"><?php echo $imgsrc ?></textarea>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="col-lg-2 control-label">Img src</label>
                            <div class="col-lg-6">
                                <input type="text" id="c-name" name="imgsrc" value="<?php echo $imgsrc ?>" class="form-control" placeholder="imgsrc">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Img src</label>
                            <div class="col-lg-10">
                                <img style="max-width: 25%;" src="<?php echo $imgsrc ?>" alt="<?php echo $imgalt ?>">
                                <br>
                                <br>
                                <input type="file" name="imgSrc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Img alt</label>
                            <div class="col-lg-6">
                                <input type="text" id="c-name" name="imgalt" value="<?php echo $imgalt ?>" class="form-control" placeholder="imgalt">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Price</label>
                            <div class="col-lg-6">
                                <input type="text" id="c-name" name="price" value="<?php echo $price ?>" class="form-control" placeholder="price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Контент</label>
                            <div class="col-lg-10">
                                <textarea id="summernote" name="content"><?php echo $content ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-theme" type="submit" name="editpost">Save</button>
                                <button class="btn btn-theme04" type="submit" name="delete">Cancel</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <!-- include summernote css/js -->
                    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
                    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

                    <script>
                        $(document).ready(function() {
                            $('#summernote').summernote();
                        });
                    </script>

                </div>
                <!-- /form-panel -->
            </div>
            <!-- /col-lg-12 -->
        </div>
    </section>