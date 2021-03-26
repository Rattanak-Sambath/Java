<?php
include 'session/check_if_no_session.php';
?>
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
          <q-btn dense icon="logout" color="negative" flat @click="onLogout()" />

        </q-toolbar>
      </q-header>


      <q-page-container>
        <q-page class="q-pa-md">
          <q-card flat bordered class="my-card">
            <div>
              <q-card-section class="row">





                <div class="q-pa-sm">
                  <q-checkbox v-model="checkboxText" label="For Input Year" left-label />
                </div>

                <!-- select -->
                <div v-show="!checkboxText" style="width: 200px;" class="q-pa-sm">
                  <q-select outlined v-model="year" dense options-dense :options="years" label="Select Year" clearable />
                </div>

                <!-- input -->
                <div v-show="checkboxText" style="width: 200px;" class="q-pa-sm">
                  <q-input outlined v-model="year" dense label="Input Year" clearable />
                </div>

                <!-- btn search -->
                <div class="q-pa-sm">
                  <q-btn label="Search" color="primary" />
                </div>






              </q-card-section>
            </div>
            <div>
              <q-separator />
            </div>
            <!--  -->
            <div>
              <q-card-section>
                <div>
                  <q-btn label="Test" dense color="primary" />
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
      name: 'ex',
      data: function() {
        return {
          year: '',
          years: [],
          checkboxText: false,
        }
      },
      created() {
        this.generateYear()
      },
      methods: {
        onLogout() {
          axios.post('action/index_action.php', {
            action: 'logout'
          }).then(res => {
            if (res.data.status == 'logout') {
              window.location.href = 'login.php';
            }
          })
        },
        generateYear() {
          this.years = []
          thisYear = new Date().getFullYear()
          for (i = 0; i < 5; i++) {
            this.years.push(thisYear)
            thisYear += 1
          }
        }
      }
    })
  </script>
</body>

</html>