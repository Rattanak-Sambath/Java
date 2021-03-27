<!DOCTYPE html>
<html>

<head>
  <title>Vue</title>
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
                  <q-btn label="Search" color="primary" @click="getAllMonths()" />
                </div>






              </q-card-section>
            </div>
            <div>
              <q-separator />
            </div>
            <!--  -->
            <div>
              <q-card-section>
                <div class="row q-col-gutter-x-md q-col-gutter-y-sm">
                  <div class="col-xs-6 col-sm-6 col-md-3" v-for="(person,index) in persons" :key="index">
                    <q-card bordered flat class="my-card">
                      <div>
                        <!-- month -->
                        <q-card-section class="text-h5 row bg-positive">
                          {{ person.name }}
                        </q-card-section>
                      </div>
                      <div>
                        <q-separator />
                      </div>
                      <div>
                        <q-card-section>

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
    new Vue({
      el: '#q-app',
      name: 'ex',
      data: function() {
        return {
          year: null,
          years: [],
          checkboxText: false,
          month: '',
          months: [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
          ],
          persons: [{
            name: 'Sopeha',
            gender: 'Male'
          }, {
            name: 'A'
          }, {
            name: 'B'
          }, {
            name: 'C'
          }, ]
        }
      },
      created() {
        this.generateYear()
      },
      methods: {
        generateYear() {
          // 
          this.month = this.months[new Date().getMonth()]
          // 
          this.year = new Date().getFullYear()
          this.years = []
          thisYear = new Date().getFullYear()
          for (i = 0; i < 5; i++) {
            this.years.push(thisYear)
            thisYear += 1
          }
        },
        getAllMonths() {
          console.log(this.month, this.year);
        },
        goLogin() {
          window.location.href = '../login.php'
        }
      }
    })
  </script>
</body>

</html>