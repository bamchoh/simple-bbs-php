{config_load file="test.conf" section="setup"}
{include file='header.tpl'}

<div class="container">

<div class="row justify-content-center align-items-center">
<div class="col-md-6 col-md-offset-3">

<h1>ログイン</h1>

<form method="POST" action="{$bbs_dir}/api/signup">
  <input type="hidden" name="csrf_token" value="{$csrf_token}">
  <div class="form-group">
    <label for="InputEmail">メールアドレス</label>
    <input class="form-control" name="email" type="text">
  </div>
  <div class="form-group">
    <label for="InputPassword">パスワード</label>
    <input type="password" class="form-control" id="InputPassword">
  </div>
  <button class="btn btn-primary" type="submit">
    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
    ログイン
  </button>
</form>

</div>
</div>
</div>
{include file='footer.tpl'}
