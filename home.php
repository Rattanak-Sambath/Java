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
            <q-btn disabled label="Home" flat color="white" @click="goHome()"></q-btn>

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



                <!-- btn search -->
                <div class="q-pa-sm">
                  <q-btn label="Add" color="primary" @click="goNewHome()" />
                </div>




              </q-card-section>
            </div>
            <div>
              <q-separator />
            </div>
            <!--  -->
            <div>
              <q-card-section>
                <q-table flat :columns="columns" :data="data">
                </q-table>
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
          year: null,
          years: [],
          checkboxText: false,
          month: '',
          columns: [{
            name: 'id',
            label: 'ID',
            align: 'left',
            field: row => row.id,
          }, {
            name: 'name',
            label: 'Khmer',
            align: 'left',
            field: row => row.name,
          }, {
            name: 'latin',
            label: 'English',
            align: 'left',
            field: row => row.latin,
          }, {
            name: 'created_at',
            label: 'Created',
            align: 'left',
            field: row => this.convertDate(row.created_at),
          }, {
            name: 'updated_at',
            label: 'Updated',
            align: 'left',
            field: row => this.convertDate(row.updated_at),
          }, ],
          data: [],
        }
      },
      created() {
        // console.log(dayjs().format('YYYY-MM-DD'));
        this.getAllData()
      },
      methods: {
        goIndex() {
          window.location.href = 'index.php'
        },
        goHome() {
          window.location.href = 'home.php'
        },
        goNewHome() {
          window.location.href = 'new-home.php'
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
        generateYear() {
          // 
          console.log(this.months[new Date().getMonth()]);
          this.month = this.months[new Date().getMonth()]
          // 
          this.year = new Date().getFullYear()
          this.years = []
          thisYear = new Date().getFullYear()
          for (i = 0; i < 5; i++) {
            this.years.push(thisYear)
            thisYear += 1
          }
        },
        getAllData() {
          axios.post('action/home_action.php', {
            action: 'getTblHome'
          }).then((res) => {
            console.log(res.data);
            this.data = res.data
          })
        },
        testGet() {
          // let uri = window.location.href.split('?');
          // if (uri.length == 2) {
          //   let vars = uri[1].split('&');
          //   let getVars = {};
          //   let tmp = '';
          //   vars.forEach(function(v) {
          //     tmp = v.split('=');
          //     if (tmp.length == 2)
          //       getVars[tmp[0]] = tmp[1];
          //   });
          //   console.log(getVars);
          // }
          let uri = window.location.search.substring(1);
          let params = new URLSearchParams(uri);
          let id = params.get("id");
          console.log(id);
        },
        convertDate(d) {
          return dayjs(d).format('YYYY-MM-DD')
        }
      }
    })
  </script>
</body>

</html>