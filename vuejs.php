<html>
  <head>
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  </head>
  <body>

    <div id="app">
      <link_to uri="/">test</link_to>
    </div>

    <script type="text/javascript">
      Vue.component('link_to', {
        props: ['uri'],
        template: `
          <a :href="this.$root.goto(uri)"><slot></slot></a>
        `
      })
      var v1 = new Vue({
        el: "#app",
        methods: {
            goto: function(uri) {
                return "/sub_dir" + uri;
            }
        }
      });
    </script>
  </body>
</html>