<?php
include 'session/check_if_no_session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>New Person</title>
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
                Edit Person
              </q-card-section>
            </div>
            <div>
              <q-separator />
            </div>
            <!--  -->
            <div>

              <q-card-section>

                <!-- home id -->
                <div class="q-pa-sm">
                  <q-select options-dense ref="homeId" v-model="form.homeId" :options="options.home" option-label="name" option-value="id" map-options emit-value label="Home" outlined :rules="[val => !!val || 'Home is required']" />
                </div>

                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                  <!-- name -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input ref="name" hint="Khmer" v-model="form.name" label="Name" outlined :rules="[val => !!val || 'Name is required']" />
                  </div>

                  <!-- latin -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input ref="latin" hint="English" v-model="form.latin" label="Latin" outlined :rules="[val => !!val || 'Latin is required']" />
                  </div>
                </div>



                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                  <!-- gender -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-select ref="gender" v-model="form.gender" label="Gender" :options="options.gender" outlined :rules="[val => !!val || 'Name is required']" />
                  </div>

                  <!-- phone -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input ref="phone" v-model="form.phone" label="Phone" outlined :rules="[val => !!val || 'Phone is required']" />
                  </div>
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
      name: "edit-person",
      data: function() {
        return {
          form: {
            homeId: "",
            name: "",
            latin: "",
            gender: "",
            phone: "",
          },
          options: {
            gender: ["Male", "Female"],
            home: [],
          },
        };
      },
      created() {
        this.getHome();
        this.getData();
      },
      methods: {
        onSubmit() {
          this.$refs.homeId.validate();
          this.$refs.name.validate();
          this.$refs.latin.validate();
          this.$refs.gender.validate();
          this.$refs.phone.validate();

          if (
            this.$refs.name.hasError ||
            this.$refs.latin.hasError ||
            this.$refs.homeId.hasError ||
            this.$refs.gender.hasError ||
            this.$refs.phone.hasError
          ) {
            // check when value null
          } else {

            let uri = window.location.search.substring(1);
            let params = new URLSearchParams(uri);
            let id = params.get("id");
            // 
            axios
              .post("action/edit-person_action.php", {
                action: "updatePerson",
                id: id,
                homeId: this.form.homeId,
                name: this.form.name,
                latin: this.form.latin,
                gender: this.form.gender,
                phone: this.form.phone,
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
                    window.location.href = "person.php";
                  }, 500);
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
        getHome() {
          axios
            .post("action/new-person_action.php", {
              action: "getHome",
            })
            .then((res) => {
              this.options.home = res.data;
            });
        },
        getData() {
          let uri = window.location.search.substring(1);
          let params = new URLSearchParams(uri);
          let id = params.get("id");
          //
          axios
            .post("action/edit-person_action.php", {
              action: "getPerson",
              id: id,
            })
            .then((res) => {
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
                this.form.homeId = res.data.home_id;
                this.form.name = res.data.name;
                this.form.latin = res.data.latin;
                this.form.gender = res.data.gender;
                this.form.phone = res.data.phone;
              }
            });
        },

      },
    });
  </script>

</body>

</html>