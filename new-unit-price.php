<?php
include 'session/check_if_no_session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>New Unit Price</title>
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
                New Unit Price
              </q-card-section>
            </div>

            <q-separator></q-separator>

            <!--  -->
            <div>

              <q-card-section>



                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                  <!-- year -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input ref="year" type="number" v-model.number="form.year" label="Year" outlined :rules="[val => !!val || 'Year is required']" />
                  </div>

                  <!-- select month -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-select ref="month" outlined v-model="form.month" options-dense :options="months" label="Month" :rules="[val => !!val || 'Month is required']" />
                  </div>
                </div>


                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                  <!-- electric price -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input hint="Khmer : 2000 រៀល" ref="ele" type="number" v-model.number="form.ele" label="Electric Price" outlined :rules="[val => !!val || 'Electric is required']" />
                  </div>

                  <!-- water price -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input hint="Khmer : 2000 រៀល" ref="water" type="number" v-model.number="form.water" label="Water Price" outlined :rules="[val => !!val || 'Water is required']" />
                  </div>
                </div>




              </q-card-section>

              <q-separator></q-separator>

              <q-card-section align="right">
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
      name: "new-person",
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
        this.generateMonthAndYear()
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
            // 
            axios.post("action/new-unit-price_action.php", {
              action: "addNewUnitPrice",
              year: this.form.year,
              month: this.form.month,
              month_year: this.form.month + "_" + this.form.year,
              ele: this.form.ele,
              water: this.form.water,
              created: dayjs().format("YYYY-MM-DD HH:mm:ss"),
              updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
            }).then(res => {
              if (res.data.status == "inserted") {
                this.$q.notify({
                  message: "Inserted successfully",
                  type: "positive",
                  position: "top-right",
                });
                //
                setTimeout(() => {
                  window.location.href = "unit-price.php";
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
        }
      },
    });
  </script>

</body>

</html>