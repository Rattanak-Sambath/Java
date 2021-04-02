<?php
include 'session/check_if_no_session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Edit Unit Price</title>
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
                Edit Unit Price
              </q-card-section>
            </div>
            <div>
              <q-separator />
            </div>
            <!--  -->
            <div>

              <q-card-section>

                <!-- year -->
                <div class="q-pa-sm">
                  <q-input readonly ref="year" type="number" v-model.number="form.year" label="Year" outlined :rules="[val => !!val || 'Year is required']" />
                </div>

                <!-- select month -->
                <div class="q-pa-sm">
                  <q-select readonly ref="month" outlined v-model="form.month" options-dense :options="months" label="Month" :rules="[val => !!val || 'Month is required']" />
                </div>

                <!-- electric price -->
                <div class="q-pa-sm">
                  <q-input ref="ele" type="number" v-model.number="form.ele" label="Electric Price" outlined :rules="[val => !!val || 'Electric is required']" />
                </div>

                <!-- water price -->
                <div class="q-pa-sm">
                  <q-input ref="water" type="number" v-model.number="form.water" label="Water Price" outlined :rules="[val => !!val || 'Water is required']" />
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
      name: "edit-unit-price",
      data: function() {
        return {
          form: {
            year: null,
            month: '',
            ele: null,
            water: null
          },
          months: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
          ],

        };
      },
      created() {
        // this.generateMonthAndYear()
        this.getData()
      },
      methods: {
        onSubmit() {
          this.$refs.year.validate();
          this.$refs.month.validate();
          this.$refs.ele.validate();
          this.$refs.water.validate();


          if (
            this.$refs.year.hasError ||
            this.$refs.ele.hasError ||
            this.$refs.water.hasError ||
            this.$refs.month.hasError
          ) {
            // check when value null
          } else {
            console.log(this.form);
            // 
            let uri = window.location.search.substring(1);
            let params = new URLSearchParams(uri);
            let id = params.get("id");
            console.log(id);
            // 
            axios.post("action/edit-unit-price_action.php", {
              action: "updateUnitPrice",
              id: id,
              ele: this.form.ele,
              water: this.form.water,
              updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
            }).then(res => {
              if (res.data == "updated") {
                this.$q.notify({
                  message: "Updated",
                  type: "positive",
                  position: "top-right",
                });
                setTimeout(() => {
                  window.location.href = "unit-price.php";
                }, 500);
              }
            })
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
        generateMonthAndYear() {
          //
          this.form.month = this.months[new Date().getMonth()];
          //
          this.form.year = new Date().getFullYear();
        },
        getData() {
          let uri = window.location.search.substring(1);
          let params = new URLSearchParams(uri);
          let id = params.get("id");
          console.log(id);
          // 
          axios.post("action/edit-unit-price_action.php", {
            action: "getUnitPrice",
            id: id
          }).then(res => {
            console.log(res.data);
            // 
            if (res.data == "no data") {
              this.$q.notify({
                message: "This ID not found !",
                type: "warning",
                position: "top-right",
              });
              setTimeout(() => {
                window.location.href = "unit-price.php";
              }, 2000);
            } else {
              this.form.year = Number(res.data.year);
              this.form.month = res.data.month;
              this.form.ele = Number(res.data.ele);
              this.form.water = Number(res.data.water);
            }
          })

        }
      },
    });
  </script>

</body>

</html>