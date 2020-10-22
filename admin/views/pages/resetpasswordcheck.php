<h1>старый и новый пароли</h1>
<div id="login-page">
  <div class="container">
    <form class="form-login" action="/admin/resetpasswordcheck/resetpasswordcheck/?hash=<?php echo $_GET['hash'] ?>" method='POST'>
      <h2 class="form-login-heading">Reset</h2>
      <div class="login-wrap">
        <input type="password" class="form-control" placeholder="new password" name="password">
        <br>
        <input type="password" class="form-control" placeholder="repeat password" name='repeat_password'>
        <br>
        <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Отправить</button>
        <hr>
        <div class="registration">
          У Вас нету аккаунта?<br />
          <a class="" href="/admin/register">
            Создать учетную запись
          </a>
        </div>
      </div>
    </form>
  </div>
</div>