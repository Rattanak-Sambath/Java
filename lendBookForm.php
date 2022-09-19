<!-- <q-drawer

      :width="230"

      :breakpoint="400"
        v-model="leftDrawerOpen"

        bordered
        class=" text-black " >
        <div>
          <q-img class="absolute-top" src="https://cdn.quasar.dev/img/material.png" style="height: 150px">
              <div class="absolute-bottom bg-transparent">
                    <q-avatar size="56px" class="q-mb-sm">
                        <img src="https://cdn.quasar.dev/img/boy-avatar.png">
                    </q-avatar>
                    <div class="text-weight-bold"></div>

              </div>
          </q-img>
        </div> -->
<!-- <q-list @click="toDashboard()"  style="margin-top:160px; "  >
                <q-item to="/dasboard"  active-class="q-item-no-link-highlighting">
                  <q-item-section avatar>
                    <q-icon name="dashboard"/>
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Dashboard</q-item-label>
                  </q-item-section>
                </q-item>  -->
<!-- section one  -->
<!-- </q-list>
              <q-list @click="toStaff" >
                <q-item to="/staff"  active-class="q-item-no-link-highlighting">
                  <q-item-section avatar>
                    <q-icon name="person"/>
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Staff</q-item-label>
                  </q-item-section>
                </q-item>  -->
<!-- section one  -->
<!-- </q-list>
              <q-list @click="toStudent()" >
                <q-item  to="/student"  active-class="q-item-no-link-highlighting">
                  <q-item-section avatar>
                    <q-icon name="badge"/>
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Student</q-item-label>
                  </q-item-section>
                </q-item>  -->
<!-- section one  -->
<!-- </q-list>
              <q-list  @click="toBook()">
                <q-item to="/dasboard" active-class="q-item-no-link-highlighting">
                  <q-item-section avatar>
                    <q-icon name="import_contacts"/>
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Book</q-item-label>
                  </q-item-section>
                </q-item>  -->
<!-- section one  -->
<!-- </q-list>
              <q-list @click="toLendBook()" >
                <q-item to="/dasboard" active-class="q-item-no-link-highlighting">
                  <q-item-section avatar>
                    <q-icon name="list_alt"/>
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Lend-Book</q-item-label>
                  </q-item-section>
                </q-item>  -->
<!-- section one  -->
<!-- </q-list>


              <q-list  @click="toReturnBook()">
                <q-item to="/dasboard" active-class="q-item-no-link-highlighting">
                  <q-item-section avatar>
                    <q-icon name="assignment_returned"/>
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Return-Book</q-item-label>
                  </q-item-section>
                </q-item>  -->
<!-- section one  -->
<!-- </q-list> -->
<!-- <q-list>
                <q-item to="/dasboard" active-class="q-item-no-link-highlighting">
                    <q-item-section avatar>
                      <q-icon name="group_2"/>
                    </q-item-section>
                    <q-item-section>
                      <q-item-label>Staff</q-item-label>
                    </q-item-section>
                  </q-item>
              </q-list> -->
<!-- <q-expansion-item
              icon="assignment_add"
              label="Reports"

            >

              <q-list  class="q-pl-lg">
                <q-list @click="toReportBook()">
                <q-item to="/Login-1" active-class="q-item-no-link-highlighting">
                  <q-item-section avatar>
                    <q-icon name="assignment_turned_in"/>
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Report-Book</q-item-label>
                  </q-item-section>
                </q-item>
              </q-list>
              <q-list @click="toReportLend()">
                <q-item to="/Lock" active-class="q-item-no-link-highlighting">
                  <q-item-section avatar>
                    <q-icon name="list_alt"/>
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Report-Lend</q-item-label>
                  </q-item-section>
                </q-item>
              </q-list>

              <q-list @click="toReportReturn()">
                <q-item to="/Lock" active-class="q-item-no-link-highlighting">
                  <q-item-section avatar>
                    <q-icon name="assignment_returned"/>
                  </q-item-section>
                  <q-item-section>
                    <q-item-label>Report-Return</q-item-label>
                  </q-item-section>
                </q-item>

              </q-list>

                </q-list>
                </q-expansion-item>

              <q-expansion-item
              icon="settings"
              label="Settings"

            >
              <q-list class="q-pl-lg">

                <q-list @click="toProfile()">
                    <q-item to="/Profile" active-class="q-item-no-link-highlighting">
                      <q-item-section avatar>
                        <q-icon name="person"/>
                      </q-item-section>
                      <q-item-section>
                        <q-item-label>User Profile</q-item-label>
                      </q-item-section>
                    </q-item>
                </q-list>

                <q-list @click="toMaintenance()">
                    <q-item to="/Maintenance" active-class="q-item-no-link-highlighting">
                      <q-item-section avatar>
                        <q-icon name="construction"/>
                      </q-item-section>
                      <q-item-section>
                        <q-item-label>Maintenance</q-item-label>
                      </q-item-section>
                    </q-item>
                </q-list>

              </q-list>
            </q-expansion-item>
           -->
