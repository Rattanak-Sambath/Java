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
                    <q-avatar>
                    <img  src="<?php echo 'upload/'.$_SESSION['image'] ?>">                    </q-avatar>
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
                <q-page class="q-pa-md">
                    <q-card flat bordered class="my-card">


                        <div class="row justify-between">

                            <!-- btn search -->
                            <q-card-section class="text-h5">
                                New LendBook
                            </q-card-section>

                            <div class="q-pa-sm">
                                <q-btn label="Add" color="primary" @click="goAddLengBook()"></q-btn>
                            </div>

                        </div>
                        <q-breadcrumbs class="q-ma-xs container" separator="---" class="text-orange"
                            active-color="secondary">
                            <q-breadcrumbs-el label="Home" icon="home" class="q-ma-md" />
                            /
                            <q-breadcrumbs-el label="Borrow-Book" icon="list_alt" class="q-ma-xs" />


                        </q-breadcrumbs>
                        <div>
                            <q-separator />
                        </div>
                        <!--  -->
                        <div>
                            <q-card-section>
                                <q-table flat :columns="columns" :data="dataTable" :filter="filter">
                                    <!-- index -->
                                    <template slot="body-cell-index" slot-scope="props" :props="props.row">
                                        <q-td>
                                            {{ props.pageIndex + 1 }}
                                        </q-td>
                                    </template>
                                    <template slot="body-cell-image" slot-scope="props" :props="props.row">
                                        <q-td align="center">
                                            <img :src="'upload/' + props.row.image" style="width:50px ; height: 50px"
                                                alt="">
                                        </q-td>

                                    </template>
                                    <!-- action -->
                                    
                                    <template slot="body-cell-action" slot-scope="props" :props="props.row">
                                        <q-td align="center"  v-show="<?php echo $_SESSION['role'] === 'admin' ?>">
                                            <q-btn dense color="primary" icon="create"
                                                @click="onEdit(props.row.foreignkey)" />
                                        </q-td>
                                        <q-td align="center"  v-show="<?php echo $_SESSION['role'] === 'admin' ?>">
                                            <q-btn dense color="negative" icon="delete"
                                                @click="onDelete(props.row.foreignkey)" />
                                        </q-td>
                                        <q-td align="left" v-show="<?php echo $_SESSION['role'] !== 'admin' ?>" >

                                    <q-badge color="red" outlinded> Your Dont Have Permisson</q-badge>
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
                            transition-hide="slide-down">
                            <q-card flat bordered class="my-card" style="width: 800px">

                                <div class="row justify-between">

                                    <!-- btn search -->
                                    <q-card-section class="text-h5">
                                        Update Lend Book
                                    </q-card-section>

                                    <div class="q-pa-sm">
                                        <q-btn icon="refresh" @click="close()" />
                                    </div>

                                </div>
                                <div>
                                    <q-separator />
                                </div>
                                <!--  -->
                                <div>
                                    <q-card-section>
                                        <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                            <q-input readonly dense hint="ForiegnKey" ref="foriegnKey"
                                                v-model="form.foreignkey" label="ForiegnKey" outlined
                                                :rules="[val => !!val || 'foriegnKey is required']" />
                                        </div>
                                        <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                            <!-- name -->
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <q-select clearable dense hint="Student" ref="student"
                                                    v-model="form.student" :options="studentOpt" option-label="name"
                                                    option-value="name" map-options emit-value label="Student" outlined
                                                    :rules="[val => !!val || 'Student is required']" />
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <q-input dense hint="Qty" ref="qty" v-model="form.qty" label="Qty"
                                                    outlined :rules="[val => !!val || 'Address is required']" />
                                            </div>


                                            <!-- latin -->


                                        </div>

                                        <!-- description -->
                                        <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <q-select clearable dense hint="Staff" ref="staff" v-model="form.staff"
                                                    :options="staffOpt" option-label="name" option-value="name"
                                                    map-options emit-value label="Staff" outlined
                                                    :rules="[val => !!val || 'Student is required']" />
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <q-input type="date" dense hint="startDate" ref="startDate"
                                                    v-model="form.startDate" outlined
                                                    :rules="[val => !!val || 'Date is required']" />
                                            </div>


                                        </div>
                                        <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <q-select clearable dense hint="Book" ref="book" v-model="form.book"
                                                    :options="bookOpt" option-label="title" option-value="title"
                                                    map-options emit-value label="Book" outlined
                                                    :rules="[val => !!val || 'Book is required']" />
                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <q-input type="date" dense hint="Expired_date" ref="end_date"
                                                    v-model="form.end_date" outlined
                                                    :rules="[val => !!val || 'Date is required']" />
                                            </div>
                                        </div>

                                    </q-card-section>
                                </div>

                                <q-card-section align="right">

                                    <div class="q-pa-sm">
                                        <q-btn icon="edit" label="Update" color="indigo-10" push @click="onUpdate()" />
                                    </div>
                                </q-card-section>



                                <!-- end table -->
                            </q-card>
                        </q-dialog>

                    </q-card>
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
                Userdialog: false,
                leftDrawerOpen: true,
                filter: "",
                dataTable: [],
                maximizedToggle: false,
                dialog: false,
                studentOpt: [],
                bookOpt: [],
                staffOpt: [],
                showid: "",
                form: {
                    staff: '',
                    student: "",
                    book: "",
                    qty: "",
                    startDate: "",
                    end_date: "",
                    status: "lendBook",
                    foreignkey: '',
                    user: '<?php echo $_SESSION['email'] ?>'
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
                        field: (row) => row.book,
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
                        name: "start_date",
                        label: "Date",
                        align: "left",
                        field: (row) => row.startDate,
                    },
                    {
                        name: "expired_date",
                        label: "Expired Date",
                        align: "left",
                        field: (row) => row.end_date,
                    },
                    {
                        name: "action",
                        label: "Action",
                        align: "left",


                    },


                ],
            };
        },

        methods: {
            userClick(){
                this.Userdialog = true
            },
            toggleLeftDrawer() {
                this.leftDrawerOpen = !this.leftDrawerOpen
            },
            onUpdate(id) {

                this.$refs.student.validate();
                // this.$refs.book.validate();
                // this.$refs.start_date.validate();
                // this.$refs.expired_date.validate();
                // this.$refs.qty.validate();

                // || this.$refs.book.hasError || this.$refs.qty.hasError || this
                //     .$refs.start_date.hasError || this.$refs.end_date.hasError
                if (this.$refs.student.hasError) {
                    // check when value null
                } else {
                    //
                    axios
                        .post("action/lendBook_action.php", {

                            action: "updateLendBook",
                            id: this.showid,
                            staff: this.form.staff,
                            student: this.form.student,
                            book: this.form.book,
                            qty: this.form.qty,
                            startDate: this.form.startDate,
                            end_date: this.form.end_date,
                            status: this.form.status,
                            foreignkey: this.form.foreignkey,
                            user: this.form.user


                        })
                        .then((res) => {

                            if (res.data.status == "update") {
                                this.$q.notify({
                                    message: "Updated successfully",
                                    type: "positive",
                                    position: "top-right",
                                });
                                //
                                setTimeout(() => {
                                    window.location.href = "lendBook.php";

                                }, 500);

                            } else {

                                this.$q.notify({
                                    message: "Cannot Update!!!" + res.status,
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
            onDelete(id) {
                console.log(id);
                axios.post("action/lendBook_action.php", {
                    action: "deleteLendBook",
                    id: id,
                    status: this.form.status

                }).then((res) => {
                    if (res.data.status == "delete") {
                        this.$q.notify({
                            message: "delete Delete successfully",
                            type: "positive",
                            position: "top-right",

                        });
                        //
                        setTimeout(() => {
                            window.location.href = "lendBook.php";
                        }, 500);
                    } else {
                        this.$q.notify({
                            message: "Delete unsuccessful" + res.data.status,
                            type: "negative",
                            position: "top-right",

                        });
                    }

                })
            },
            close() {
              
                
                axios.post("action/lendBook_action.php", {
                    action: "findLendBookById",
                    id: this.showid,
                    status: this.form.status
                   

                }).then((res) => {
                    this.form = res.data
                    console.log(res.data)

                })
                
            },
            onEdit(id) {
                this.dialog = true
                this.showid = id;
                axios.post("action/lendBook_action.php", {
                    action: "findLendBookById",
                    id: id,
                    status: this.form.status
                   

                }).then((res) => {
                    this.form = res.data
                    console.log(res.data)

                })

            },
            toClient() {
                window.location.href = "ApClient.php"
            },
            goAddLengBook() {
                window.location.href = "lendBookForm.php";
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
            toAccessary(){
                window.location.href = "Accessary.php";
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

            convertDate(d) {
                return dayjs(d).format("YYYY-MM-DD");
            },
            getAllData() {
                axios
                    .post("action/lendBook_action.php", {
                        action: "getAllLendBook",
                    })
                    .then((res) => {
                        this.dataTable = res.data;

                        console.log(form.foreignkey)

                    });
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
            getStaff() {
                axios
                    .post("action/staff_action.php", {
                        action: "getAllStaff",
                    })
                    .then((res) => {
                        this.staffOpt = res.data;
                        console.log('staff', res.data)

                    });
            },
        },
        mounted() {
            this.getAllData()
            this.getStudent()
            this.getBook()
            this.getStaff()
        },
    });
    </script>
</body>

</html>
<style>
.image {
    position: absolute;

    -webkit-animation: spin 4s linear infinite;
    -moz-animation: spin 4s linear infinite;
    animation: spin 4s linear infinite;
}

@-moz-keyframes spin {
    100% {
        -moz-transform: rotate(360deg);
    }
}

@-webkit-keyframes spin {
    100% {
        -webkit-transform: rotate(360deg);
    }
}

@keyframes spin {
    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
</style>