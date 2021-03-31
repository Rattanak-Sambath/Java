<?php
include 'session/check_if_no_session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Edit Home</title>
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
                Edit Home
              </q-card-section>
            </div>
            <div>
              <q-separator />
            </div>
            <!--  -->
            <div>
              <q-card-section>
                <!-- name -->
                <div class="q-pa-sm">
                  <q-input ref="name" v-model="form.name" label="Name" outlined :rules="[val => !!val || 'Name is required']" />
                </div>

                <!-- latin -->
                <div class="q-pa-sm">
                  <q-input ref="latin" v-model="form.latin" label="Latin" outlined :rules="[val => !!val || 'Latin is required']" />
                </div>

                <!-- description -->
                <div class="q-pa-sm">
                  <q-input v-model="form.description" label="Description" outlined autogrow />
                </div>
                <!-- btn -->
                <div class="q-pa-sm">
                  <q-btn label="Update" color="positive" @click="onSubmit()" />
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
    var app = new Vue({
      el: "#q-app",
      name: "edit-home",
      data: function() {
        return {
          form: {
            name: "",
            latin: "",
            description: "",
          },
        };
      },
      created() {
        this.getData();
      },
      methods: {
        onSubmit() {
          this.$refs.name.validate();
          this.$refs.latin.validate();

          if (this.$refs.name.hasError || this.$refs.latin.hasError) {
            // check when value null
          } else {
            let uri = window.location.search.substring(1);
            let params = new URLSearchParams(uri);
            let id = params.get("id");
            console.log(id);
            //
            axios
              .post("action/edit-home_action.php", {
                action: "updateHome",
                id: id,
                name: this.form.name,
                latin: this.form.latin,
                description: this.form.description,
                updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
              })
              .then((res) => {
                if (res.data == "updated") {
                  this.$q.notify({
                    message: "Updated",
                    type: "positive",
                    position: "top-right",
                  });
                  setTimeout(() => {
                    window.location.href = "home.php";
                  }, 500);
                }
              });
          }
        },
        goIndex() {
          window.location.href = "index.php";
        },
        goHome() {
          window.location.href = "home.php";
        },
        onLogout() {
          axios
            .post("action/index_action.php", {
              action: "logout",
            })
            .then((res) => {
              if (res.data.status == "logout") {
                window.location.href = "login.php";
              }
            });
        },
        convertDate(d) {
          return dayjs(d).format("YYYY-MM-DD");
        },
        getData() {
          let uri = window.location.search.substring(1);
          let params = new URLSearchParams(uri);
          let id = params.get("id");
          console.log(id);
          //
          axios
            .post("action/edit-home_action.php", {
              action: "getHome",
              id: id,
            })
            .then((res) => {
              console.log(res.data);
              if (res.data == "no data") {
                this.$q.notify({
                  message: "This ID not found !",
                  type: "warning",
                  position: "top-right",
                });
                setTimeout(() => {
                  window.location.href = "home.php";
                }, 2000);
              } else {
                this.form.name = res.data.name;
                this.form.latin = res.data.latin;
                this.form.description = res.data.description;
              }
            });
        },
      },
    });
  </script>
</body>

</html>