<!-- </q-list>
      </q-drawer> -->

<!DOCTYPE html>
<html>

<head>
    <title>New Home</title>
    <!-- quasar -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet"
        type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.min.css" rel="stylesheet" type="text/css">
    <!-- axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <!-- dayjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.4/dayjs.min.js"
        integrity="sha512-0fcCRl828lBlrSCa8QJY51mtNqTcHxabaXVLPgw/jPA5Nutujh6CbTdDgRzl9aSPYW/uuE7c4SffFUQFBAy6lg=="
        crossorigin="anonymous"></script>

</head>

<body>
    <!-- Add the following at the end of your body tag -->
    <div id="q-app">
        <q-layout view="lHh Lpr lFf" class="bg-white">
            <q-header class="bg-indigo-10" elevated>
                <q-toolbar>

                    <q-toolbar-title class="row">
                        <div>
                            <q-btn flat dense round @click="toggleLeftDrawer" icon="menu" aria-label="Menu" />
                        </div>
                        <div class="text-h5">
                            Library-System
                        </div>


                    </q-toolbar-title>
                    <!-- right side -->
                    <!-- <q-btn dense icon="logout" color="white" flat @click="onLogout()" /> -->

                </q-toolbar>
            </q-header>


            <q-page-container>
                <q-page class="q-pa-md">
                    <q-card flat bordered class="my-card">


                        <div class="row justify-between">

                            <!-- btn search -->
                            <q-card-section class="text-h5">
                                New LendBook
                            </q-card-section>

                            <div class="q-pa-sm">
                                <q-btn label="Back" color="negative" @click="goBack()" />
                            </div>

                        </div>
                        <div>
                            <q-separator />
                        </div>
                        <!--  -->
                        <div>
                            <q-card-section>

                                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                    <!-- name -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-select clearable dense hint="Student" ref="student" v-model="form.student"
                                            :options="studentOpt" option-label="name" option-value="name" map-options
                                            emit-value label="Student" outlined
                                            :rules="[val => !!val || 'Student is required']" />
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-input type="date" dense hint="Start Date" ref="start_date"
                                            v-model="form.start_date" outlined
                                            :rules="[val => !!val || 'Date is required']" />
                                    </div>

                                    <!-- latin -->




                                </div>

                                <!-- description -->
                                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-select clearable dense hint="Book" ref="book" v-model="form.book"
                                            :options="bookOpt" option-label="title" option-value="title" map-options
                                            emit-value label="Book" outlined
                                            :rules="[val => !!val || 'Book is required']" />
                                    </div>



                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-input type="date" dense hint="Expired Date" ref="expired_date"
                                            v-model="form.end_date" outlined
                                            :rules="[val => !!val || 'Date is required']" />
                                    </div>

                                </div>
                                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-input dense hint="Qty" v-model="form.qty" ref="qty" label="Qty" outlined
                                            :rules="[val => !!val || 'Qty is required']" />
                                    </div>
                                </div>

                            </q-card-section>
                        </div>

                        <q-card-section align="right">

                            <div class="q-pa-sm">
                                <q-btn icon="add" label="Add" color="indigo-10" push @click="onSubmit()" />
                            </div>
                        </q-card-section>



                        <!-- end table -->
                    </q-card>


                </q-page>
            </q-page-container>
        </q-layout>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quasar@1.15.7/dist/quasar.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.5/dayjs.min.js"
        integrity="sha512-Ot7ArUEhJDU0cwoBNNnWe487kjL5wAOsIYig8llY/l0P2TUFwgsAHVmrZMHsT8NGo+HwkjTJsNErS6QqIkBxDw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    var app = new Vue({
        el: "#q-app",
        name: "new-home",
        data: function() {
            return {
                studentOpt: [],
                bookOpt: [],
                data: [],
                leftDrawerOpen: true,
                form: {
                    student: "",
                    start_date: dayjs(new Date()).format('YYYY-MM-DD'),
                    book: "",
                    end_date: "",
                    qty: ""
                },
            };
        },
        created() {},
        methods: {

            // getAllData() {
            //     axios
            //       .post("action/person_action.php", {
            //         action: "getTblPerson",
            //       })
            //       .then((res) => {
            //         this.data = res.data;
            //       });
            //   },
            toggleLeftDrawer() {
                this.leftDrawerOpen = !this.leftDrawerOpen
            },
            onSubmit() {

                this.$refs.student.validate();
                // this.$refs.book.validate();
                // this.$refs.start_date.validate();
                // this.$refs.expired_date.validate();
                // this.$refs.qty.validate();
                if (this.$refs.student.hasError) {
                    // check when value null
                } else {
                    //
                    axios
                        .post("action/lendBook_action.php", {
                            action: "addLendBook",
                            student: this.form.student,
                            book: this.form.book,
                            qty: this.form.qty,
                            start_date: this.form.start_date,
                            end_date: this.form.end_date

                            // description: this.form.description,
                            // created: dayjs().format("YYYY-MM-DD HH:mm:ss"),
                            // updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
                        })
                        .then((res) => {

                            if (res.data.status == "insert") {


                            } else {
                                this.$q.notify({
                                    message: "Inserted successfully",
                                    type: "positive",
                                    position: "top-right",
                                });
                                //
                                setTimeout(() => {
                                    history.go(-1);

                                }, 500);
                                // this.$q.notify({
                                //     message: "Cannot Inserted!!!",
                                //     type: "negative",
                                //     position: "top-right",
                                // });
                                // this.$q.notify({
                                //     message: res.data.err,
                                //     type: "negative",
                                //     position: "top-right",
                                // });
                            }
                        });
                }
            },
            goBack() {
                history.go(-1);
            },
            toDashboard() {
                window.location.href = "dashboard.php"
            },
            toStaff() {
                window.location.href = "staff.php";
            },
            toStudent() {
                window.location.href = "student.php";
            },
            toBook() {
                window.location.href = "book.php";
            },
            toLendBook() {
                window.location.href = "lendBook.php";
            },
            toReturnBook() {
                window.location.href = "returnBook.php";
            },
            toReportBook() {
                window.location.href = "reportBook.php";
            },
            toReportLend() {
                window.location.href = "reportLend.php";
            },
            toReportReturn() {
                window.location.href = "reportReturn.php";
            },
            toProfile() {
                window.location.href = "profile.php";
            },
            toMaintenance() {
                window.location.href = "maintenance.php";
            },
            // onLogout() {
            //     axios
            //         .post("action/logout_action.php", {
            //             action: "logout",
            //         })
            //         .then((res) => {
            //             if (res.data.status == "logout") {
            //                 window.location.href = "login.php";
            //             }
            //         });
            // },
            convertDate(d) {
                return dayjs(d).format("YYYY-MM-DD");
            },
            getStudent() {
                axios
                    .post("action/student_action.php", {
                        action: "getAllStudent",
                    })
                    .then((res) => {
                        this.studentOpt = res.data;
                        console.log('student', res.data)

                    });
            },
            getBook() {
                axios
                    .post("action/book_action.php", {
                        action: "getAllBook",
                    })
                    .then((res) => {
                        this.bookOpt = res.data;
                        console.log('Book', res.data)

                    });
            },
        },
        mounted() {
            this.getStudent();
            this.getBook();
        },
    });
    </script>
</body>

</html>