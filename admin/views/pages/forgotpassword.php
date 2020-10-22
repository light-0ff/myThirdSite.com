<!-- <h1>Восстановить пароль</h1> -->
<div id="login-page">
    <div class="container">
      <form class="form-login" action="/admin/changepassword" method='POST'>
        <h2 class="form-login-heading">Восстановить пароль</h2>
        <div class="login-wrap">
            <input type="email" class="form-control" placeholder="email" autofocus name='email'>
            <br>
            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Отправить</button>
          <hr>
          <div class="registration">
            У Вас нету аккаунта?<br/>
            <a class="" href="/admin/register">
              Создать учетную запись
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>