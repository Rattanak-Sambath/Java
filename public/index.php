<!DOCTYPE html>
<html>

<head>
  <title>Electric-Water</title>
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
          </q-toolbar-title>
          <!-- right side -->
          <q-btn dense label="Login" color="positive" @click="goLogin()" />

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
                  <q-select @input="searchInvoice()" outlined v-model="year" dense options-dense :options="years" label="Select Year" clearable />
                </div>

                <!-- input -->
                <div v-show="checkboxText" style="width: 200px;" class="q-pa-sm">
                  <q-input @input="searchInvoice()" outlined type="number" v-model.number="year" dense label="Input Year" clearable />
                </div>

                <!-- select month -->
                <div style="width: 200px;" class="q-pa-sm">
                  <q-select @input="searchInvoice()" outlined v-model="month" dense options-dense :options="months" label="Select Month" clearable />
                </div>

                <!-- btn refresh -->
                <div class="q-pa-sm">
                  <q-btn label="Refresh" color="primary" @click="onRefresh()" />
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
                        <q-card-section :class="unit.ele>1?'bg-positive':'bg-negative'">
                          <q-btn flat :label="person.latin" class="text-bold" no-caps>
                            <q-tooltip content-class="bg-primary text-bold" content-style="font-size: 16px" :offset="[10, 10]" anchor="center right" self="center start">
                              {{ person.name }} - {{ person.homeName }}
                            </q-tooltip>
                          </q-btn>
                        </q-card-section>
                      </div>
                      <div>
                        <q-separator />
                      </div>
                      <div>
                        <q-card-section>
                          <!-- electric -->
                          <div class="text-bold">
                            ចំនួនប្រើប្រាស់ភ្លើង :
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

                          <!-- electric finish -->
                          <div v-show="unit.ele>1?true:false" class="text-bold">
                            តម្លៃភ្លើង (
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
                            ចំនួនប្រើប្រាស់ទឹក :
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
                          <div v-show="unit.water>1?true:false" class="text-bold">
                            តម្លៃទឹក (
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
                              {{ person.phone }}
                            </q-badge>
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
            ele: 1,
            water: 1,
          },
        };
      },
      created() {
        this.generateYear();
      },
      methods: {
        onRefresh() {
          this.searchInvoice()
        },
        goLogin() {
          window.location.href = "../login.php";
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
          this.getUnitPrice(this.month, this.year)
        },
        searchInvoice() {
          this.getAllInvoices(this.month, this.year);
          this.getUnitPrice(this.month, this.year);

        },
        getAllInvoices(month, year) {
          // 
          axios.post("action/index_action.php", {
            action: "getInvoice",
            month: month,
            year: year,
          }).then(res => {
            this.persons = res.data
          })
        },
        getUnitPrice(month, year) {
          // 
          axios.post("action/index_action.php", {
            action: 'getUnitPrice',
            month: month,
            year: year,
          }).then(res => {
            if (res.data == 'no data') {
              this.unit.ele = 1
              this.unit.water = 1

            } else {
              this.unit.ele = res.data.ele;
              this.unit.water = res.data.water;
            }
          })


        }
      },
    });
  </script>
</body>

</html>