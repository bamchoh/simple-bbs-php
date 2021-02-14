{config_load file="test.conf" section="setup"}
{include file='header.tpl'}

<div class="container">
<h1>bamchohの掲示板</h1>

<div class="alert alert-primary" role="alert">
こんにちわ <b>{$name|default:'ゲスト'}</b> さん!!

{if $count eq 1}
  初めての訪問ありがとうございます!!
{else}
  <b>{$count}</b> 回目の訪問ありがとうございます!!
{/if}
</div>

<form method="POST" action="{$bbs_dir}/api/article">
  <input type="hidden" name="csrf_token" value="{$csrf_token}">
  <div class="form-group">
    <label for="InputName">名前</label>
    <input class="form-control" name="name" type="text" value="{$name}">
  </div>
  <div class="form-group">
    <label for="InputArticle">記事</label>
    <textarea class="form-control" class="aahub_light" name="article" cols="80%" rows="8"></textarea>
  </div>
  <button class="btn btn-primary" type="submit">
    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
    送信
  </button>
</form>

{if $flash ne ''}
  <div class="alert alert-danger" role="alert">
    {$flash}
  </div>
{/if}

<div class="mb-4"></div>

{foreach from=$messages item="message"}
  名前: {$message.name} - {$message.create_at} <br />
  <div class="aahub_light"><pre>{$message.article}</pre></div>
{/foreach}
</div>

{include file='footer.tpl'}
