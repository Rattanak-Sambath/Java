<?php
include 'session/check_if_no_session.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Ele-Water</title>
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
          <q-toolbar-title class="row">
            <div class="text-h5">
              Kandal-Pagoda
            </div>
            <q-btn disabled label="Ele-Water" flat color="white" @click="goIndex()"></q-btn>
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
              <q-card-section class="row">





                <div class="q-pa-sm">
                  <q-checkbox v-model="checkboxText" label="For Input Year" left-label />
                </div>

                <!-- select year -->
                <div v-show="!checkboxText" style="width: 200px;" class="q-pa-sm">
                  <q-select outlined v-model="year" dense options-dense :options="years" label="Select Year" clearable />
                </div>

                <!-- input -->
                <div v-show="checkboxText" style="width: 200px;" class="q-pa-sm">
                  <q-input outlined type="number" v-model.number="year" dense label="Input Year" clearable />
                </div>

                <!-- select month -->
                <div style="width: 200px;" class="q-pa-sm">
                  <q-select outlined v-model="month" dense options-dense :options="months" label="Select Month" clearable />
                </div>

                <!-- btn search -->
                <div class="q-pa-sm">
                  <q-btn label="Search" color="primary" @click="searchInvoice()" />
                </div>






              </q-card-section>
            </div>
            <div>
              <q-separator />
            </div>
            <!--  -->
            <div>
              <q-card-section>
                <div class="row q-col-gutter-x-md q-col-gutter-y-md">
                  <div class="col-xs-12 col-sm-6 col-md-3" v-for="(person,index) in persons" :key="index">
                    <q-card bordered flat class="my-card">
                      <div>
                        <!-- name -->
                        <q-card-section class="bg-positive">
                          <q-btn flat :label="person.id">
                            <q-tooltip content-class="bg-primary" content-style="font-size: 16px" :offset="[10, 10]" anchor="center right" self="center start">
                              Home08
                            </q-tooltip>
                          </q-btn>
                        </q-card-section>
                      </div>
                      <div>
                        <q-separator />
                      </div>
                      <div>
                        <q-card-section>
                          <!-- eletronic -->
                          <div class="text-bold">
                            Eletronic :
                            <q-badge color="red" class="text-white text-bold">
                              {{ person.ele_old }}
                              <q-tooltip content-class="bg-amber text-black text-bold" anchor="top middle" self="center middle">
                                Old
                              </q-tooltip>
                            </q-badge>
                            -
                            <q-badge color="blue" class="text-white text-bold">
                              {{ person.ele_new }}
                              <q-tooltip content-class="bg-amber text-black text-bold" anchor="top middle" self="center middle">
                                New
                              </q-tooltip>
                            </q-badge>
                            :
                            <q-badge color="green" class="text-white text-bold">
                              {{ person.ele_new - person.ele_old }}
                              <q-tooltip content-class="bg-primary text-bold" anchor="top middle" self="center middle">
                                Total
                              </q-tooltip>
                            </q-badge>
                          </div>

                          <q-separator></q-separator>

                          <!-- eletronic finish -->
                          <div class="text-bold">
                            Eletronic (
                            <q-badge color="amber" class="text-black text-bold">
                              {{ unit.ele }}
                            </q-badge>
                            R ) :
                            <q-badge color="green" class="text-white text-bold">
                              {{ (person.ele_new - person.ele_old) * unit.ele }}
                              <q-tooltip content-class="bg-amber text-black text-bold" anchor="top middle" self="center middle">
                                Money
                              </q-tooltip>
                            </q-badge> R
                          </div>


                          <q-separator></q-separator>



                          <!-- water -->
                          <div class="text-bold">
                            Water :
                            <q-badge color="red" class="text-white text-bold">
                              {{ person.water_old }}
                              <q-tooltip content-class="bg-amber text-black text-bold" anchor="top middle" self="center middle">
                                Old
                              </q-tooltip>
                            </q-badge>
                            -
                            <q-badge color="blue" class="text-white text-bold">
                              {{ person.water_new }}
                              <q-tooltip content-class="bg-amber text-black text-bold" anchor="top middle" self="center middle">
                                New
                              </q-tooltip>
                            </q-badge>
                            :
                            <q-badge color="green" class="text-white text-bold">
                              {{ person.water_new - person.water_old }}
                              <q-tooltip content-class="bg-primary text-bold" anchor="top middle" self="center middle">
                                Total
                              </q-tooltip>
                            </q-badge>
                          </div>



                          <q-separator></q-separator>

                          <!-- water finish -->
                          <div class="text-bold">
                            Water (
                            <q-badge color="amber" class="text-black text-bold">
                              {{ unit.water }}
                            </q-badge>
                            R ) :
                            <q-badge color="green" class="text-white text-bold">
                              {{ (person.water_new - person.water_old) * unit.water }}
                              <q-tooltip content-class="bg-amber text-black text-bold" anchor="top middle" self="center middle">
                                Money
                              </q-tooltip>
                            </q-badge> R
                          </div>

                          <q-separator></q-separator>

                          <div class="text-bold">
                            Phone :
                            <q-badge>
                              {{ test }}
                            </q-badge>
                          </div>


                          <q-separator></q-separator>
                        </q-card-section>

                        <q-card-section align="right">

                          <div>
                            <q-btn color="primary" label="Update" dense></q-btn>
                          </div>
                        </q-card-section>
                      </div>


                    </q-card>
                  </div>


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
      name: "ex",
      data: function() {
        return {
          year: null,
          years: [],
          checkboxText: false,
          month: "",
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
          persons: [],
          unit: {
            ele: 2000,
            water: 1000,
          },
          test: "Test"
        };
      },
      created() {
        this.generateYear();

      },
      methods: {
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
        generateYear() {
          //
          this.month = this.months[new Date().getMonth()];
          //
          this.year = new Date().getFullYear();
          this.years = [];
          thisYear = new Date().getFullYear();
          for (i = 0; i < 5; i++) {
            this.years.push(thisYear);
            thisYear += 1;
          }
          // 
          this.getAllInvoices(this.month, this.year)
        },
        searchInvoice() {
          this.getAllInvoices(this.month, this.year);

        },
        getAllInvoices(month, year) {
          console.log(month, year);
          // 
          axios.post("action/index_action.php", {
            action: "getInvoice",
            month: month,
            year: year,
          }).then(res => {
            console.log(res.data);
            this.persons = res.data
          })
        }
      },
    });
  </script>
</body>

</html>