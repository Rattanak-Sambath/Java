<?php
include 'session/check_if_no_session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>New Home</title>
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
            <q-btn label="Person" flat color="white" @click="goPerson()"></q-btn>
            <q-btn label="Home" flat color="white" @click="goHome()"></q-btn>
            <q-btn label="Unit_Price" flat color="white" @click="goUnitPrice()"></q-btn>

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
                  <q-btn label="Add" color="positive" @click="onSubmit()" />
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
      name: "new-home",
      data: function() {
        return {
          form: {
            name: "",
            latin: "",
            description: "",
          },
        };
      },
      created() {},
      methods: {
        onSubmit() {
          this.$refs.name.validate();
          this.$refs.latin.validate();

          if (this.$refs.name.hasError || this.$refs.latin.hasError) {
            // check when value null
          } else {
            console.log(dayjs().format("YYYY-MM-DD HH:mm:ss"));
            axios
              .post("action/new-home_action.php", {
                action: "addNewHome",
                name: this.form.name,
                latin: this.form.latin,
                description: this.form.description,
                created: dayjs().format("YYYY-MM-DD HH:mm:ss"),
                updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
              })
              .then((res) => {
                console.log(res.data);
                if (res.data.status == "inserted") {
                  this.$q.notify({
                    message: "Inserted successfully",
                    type: "positive",
                    position: "top-right",
                  });
                  //
                  setTimeout(() => {
                    window.location.href = "home.php";
                  }, 500);
                } else {
                  this.$q.notify({
                    message: "Cannot Inserted!!!",
                    type: "negative",
                    position: "top-right",
                  });
                  this.$q.notify({
                    message: res.data.err,
                    type: "negative",
                    position: "top-right",
                  });
                }
              });
          }
        },
        goIndex() {
          window.location.href = "index.php";
        },
        goPerson() {
          window.location.href = "person.php";
        },
        goHome() {
          window.location.href = "home.php";
        },
        goUnitPrice() {
          window.location.href = "unit-price.php";
        },
        onLogout() {
          axios
            .post("action/logout_action.php", {
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
      },
    });
  </script>
</body>

</html>