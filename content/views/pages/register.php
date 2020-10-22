<div id="login-page">
    <div class="container">
      <form class="form-login" action="/admin/createuser" method='POST'>
        <h2 class="form-login-heading">Регистрация</h2>
        <div class="login-wrap">
          <input type="login" class="form-control" placeholder="login" autofocus name='login'>
          <br>
          <input type="email" class="form-control" placeholder="email" autofocus name='email'>
          <br>
          <input type="password" class="form-control" placeholder="Password" name="password">
          <!-- <label class="checkbox">
            <span class="pull-right">
                <a data-toggle="modal" href="/admin/forgotpassword"> Забыли пароль?</a>
            </span>
          </label>
            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Зарегистрироватся</button> -->
        </div>
      </form>
    </div>
  </div>