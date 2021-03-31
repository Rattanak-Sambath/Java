<?php
include 'session/check_if_no_session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>New Invoice</title>
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
                New Invoice
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
                  <q-input ref="year" v-model="form.year" label="Year" outlined :rules="[val => !!val || 'Year is required']" />
                </div>

                <!-- select month -->
                <div class="q-pa-sm">
                  <q-select ref="month" outlined v-model="form.month" options-dense :options="months" label="Month" :rules="[val => !!val || 'Month is required']" />
                </div>




                <!-- phone -->
                <!-- <div class="q-pa-sm">
                  <q-input ref="phone" v-model="form.phone" label="Phone" outlined :rules="[val => !!val || 'Phone is required']" />
                </div> -->


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
          notInId: "",
          form: {
            year: null,
            month: "",
            personId: "",
          },
          options: {
            gender: ["Male", "Female"],
            home: [],
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
        // this.getHome();
        this.generateMonthAndYear()
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
            // console.log(this.form);
            axios
              .post("action/new-person_action.php", {
                action: "addNewPerson",
                homeId: this.form.homeId,
                name: this.form.name,
                latin: this.form.latin,
                gender: this.form.gender,
                phone: this.form.phone,
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
                    window.location.href = "person.php";
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
        goPerson() {
          window.location.href = "person.php";
        },
        goIndex() {
          window.location.href = "index.php";
        },
        goHome() {
          window.location.href = "home.php";
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
        getPersonFilterNotIn(id) {
          // axios
          //   .post("action/new-invoice_action.php", {
          //     action: "getPerson",
          //   })
          //   .then((res) => {
          //     this.options.home = res.data;
          //   });
          console.log(id);
        },
        generateMonthAndYear() {
          this.form.year = new Date().getFullYear();
          //
          this.form.month = this.months[new Date().getMonth()];
          // 
          this.getIdPersonInInvoice(this.form.month, this.form.year)
        },
        getIdPersonInInvoice(month, year) {
          console.log(month, year);
          // 
          axios
            .post("action/new-invoice_action.php", {
              action: "getIdPersonInInvoice",
              month: month,
              year: year
            })
            .then((res) => {
              // console.log(res.data);
              this.notInId = "";
              for (let i = 0; i < res.data.length; i++) {
                if ((i + 1) == res.data.length) {
                  this.notInId += res.data[i].person_id;
                } else {
                  this.notInId += res.data[i].person_id + ","
                }
              }
              console.log(this.notInId);

            });


        }
      },
    });
  </script>

</body>

</html>