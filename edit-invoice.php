<?php
include 'session/check_if_no_session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Edit Invoice</title>
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
                Edit Invoice
              </q-card-section>
            </div>

            <q-separator></q-separator>

            <!--  -->
            <div>

              <q-card-section>


                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">

                  <!-- year -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input readonly ref="year" v-model="form.year" label="Year" outlined :rules="[val => !!val || 'Year is required']" />
                  </div>

                  <!-- month -->
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <q-input readonly ref="month" outlined v-model="form.month" label="Month" :rules="[val => !!val || 'Month is required']" />
                  </div>
                </div>


                <!-- person -->
                <div class="q-pa-sm">
                  <q-input readonly ref="person" outlined v-model="form.personName" label="Person" :rules="[val => !!val || 'Person is required']" />
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
                  <q-btn label="Update" color="positive" @click="onSubmit()" />
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
            personName: "",
            eleOld: null,
            eleNew: null,
            waterOld: null,
            waterNew: null,
          },

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
        };
      },
      created() {
        this.getInvoice();
      },
      methods: {
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
            let uri = window.location.search.substring(1);
            let params = new URLSearchParams(uri);
            let id = params.get("id");
            //  
            axios.post("action/edit-invoice_action.php", {
              action: "updateInvoice",
              id: id,
              eleOld: this.form.eleOld,
              eleNew: this.form.eleNew,
              waterOld: this.form.waterOld,
              waterNew: this.form.waterNew,
              updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
            }).then((res) => {
              if (res.data == "updated") {
                this.$q.notify({
                  message: "Updated",
                  type: "positive",
                  position: "top-right",
                });
                setTimeout(() => {
                  window.location.href = "index.php";
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
        getInvoice() {
          let uri = window.location.search.substring(1);
          let params = new URLSearchParams(uri);
          let id = params.get("id");
          // 
          axios.post("action/edit-invoice_action.php", {
            action: "getInvoice",
            id: id,
          }).then((res) => {
            if (res.data == "no data") {
              this.$q.notify({
                message: "This ID not found !",
                type: "warning",
                position: "top-right",
              });
              setTimeout(() => {
                window.location.href = "index.php";
              }, 2000);
            } else {
              this.form.year = Number(res.data.year);
              this.form.month = res.data.month;
              this.form.personName = res.data.latin + " - " + res.data.name
              this.form.eleOld = Number(res.data.ele_old)
              this.form.eleNew = Number(res.data.ele_new)
              this.form.waterOld = Number(res.data.water_old)
              this.form.waterNew = Number(res.data.water_new)
              // 
              this.getSomeInvoices(res.data.person_id)
            }

          })
        },
        generateMonthAndYear() {
          this.form.year = new Date().getFullYear();
          //
          this.form.month = this.months[new Date().getMonth()];
          // 
        },
        getSomeInvoices(id) {
          // 
          axios.post("action/new-invoice_action.php", {
            action: "getSomeInvoices",
            id: id,
          }).then(res => {
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