{config_load file="test.conf" section="setup"}

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{#pageTitle#}</title>
  <style type="text/css">
    body {
      font-family:
      apple color emoji,
      segoe ui emoji,
      noto color emoji,
      android emoji,
      emojisymbols,
      emojione mozilla,
      twemoji mozilla,
      segoe ui symbol;  
    }

    button, input, select, textarea, pre {
      font-family : inherit;
      font-size : 100%;
    }

    #flash {
      color: #721c24;
      background-color: #f8d7da;
      border: medium solid #f5c6cb;
      margin: 0.5em 0 0.5em 0;
    }

    #message {
      color: #004085;
      background-color: #cce5ff;
      border: medium solid #b8daff;
      margin: 0.5em 0 0.5em 0;
    }
  </style>
</head>
<body style="background:{#grayBgColor#};">

<h1>bamchohの掲示板</h1>

<div id="message">
<div>こんにちわ <b>{$name|default:'ゲスト'}</b> さん!!</div>

{if $count eq 1}
  <div>初めての訪問ありがとうございます!!</div>
{else}
  <div><b>{$count}</b> 回目の訪問ありがとうございます!!</div>
{/if}
</div>

<form method="POST" action="/api/article">
  <table>
    <tr>
      <th>名前</th>
      <td><input name="name" type="text" value="{$name}"></td>
    </tr>
    <tr>
      <th>記事</th>
      <td><textarea name="article" cols="80%" rows="8"></textarea></td>
    </tr>
    <tr>
      <th></th>
      <td>
        <input name="submit" type="submit" value="送信">
        {if $flash ne ''}
          <div id="flash">{$flash}</div>
        {/if}
      </td>
    </tr>
  </table>
</form>

{foreach from=$messages item="message"}
  名前: {$message.name} - {$message.create_at} <br />
  <pre>{$message.article}</pre>
{/foreach}

</body>
</html>
