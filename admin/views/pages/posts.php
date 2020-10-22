<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Управление записями</h3>
        <div class="row mt">
            <div class="col-lg-12 ">
                <div class="form-panel">
                    <hr>
                    <h4 class="mb text-center"> Все записи</h4>
                    <div class="row">
                        <div class="col-sm-1 col-sm-2">
                            <input type="text" value="ID" class="form-control" readonly>
                        </div>
                        <div class="col-sm-5">
                            <input type="text" value="Названия постов" class="form-control" readonly>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" value="Категория" class="form-control" readonly>
                        </div>
                        <div class="col-sm-2">
                            <form class="form-horizontal" action="/admin/post_choice" method="POST">
                                <button type="submit" name="newpostedit" class="btn btn-info">добавить пост</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <?php
                        for ($i = 0; $i < count($data['posts']); $i++) {
                            $id = $data['posts'][$i]['id'];
                            $title = $data['posts'][$i]['title'];
                            $imgsrc = $data['posts'][$i]['imgsrc'];
                            $category_id = $data['posts'][$i]['category_id'];
                        ?>
                            <form class="form-horizontal" action="/admin/post_choice" method="POST">
                                <div class="col-sm-1 col-2">
                                    <input type="text" name="id" value="<?php echo $id; ?>" class="form-control" readonly>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" readonly>
                                </div>
                                <div class="col-sm-3">
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
                                <button type="submit" name="savecatpostok" class="btn btn-info">edit</button>
                                <button type="submit" name="onepost" class="btn btn-theme">Пост</button>
                                <button type="submit" name="delete" class="btn btn-danger">Удалить</button>
                            </form>
                            <br>
                        <?php } ?>
                    </div>
                </div>
                <!-- /form-panel -->
            </div>
            <!-- /col-lg-12 -->
        </div>
        <div class="col-12 mb-sm-0 mb-6">
            <!-- pagination -->
            <ul class="list-unstyled pagination d-flex justify-content-center align-items-end">
                <?php
                $currentPage = empty($_GET['cpage']) ? 1 : $currentPage = intval($_GET['cpage']);
                $category_id = empty($_GET['category']) ? null : $category_id = intval($_GET['category']);
                ?>
                <li class="page-item"><a class="page-link" href="/admin/posts/?<?php if ($category_id != null) echo "category=$category_id&"; ?>cpage=1">В начало</a></li>
                <li><a href="/admin/posts/?
								<?php
                                if ($category_id != null) echo "category=$category_id&"; ?>
								cpage=<?php echo $currentPage > 1 ? $currentPage - 1 : 1 ?>"><i class="fas fa-chevron-left"><<</i></a></li>

                <!-- ----------------------------------------------------------------------- -->
                <?php
                // varDump($data['pageCount']);
                ?>
                <?php for ($i = 1; $i < $data['pageCount'] + 1; $i++) { ?>
                    <li class="<?php echo $i == $currentPage ? "active" : '' ?>"><a href="/admin/posts/?
								<?php
                                if ($category_id != null) echo "category=$category_id&";
                                ?>cpage=
								<?php
                                echo $i;
                                ?>"><?php echo $i ?></a></li>
                <?php } ?>
                <!-- ----------------------------------------------------------------------- -->
                <li><a href="/admin/posts/?<?php if ($category_id != null) echo "category=$category_id&"; ?>
								cpage=<?php echo $currentPage < $data['pageCount'] ? $currentPage + 1 : $data['pageCount'] ?>"><i class="fas fa-chevron-right">>></i></a></li>
                <li class="page-item"><a class="page-link" href="/admin/posts/?<?php if ($category_id != null) echo "category=$category_id&"; ?>cpage=<?php echo  $data['pageCount'] ?>">В конец</a></li>
            </ul>
        </div>
    </section>
    <script src="/admin/static/lib/zzzz.js"></script>