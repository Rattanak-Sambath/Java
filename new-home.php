<?php
include 'session/check_if_no_session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Home</title>
  <!-- quasar -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.min.css" rel="stylesheet" type="text/css">
  <!-- axios -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <!-- dayjs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/dayjs.min.js" integrity="sha512-0fcCRl828lBlrSCa8QJY51mtNqTcHxabaXVLPgw/jPA5Nutujh6CbTdDgRzl9aSPYW/uuE7c4SffFUQFBAy6lg==" crossorigin="anonymous"></script>

</head>

<body>
  <!-- Add the following at the end of your body tag -->
  <div id="q-app">
    <q-layout view="lHh Lpr lFf" class="bg-white">
      <q-header elevated>
        <q-toolbar>
          <q-toolbar-title class="row">
            <div class="text-h5">
              Kandal-Pagoda
            </div>
            <q-btn label="Ele-Water" flat color="white" @click="goIndex()"></q-btn>
            <q-btn label="Home" flat color="white" @click="goHome()"></q-btn>

          </q-toolbar-title>
          <!-- right side -->
          <q-btn dense icon="logout" color="negative" flat @click="onLogout()" />

        </q-toolbar>
      </q-header>


      <q-page-container>
        <q-page class="q-pa-md">
          <q-card flat bordered class="my-card">
            <div>
              <q-card-section class="text-h5">
                New Home
              </q-card-section>
            </div>
            <div>
              <q-separator />
            </div>
            <!--  -->
            <div>
              <q-card-section>
                <div class="q-pa-md" style="max-width: 600px;">
                  <q-input v-model="form.name" label="Name" outlined />
                </div>
                <div class="q-pa-md" style="max-width: 600px;">
                  <q-input v-model="form.latin" label="Latin" outlined />
                </div>
                <div class="q-pa-md" style="max-width: 600px;">
                  <q-input v-model="form.description" label="Description" outlined autogrow />
                </div>
                <!-- btn -->
                <div class="q-pa-md">
                  <q-btn label="Add" color="positive" />
                </div>

              </q-card-section>
            </div>
          </q-card>


        </q-page>
      </q-page-container>
    </q-layout>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.umd.min.js"></script>

  <script>
    new Vue({
      el: '#q-app',
      name: 'new-home',
      data: function() {
        return {
          form: {
            name: '',
            latin: '',
            description: '',
          }
        }
      },
      created() {},
      methods: {
        goIndex() {
          window.location.href = 'index.php'
        },
        goHome() {
          window.location.href = 'home.php'
        },
        onLogout() {
          axios.post('action/index_action.php', {
            action: 'logout'
          }).then(res => {
            if (res.data.status == 'logout') {
              window.location.href = 'login.php';
            }
          })
        },
        convertDate(d) {
          return dayjs(d).format('YYYY-MM-DD')
        }
      }
    })
  </script>
</body>

</html>