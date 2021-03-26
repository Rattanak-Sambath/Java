<!DOCTYPE html>
<html>

<head>
  <title>Vue</title>
  <!-- quasar -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.min.css" rel="stylesheet" type="text/css">
  <!-- axios -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

</head>

<body>
  <!-- Add the following at the end of your body tag -->
  <div id="q-app">
    <q-layout view="lHh Lpr lFf" class="bg-white">
      <q-header elevated>
        <q-toolbar>
          <q-toolbar-title>
            Kandal-Pagoda
            <q-btn dense label="Month" flat color="positive" />

          </q-toolbar-title>
          <!-- right side -->
          <q-btn dense icon="logout" color="negative" flat />

        </q-toolbar>
      </q-header>


      <q-page-container>
        <q-page class="q-pa-md">
          <div>
            <q-btn label="Test" color="primary" />
          </div>


        </q-page>
      </q-page-container>
    </q-layout>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.umd.min.js"></script>

  <script>
    new Vue({
      el: '#q-app',
      name: 'home',
      data() {
        return {}
      },
    })
  </script>
</body>

</html>