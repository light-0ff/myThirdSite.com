<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Панель навигации</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
            <h3 class="text-center">Добавление нового элемента</h3>
            <form class="form-horizontal" action="/admin/nav_add" method="POST">
            <div class="col-sm-2">
                <input type="text" name="title"  class="form-control" placeholder="title">
            </div>
            <div class="col-sm-2">
                <input type="text" name="href"  class="form-control" placeholder="href">
            </div>
            <div class="col-sm-2">
                <input type="text" name="order_id"  class="form-control" placeholder="order">
            </div>
            <div class="col-sm-2">
                <input type="text" name="parent_id"  class="form-control" placeholder="parent">
            </div>
            <button type="submit" name="save" class="btn btn-theme">Добавить</button>
            
            
        </form>
        <hr>
        <h4 class="mb"><i class="fa fa-angle-right"></i> Управление навигацией</h4>
          <?php
        //   varDump($data['navigate']);
          for ($i = 0; $i < count($data['navigate']); $i++) {
            $id = $data['navigate'][$i]['id'];
            $title = $data['navigate'][$i]['title'];
            $href = $data['navigate'][$i]['href'];
            $order_id = $data['navigate'][$i]['order_id'];
            $parent_id = $data['navigate'][$i]['parent_id'];
          ?>
            <form class="form-horizontal" action="/admin/actionchoice" method="POST">
              <div class="col-sm-2 col-2">
                <input type="text" name="id" value="<?php echo $id; ?>" class="form-control" placeholder="id" readonly>
              </div>
              <div class="col-sm-2">
                <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="title">
              </div>
              <div class="col-sm-2">
                <input type="text" name="href" value="<?php echo $href; ?>" class="form-control" placeholder="href">
              </div>
              <div class="col-sm-2">
                <input type="text" name="order_id" value="<?php echo $order_id; ?>" class="form-control" placeholder="order">
              </div>
              <div class="col-sm-2">
                <input type="text" name="parent_id" value="<?php echo $parent_id; ?>" class="form-control" placeholder="parent">
              </div>

              <button type="submit" name="save" class="btn btn-theme">Сохранить</button>
              <button type="submit" name="delete" class="btn btn-danger">Удалить</button>

            </form>
            <br>
          <?php } ?>
          
        </div>
        <!-- /form-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
  </section>