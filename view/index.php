<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Examp Vue JS</title>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script id="json-vue" data-json="<?= $data_json ?>"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
</head>
<body>

<div id="app">
  <link rel="stylesheet" :href="to_path('/assets/css/aahub_light.css')">

  <bbs_header></bbs_header>

  <div class="container">

  <h1>bamchohの掲示板</h1>

  <div v-if="flash">
    <div class="alert alert-danger" role="alert">
      {{ flash }}
    </div>
  </div>

  <div class="alert alert-primary" role="alert">
    こんにちわ <b> {{ name ?? 'ゲスト' }} </b> さん!!
    <div v-if="count === 1">
      初めての訪問ありがとうございます!!
    </div>
    <div v-else>
      <b> {{ count }} </b> 回目の訪問ありがとうございます!!
    </div>
  </div>

  <form method="POST" :action="this.$root.to_path('/api/article')">
    <input type="hidden" name="csrf_token" :value="csrf_token">
    <div class="form-group">
      <label for="InputName">名前</label>
      <input class="form-control" name="name" type="text" :value="name">
    </div>
    <div class="form-group">
      <label for="InputArticle">記事</label>
      <textarea class="form-control aahub_light" name="article" cols="80%" rows="8"></textarea>
    </div>
    <button class="btn btn-primary">
      送信
    </button>
  </form>

  <div class="mb-4"></div>

  <article-post
    v-for="message in messages"
    v-bind:message="message"
  ></article-post>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">
  Vue.component('bbs_header', {
    template: `
      <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <a class="navbar-brand" :href="this.$root.to_path('/')">BBS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>

        <a class="btn btn-success my-2 my-sm-0 mr-1" :href="this.$root.to_path('/login')" role="button">
          Log In
        </a>

        <a class="btn btn-outline-success my-2 my-sm-0" :href="this.$root.to_path('/signup')" role="button">
          Sign Up
        </a>
      </div>
    </nav>
    `
  })

  Vue.component('article-post', {
    props: ['message'],
    template: `
      <div class="article-post">
        名前: {{ message.name }} - {{ message.create_at }} <br />
        <div class="aahub_light"><pre>{{ message.article }}</pre></div>
      </div>
    `
  })

var v = new Vue({
  el: "#app",
  data: function() {
      return JSON.parse(document.getElementById('json-vue').dataset.json)
  },
  methods: {
    to_path: function(path) {
      return this.bbs_dir + path;
    }
  }
});

</script>

</body>
</html>
