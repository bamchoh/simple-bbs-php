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

    button, input, select, textarea {
      font-family : inherit;
      font-size : 100%;
    }
  </style>
</head>
<body style="background:{#grayBgColor#};">

<h1>掲示板</h1>

<form method="POST" action="/api/article">
  <table>
    <tr>
      <th>名前</th>
      <td><input name="name" type="text"></td>
    </tr>
    <tr>
      <th>記事</th>
      <td><textarea name="article" cols="80%" rows="8"></textarea></td>
    </tr>
    <tr>
      <th></th>
      <td><input name="submit" type="submit" value="送信"></td>
    </tr>
  </table>
</form>

{foreach from=$messages item="message"}
  名前: {$message.name} - {$message.create_at} <br />
  内容: {$message.article} <br />
  <br />
{/foreach}

</body>
</html>
