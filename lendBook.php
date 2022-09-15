<?php
include 'session/check_if_no_session.php';
?>
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
                    <q-btn dense icon="logout" color="negative" flat @click="onLogout()" />

                </q-toolbar>
            </q-header>
            <q-drawer :width="230" :breakpoint="400" v-model="leftDrawerOpen" bordered class=" text-black ">
                <div>
                    <q-img class="absolute-top" src="https://cdn.quasar.dev/img/material.png" style="height: 150px">
                        <div class="absolute-bottom bg-transparent">
                            <q-avatar size="56px" class="q-mb-sm">
                                <img src="https://cdn.quasar.dev/img/boy-avatar.png">
                            </q-avatar>
                            <div class="text-weight-bold"><?php echo $_SESSION['email']; ?></div>

                        </div>
                    </q-img>
                </div>
                <q-list @click="toDashboard()" style="margin-top:160px; ">
                    <q-item to="/dasboard" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="dashboard" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>Dashboard</q-item-label>
                        </q-item-section>
                    </q-item>
                    <!-- section one  -->
                </q-list>
                <q-list @click="toStaff">
                    <q-item to="/staff" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="person" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>Staff</q-item-label>
                        </q-item-section>
                    </q-item>
                    <!-- section one  -->
                </q-list>
                <q-list @click="toStudent()">
                    <q-item to="/student" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="badge" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>Student</q-item-label>
                        </q-item-section>
                    </q-item>
                    <!-- section one  -->
                </q-list>
                <q-list @click="toBook()">
                    <q-item to="/dasboard" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="import_contacts" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>Book</q-item-label>
                        </q-item-section>
                    </q-item>
                    <!-- section one  -->
                </q-list>
                <q-list @click="toLendBook()">
                    <q-item to="/dasboard" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="list_alt" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>Lend-Book</q-item-label>
                        </q-item-section>
                    </q-item>
                    <!-- section one  -->
                </q-list>


                <q-list @click="toReturnBook()">
                    <q-item to="/dasboard" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="assignment_returned" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>Return-Book</q-item-label>
                        </q-item-section>
                    </q-item>
                    <!-- section one  -->
                </q-list>
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
                <q-expansion-item icon="assignment_add" label="Reports">

                    <q-list class="q-pl-lg">
                        <q-list @click="toReportBook()">
                            <q-item to="/Login-1" active-class="q-item-no-link-highlighting">
                                <q-item-section avatar>
                                    <q-icon name="assignment_turned_in" />
                                </q-item-section>
                                <q-item-section>
                                    <q-item-label>Report-Book</q-item-label>
                                </q-item-section>
                            </q-item>
                        </q-list>
                        <q-list @click="toReportLend()">
                            <q-item to="/Lock" active-class="q-item-no-link-highlighting">
                                <q-item-section avatar>
                                    <q-icon name="list_alt" />
                                </q-item-section>
                                <q-item-section>
                                    <q-item-label>Report-Lend</q-item-label>
                                </q-item-section>
                            </q-item>
                        </q-list>

                        <q-list @click="toReportReturn()">
                            <q-item to="/Lock" active-class="q-item-no-link-highlighting">
                                <q-item-section avatar>
                                    <q-icon name="assignment_returned" />
                                </q-item-section>
                                <q-item-section>
                                    <q-item-label>Report-Return</q-item-label>
                                </q-item-section>
                            </q-item>

                        </q-list>

                    </q-list>
                </q-expansion-item>

                <q-expansion-item icon="settings" label="Settings">
                    <q-list class="q-pl-lg">

                        <q-list @click="toProfile()">
                            <q-item to="/Profile" active-class="q-item-no-link-highlighting">
                                <q-item-section avatar>
                                    <q-icon name="person" />
                                </q-item-section>
                                <q-item-section>
                                    <q-item-label>User Profile</q-item-label>
                                </q-item-section>
                            </q-item>
                        </q-list>

                        <q-list @click="toMaintenance()">
                            <q-item to="/Maintenance" active-class="q-item-no-link-highlighting">
                                <q-item-section avatar>
                                    <q-icon name="construction" />
                                </q-item-section>
                                <q-item-section>
                                    <q-item-label>Maintenance</q-item-label>
                                </q-item-section>
                            </q-item>
                        </q-list>

                    </q-list>
                </q-expansion-item>

                </q-list>
            </q-drawer>

            <q-page-container>
                <q-page class="q-pa-md">
                    <q-card flat bordered class="my-card">


                        <div class="row justify-between">

                            <!-- btn search -->
                            <q-card-section class="text-h5">
                                New LendBook
                            </q-card-section>

                            <div class="q-pa-sm">
                                <q-btn label="Add" color="primary" @click="goAddBook()"></q-btn>
                            </div>

                        </div>
                        <div>
                            <q-separator />
                        </div>
                        <!--  -->
                        <div>
                            <q-card-section>
                                <q-table flat :columns="columns" :filter="filter" :data="data">
                                    <!-- index -->
                                    <template slot="body-cell-index" slot-scope="props" :props="props.row">
                                        <q-td>
                                            {{ props.pageIndex + 1 }}
                                        </q-td>
                                    </template>
                                    <!-- action -->
                                    <template slot="body-cell-action" slot-scope="props" :props="props.row">
                                        <q-td align="center">
                                            <q-btn dense color="primary" icon="create" @click="onEdit(props.row.id)" />
                                        </q-td>
                                        <q-td align="center">
                                            <q-btn dense color="negative" icon="delete"
                                                @click="onDelete(props.row.id)" />
                                        </q-td>


                                    </template>
                                    <template v-slot:top-right>
                                        <q-input round dense debounce="300" v-model="filter" placeholder="Search">
                                            <template v-slot:append>
                                                <q-icon name="search" />
                                            </template>
                                        </q-input>
                                    </template>


                                </q-table>
                            </q-card-section>
                        </div>

                        <!-- dialog section -->
                        <q-dialog v-model="dialog" persistent :maximized="maximizedToggle" transition-show="slide-up"
                            transition-hide="slide-down">>
                            <q-card flat bordered class="my-card" style="width: 800px">

                                <div class="row justify-between">

                                    <!-- btn search -->
                                    <q-card-section class="text-h5">
                                        Update Lend Book
                                    </q-card-section>

                                    <div class="q-pa-sm">
                                        <q-btn icon="cancel" @click="close()" />
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
                                                <q-input dense hint="Username" ref="name" v-model="form.name"
                                                    label="Name" outlined
                                                    :rules="[val => !!val || 'Name is required']" />
                                            </div>

                                            <!-- latin -->
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <q-input dense hint="Phone Number" ref="phone" v-model="form.phone"
                                                    label="Phone" outlined
                                                    :rules="[val => !!val || 'Phone is required']" />
                                            </div>

                                        </div>

                                        <!-- description -->
                                        <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <q-input dense hint="Address" ref="address" v-model="form.address"
                                                    label="Address" outlined
                                                    :rules="[val => !!val || 'Address is required']" />
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <q-select dense hint="Gender" ref="gender" :options="genderOpt"
                                                    v-model="form.gender" label="Gender" outlined
                                                    :rules="[val => !!val || 'GEnder is required']" />
                                            </div>

                                        </div>
                                    </q-card-section>
                                </div>

                                <q-card-section align="right">

                                    <div class="q-pa-sm">
                                        <q-btn icon="edit" label="Update" color="indigo-10" push @click="OnUpdate()" />
                                    </div>
                                </q-card-section>



                                <!-- end table -->
                            </q-card>
                        </q-dialog>
                        <!-- end dialog section -->

                        <!-- <q-card-section align="right">
                <!-- btn -->
                        <!-- <div class="q-pa-sm">
                  <q-btn icon="add" label="Add" color="indigo-10" push @click="onSubmit()" />
                </div> 
              </q-card-section> -->



                        <!-- end table -->
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
        name: "new-home",
        data: function() {
            return {
                leftDrawerOpen: true,
                filter: "filter",
                data: [],
                maximizedToggle: false,
                dialog: false,
                genderOpt: [],
                form: {
                    name: "",
                    latin: "",
                    description: "",
                },
                columns: [{
                        name: "index",
                        label: "No",
                        align: "left",
                    },
                    {
                        name: "title",
                        label: "Title",
                        align: "left",
                        field: (row) => row.title,
                    },
                    {
                        name: "qty",
                        label: "Qty",
                        align: "left",
                        field: (row) => row.qty,
                    },
                    {
                        name: "type",
                        label: "Type",
                        align: "left",
                        field: (row) => row.type,
                    },
                    {
                        name: "date",
                        label: "Date",
                        align: "left",
                        field: (row) => row.date,
                    },

                ],
            };
        },
        created() {},
        methods: {
            toggleLeftDrawer() {
                this.leftDrawerOpen = !this.leftDrawerOpen
            },
            onSubmit() {
                this.$refs.name.validate();
                this.$refs.latin.validate();

                if (this.$refs.name.hasError || this.$refs.latin.hasError) {
                    // check when value null
                } else {
                    // 
                    axios
                        .post("action/new-home_action.php", {
                            action: "addNewHome",
                            name: this.form.name,
                            latin: this.form.latin,
                            description: this.form.description,
                            created: dayjs().format("YYYY-MM-DD HH:mm:ss"),
                            updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
                        })
                        .then((res) => {
                            if (res.data.status == "inserted") {
                                this.$q.notify({
                                    message: "Inserted successfully",
                                    type: "positive",
                                    position: "top-right",
                                });
                                //
                                setTimeout(() => {
                                    window.location.href = "home.php";
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
        },
    });
    </script>
</body>

</html>