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

            <q-separator></q-separator>

            <!--  -->
            <div>

              <q-card-section>


                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">

                  <!-- year -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input ref="year" v-model="form.year" @input="getIdPersonInInvoice(form.month,form.year)" label="Year" outlined :rules="[val => !!val || 'Year is required']" />
                  </div>

                  <!-- select month -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-select ref="month" outlined v-model="form.month" @input="getIdPersonInInvoice(form.month,form.year)" options-dense :options="months" label="Month" :rules="[val => !!val || 'Month is required']" />
                  </div>
                </div>


                <!-- select person -->
                <div class="q-pa-sm">
                  <q-select @input="getSomeInvoices(form.personId)" ref="person" outlined v-model="form.personId" options-dense :options="persons" label="Person" map-options emit-value option-label="name" option-value="id" :rules="[val => !!val || 'Person is required']" />
                </div>

                <!-- electric -->
                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">

                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input ref="eleOld" type="number" v-model.number="form.eleOld" label="Electric Old" outlined :rules="[val => val !== null && val !== '' && val >= 0 || 'Electric old is required']"></q-input>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input ref="eleNew" type="number" v-model.number="form.eleNew" label="Electric New" outlined :rules="[val => val !== null && val !== '' && val >= 0 || 'Electric new is required', val => val >= form.eleOld || 'Electric New must bigger than Electric Old']"></q-input>
                  </div>
                </div>

                <!-- water -->
                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">

                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input ref="waterOld" type="number" v-model.number="form.waterOld" label="Water Old" outlined :rules="[val => val !== null && val !== '' && val >= 0 || 'Water old is required']"></q-input>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input ref="waterNew" type="number" v-model.number="form.waterNew" label="Water New" outlined :rules="[val => val !== null && val !== '' && val >= 0 || 'Water new is required', val => val >= form.waterOld || 'Water New must bigger than Water Old']"></q-input>
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

              <q-separator></q-separator>

              <q-card-section>
                <q-table flat :columns="columns" :data="invoices">
                  <!-- index -->
                  <template slot="body-cell-index" slot-scope="props" :props="props.row">
                    <q-td>
                      {{ props.pageIndex + 1 }}
                    </q-td>
                  </template>
                  <!-- electric new -->
                  <template slot="body-cell-ele_new" slot-scope="props" :props="props.row">
                    <q-td>
                      <q-badge color="red" class="text-bold">
                        {{ props.row.ele_new }}
                      </q-badge>
                    </q-td>
                  </template>
                  <!-- water new -->
                  <template slot="body-cell-water_new" slot-scope="props" :props="props.row">
                    <q-td>
                      <q-badge color="blue" class="text-bold">
                        {{ props.row.water_new }}
                      </q-badge>
                    </q-td>
                  </template>

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
    var app = new Vue({
      el: "#q-app",
      name: "new-invoice",
      data: function() {
        return {
          notInId: "",
          form: {
            year: null,
            month: "",
            personId: "",
            eleOld: null,
            eleNew: null,
            waterOld: null,
            waterNew: null,
          },
          persons: [],
          invoices: [],
          columns: [{
            name: "index",
            label: "No",
            align: "left",
          }, {
            name: 'month',
            label: 'Month',
            align: 'left',
            field: row => row.month,

          }, {
            name: 'year',
            label: 'Year',
            align: 'left',
            field: row => row.year,

          }, {
            name: 'ele_old',
            label: 'Electric Old',
            align: 'left',
            field: row => row.ele_old,

          }, {
            name: 'ele_new',
            label: 'Electric New',
            align: 'left',
            field: row => row.ele_new,

          }, {
            name: 'water_old',
            label: 'Water Old',
            align: 'left',
            field: row => row.water_old,

          }, {
            name: 'water_new',
            label: 'Water New',
            align: 'left',
            field: row => row.water_new,

          }, ],
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
        testInput(month, year) {
          console.log(month, year);

        },
        onSubmit() {
          this.$refs.year.validate();
          this.$refs.month.validate();
          this.$refs.person.validate();
          this.$refs.eleOld.validate();
          this.$refs.eleNew.validate();
          this.$refs.waterOld.validate();
          this.$refs.waterNew.validate();


          if (
            this.$refs.year.hasError ||
            this.$refs.month.hasError ||
            this.$refs.person.hasError ||
            this.$refs.eleOld.hasError ||
            this.$refs.eleNew.hasError ||
            this.$refs.waterOld.hasError ||
            this.$refs.waterNew.hasError
          ) {
            // check when value null
          } else {
            console.log(this.form);
            // 
            axios.post("action/new-invoice_action.php", {
              action: "addNewInvoice",
              personId: this.form.personId,
              month: this.form.month,
              year: this.form.year,
              eleOld: this.form.eleOld,
              eleNew: this.form.eleNew,
              waterOld: this.form.waterOld,
              waterNew: this.form.waterNew,
              created: dayjs().format("YYYY-MM-DD HH:mm:ss"),
              updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),

            }).then(res => {

              console.log(res.data);
              if (res.data.status == "inserted") {
                this.$q.notify({
                  message: "Inserted successfully",
                  type: "positive",
                  position: "top-right",
                });
                //
                setTimeout(() => {
                  window.location.href = "index.php";
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
        getPersonFilterNotIn(objId) {
          axios
            .post("action/new-invoice_action.php", {
              action: "getPersonFilterNotIn",
              objId: objId,
            })
            .then((res) => {
              this.form.personId = ""
              this.persons = []
              // console.log(res.data);
              if (res.data.length > 0) {
                this.persons = res.data
              }


            });

        },
        generateMonthAndYear() {
          this.form.year = new Date().getFullYear();
          //
          this.form.month = this.months[new Date().getMonth()];
          // 
          this.getIdPersonInInvoice(this.form.month, this.form.year)
        },
        getIdPersonInInvoice(month, year) {
          // console.log(month, year);
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
              // console.log(this.notInId);
              // 
              this.getPersonFilterNotIn(this.notInId)

            });


        },
        getSomeInvoices(id) {
          console.log(id);
          // 
          axios.post("action/new-invoice_action.php", {
            action: "getSomeInvoices",
            id: id,
          }).then(res => {
            console.log(res.data);
            this.invoices = []
            if (res.data.length > 0) {
              this.invoices = res.data
            }
          })
        }
      },
    });
  </script>

</body>

</html>