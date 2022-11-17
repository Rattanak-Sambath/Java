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
                    <q-btn class="" dense round flat icon="contact_mail" @click="userClick">
                        <q-badge color="red" floating transparent>
                            <?php echo  $_SESSION['email'] ?>
                        </q-badge>
                    </q-btn>
                    <div class="q-ma-md">
                        <?php echo $_SESSION['role'] ?>
                    </div> 
                    <!-- right side -->
                    <q-avatar >
                        <img  class="image" src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg">
                    </q-avatar>
                    <q-btn class="q-mx-md" dense round flat icon="email">
                        <q-badge color="red" floating transparent>
                            4
                        </q-badge>
                    </q-btn>
                    <q-btn dense icon="logout" color="white" flat @click="onLogout()" />

                </q-toolbar>
            </q-header>
            <q-drawer :width="230" :breakpoint="400" v-model="leftDrawerOpen" bordered class=" text-black ">
                <div>
                    <q-img class="absolute-top" src="https://cdn.quasar.dev/img/material.png" style="height: 150px">
                        <div class="absolute-bottom bg-transparent">
                        <q-avatar size="56px" class="q-mb-sm" >
                              <img  src="<?php echo 'upload/'.$_SESSION['image'] ?>">        
                            </q-avatar>
                            <div class="text-weight-bold"><?php echo $_SESSION['email']; ?></div>

                        </div>
                    </q-img>
                </div>
                <q-card>
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

                <q-list @click="toClient()">
                    <q-item to="/client" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="check_box" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>Client</q-item-label>
                        </q-item-section>
                    </q-item>
                
                </q-list>
             
                <q-list @click="toLendBook()">
                    <q-item to="/dasboard" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="list_alt" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>Borrow-Book</q-item-label>
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
                <q-list @click="toAccessary()">
                    <q-item to="/toAccessary" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="apps" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>Accessary</q-item-label>
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
                </q-card>
            </q-drawer>

            <q-page-container>

                <div>
                    <q-card flat bordered class="my-card">


                        <div class="row justify-between">

                            <!-- btn search -->
                            <q-card-section class="text-h5">
                                LendBook Report
                            </q-card-section>

                            <div class="q-pa-sm">
                                <q-btn label="Back" color="negative" @click="goBack()" />
                            </div>

                        </div>
                        <q-breadcrumbs class="q-ma-xs container" separator="---" class="text-orange" active-color="secondary">
                                    <q-breadcrumbs-el label="Home" icon="home" class="q-ma-md" />
                                    /
                                    <q-breadcrumbs-el label="Report Lend Book" icon="list_alt" class="q-ma-xs" />

                                  
                            </q-breadcrumbs>
                        <div>
                            <q-separator />
                        </div>
                        <!--  -->
                        <div>
                            <q-card-section>

                                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                    <!-- name -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <q-select clearable dense hint="Student" ref="student" v-model="form.student"
                                            outlined :options="studentOpt" option-label="name" option-value="name"
                                            map-options emit-value label="Student"
                                            :rules="[val => !!val || 'Student is required']" />
                                    </div>
                                   
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <q-input dense type="date" hint="StartDate" ref="startDate"
                                            v-model="form.startDate" outlined
                                            :rules="[val => !!val || 'Date is required']" />
                                    </div>

                                    <!-- latin -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <q-input dense hint="End Date" type="date" ref="endDate" v-model="form.endDate"
                                            outlined :rules="[val => !!val || 'Phone is required']" />
                                    </div>

                                </div>

                                <!-- description -->

                            </q-card-section>
                        </div>

                        <q-card-section align="right">

                            <div class="q-pa-sm">
                                <q-btn icon="add" label="Add" color="indigo-10" push @click="onFind()" />
                            </div>
                        </q-card-section>



                        <!-- end table -->
                    </q-card>

                </div>
                <div class="q-ma-md">

                    <q-card class="my-card q-my-sm ">
                        <!--  -->
                        <q-card class="purple-10 text-center">
                            <q-card-section>
                                <p class="text-h5 text-bold-5 q-mt-sm q-mb-xs text-weight-bolder">
                                    បណ្ណាល័យ
                                    សកលវិទ្យាល័យជាតិ
                                    បាត់ដំបង
                                </p>
                                <p class="text-h5 text-bold q-mt-sm q-mb-xs">LendBook Report</p>
                            </q-card-section>

                        </q-card>
                        <hr>
                        <q-card-section>

                            <q-table :columns="columns" :filter="filter" :data="datatable">
                                <!-- index -->

                                <template slot="body-cell-index" slot-scope="props" :props="props.row">
                                    <q-td>
                                        {{ props.pageIndex + 1 }}
                                    </q-td>
                                </template>
                                <!-- action -->

                                <template slot="body-cell-image" slot-scope="props" :props="props.row">
                                    <q-td align="center" class="vertical-align-middle">


                                        <div v-show="props.row.id">
                                            <img :src="'upload/' + props.row.image" style="width:50px ; height: 50px"
                                                alt="">
                                        </div>

                                    </q-td>


                                </template>
                                <template v-slot:top-right slot="body-cell-title">
                                    <q-input round dense debounce="300" v-model="filter" placeholder="Search">
                                        <template v-slot:append>
                                            <q-icon name="search" />
                                        </template>
                                    </q-input>
                                </template>
                                <template slot="body-cell-image" slot-scope="props" :props="props.row">
                                    <q-td align="center">
                                        <div v-show="props.row.id">
                                            <img :src="'upload/' + props.row.image" style="width:50px ; height: 50px"
                                                alt="">
                                        </div>

                                    </q-td>



                                </template>

                                <template v-slot:top-right>
                                    <q-btn dense color="indigo-10" round icon="menu_book" class="q-ma-md">
                                        <q-badge color="red-10" floating>{{datatable.length}}</q-badge>
                                    </q-btn>
                                    <q-input round dense debounce="300" v-model="filter" placeholder="Search">
                                        <template v-slot:append>
                                            <q-icon name="search" />
                                        </template>
                                    </q-input>
                                </template>

                            </q-table>
                            <q-separator />
                        </q-card-section>

                    </q-card>
                    <q-card style="width: 100%">

                        <div style="width:300px" class="shadow-7 q-ma-md  float-right">

                            <div class="text-right" style="width: 300px">Total Book:{{datatable}} </div>

                        </div>


                    </q-card>

                </div>
                <q-dialog v-model="Userdialog"  :maximized="maximizedToggle" transition-show="slide-down" transition-hide="slide-up">                   
                                <q-card class="my-card">                      
                                    <img  src="<?php echo 'upload/'.$_SESSION['image'] ?>"> 
                                        <q-card-section>                             
                                            <div class="row no-wrap items-center text-bold">
                                            Email : 
                                                <div class="text-subtitle1 q-ma-md">
                                                <?php echo $_SESSION['email'] ?>
                                                </div>                                                           
                                            </div>
                                            <div class="row no-wrap items-center text-bold">
                                            Role : 
                                                <div class="text-subtitle1 q-ma-md">
                                                    <?php echo $_SESSION['role'] ?>
                                                </div>
                                            </div>                          
                                        </q-card-section>         
                                </q-card>
                            </q-dialog>
                  



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
                dialog: false,
                maximizedToggle: false,
                staffOpt: [],
                studentOpt: [],
                Userdialog: false,
                form: {
                    startDate: '',
                    endDate: dayjs(new Date()).format('YYYY-MM-DD'),
                    staff: '',
                    student: ''
                },
                columns: [{
                        name: "index",
                        label: "No",
                        align: "left",
                    },
                    {
                        name: "staff",
                        label: "Staff",
                        align: "left",
                        field: (row) => row.staff,
                    },
                    {
                        name: "student",
                        label: "Student",
                        align: "left",
                        field: (row) => row.student,
                    },
                    {
                        name: "title",
                        label: "Title",
                        align: "left",
                        field: (row) => row.title,
                    },
                    {
                        name: "image",
                        label: "Image",
                        align: "left",
                        field: (row) => row.image,
                    },
                    {
                        name: "qty",
                        label: "Qty",
                        align: "left",
                        field: (row) => row.qty,
                    },

                    {
                        name: "startDate",
                        label: "Date",
                        align: "left",
                        field: (row) => row.startDate,
                    },
                    {
                        name: "end_date",
                        label: "Expired Date",
                        align: "left",
                        field: (row) => row.end_date,
                    },



                ],
                genderOpt: ["Male", "Female"],
                datatable: [],
                filter: "",
                leftDrawerOpen: true,
                showId: '',

                filter: ""
            };
        },
        created() {},
        watch: {
            'form': {
                handler: function(newValue, oldValue) {
                    if (newValue) {
                        this.datatable = []
                        this.onFind();
                    }
                },
                deep: true,
                immediate: true
            }
        },
        methods: {
            userClick(){
                this.Userdialog = true
            },

            toggleLeftDrawer() {
                this.leftDrawerOpen = !this.leftDrawerOpen
            },
            onFind() {

                this.$refs.student.validate();
                this.$refs.startDate.validate();
                this.$refs.endDate.validate();

                // || this.$refs.startDate.hasError || this.$refs.endDate.hasError

                if (this.$refs.student.hasError) {
                    // check when value null
                } else {

                    this.datatable = [];
                    axios
                        .post("action/reports.php", {
                            action: "findBookLendReport",                         
                            student: this.form.student,
                            startDate: this.form.startDate,
                            endDate: this.form.endDate,

                            // created: dayjs().format("YYYY-MM-DD HH:mm:ss"),
                            // updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
                        })
                        .then((res) => {
                            if (res) {

                                this.datatable = res.data;
                                console.log(res.data);

                            } else {
                                this.$q.notify({
                                    message: "Cannot find !!!",
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
            toClient() {
                window.location.href = "ApClient.php"
            },
            toAccessary(){
                window.location.href = "Accessary.php";
            },
            goAddBook() {
                window.location.href = "bookForm.php";
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
                            window.location.href = "homeClient.php";
                        }
                    });
            },
            getStaff() {
                axios
                    .post("action/staff_action.php", {
                        action: "getAllStaff",
                    })
                    .then((res) => {
                        this.staffOpt = res.data;


                    });
            },
            goBack() {
                window.location.href = "staff.php";
            },
            getAllData() {
                axios
                    .post("action/lendBook_action.php", {
                        action: "getAllLendBook",
                    })
                    .then((res) => {
                        this.datatable = res.data;
                        console.log('all data',res.data)

                    });
            },
            getStudent() {
                axios
                    .post("action/student_action.php", {
                        action: "getAllStudent",
                    })
                    .then((res) => {
                        this.studentOpt = res.data;


                    });
            },


        },
        mounted() {
            this.getStaff();
            this.getAllData();
            this.getStudent();

        },
    });
    </script>
</body>

</html><style>
       .image {
    position: absolute;
   
    -webkit-animation:spin 4s linear infinite;
    -moz-animation:spin 4s linear infinite;
    animation:spin 4s linear infinite;
}
@-moz-keyframes spin { 
    100% { -moz-transform: rotate(360deg); } 
}
@-webkit-keyframes spin { 
    100% { -webkit-transform: rotate(360deg); } 
}
@keyframes spin { 
    100% { 
        -webkit-transform: rotate(360deg); 
        transform:rotate(360deg); 
    } 
}
</style>
