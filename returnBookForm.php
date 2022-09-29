
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
                    <!-- <q-btn dense icon="logout" color="white" flat @click="onLogout()" /> -->

                </q-toolbar>
            </q-header>


            <q-page-container>
                <q-page class="q-pa-md">
                    <q-card flat bordered class="my-card">


                        <div class="row justify-between">

                            <!-- btn search -->
                            <q-card-section class="text-h5">
                                New ReturnBook
                            </q-card-section>

                            <div class="q-pa-sm">
                                <q-btn label="Back" color="negative" @click="goBack()" />
                            </div>

                        </div>
                        <q-breadcrumbs class="q-ma-xs container" separator="---" class="text-orange"
                            active-color="secondary">
                            <q-breadcrumbs-el label="Home" icon="home" class="q-ma-md" />
                            /
                            <q-breadcrumbs-el label="Borrow-Book" icon="list_alt" class="q-ma-xs" />

                            /
                            <q-breadcrumbs-el label="BorrowBook Form" icon="list_alt" class="q-ma-xs" />
                        </q-breadcrumbs>
                        <div>
                            <q-separator />
                        </div>
                        <!--  -->
                        <div>
                            <q-card-section>
                                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                    <q-input readonly dense hint="ForiegnKey" ref="foriegnKey" v-model="form.foreignkey"
                                        label="ForiegnKey" outlined
                                        :rules="[val => !!val || 'foriegnKey is required']" />
                                </div>
                                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                    <!-- name -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-select clearable dense hint="Student" ref="student" v-model="form.student"
                                            :options="studentOpt" option-label="name" option-value="name" map-options
                                            emit-value label="Student" outlined
                                            :rules="[val => !!val || 'Student is required']" />
                                    </div>

                                    <!-- latin -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-input dense hint="Qty" ref="qty" v-model="form.qty" label="Qty" outlined
                                            :rules="[val => !!val || 'Address is required']" />
                                    </div>


                                </div>

                                <!-- description -->
                                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-select clearable dense hint="Staff" ref="staff" v-model="form.staff"
                                            :options="staffOpt" option-label="name" option-value="name" map-options
                                            emit-value label="Staff" outlined
                                            :rules="[val => !!val || 'Staff is required']" />
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
                                            :options="bookOpt" option-label="title" option-value="title" map-options
                                            emit-value label="Book" outlined
                                            :rules="[val => !!val || 'Book is required']" />
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
                staffOpt: [],
                dataTable: [],
                leftDrawerOpen: true,
                form: {
                    staff: '',
                    student: "",
                    startDate: dayjs(new Date()).format('YYYY-MM-DD'),
                    book: "",
                  
                    qty: "",
                    showid: "",
                    status: "ReturnBook",
                    foreignkey: '',
                    user: '<?php echo $_SESSION['email'] ?>'

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
                        .post("action/returbBook_action.php", {
                            action: "addreturnBook",
                            staff: this.form.staff,
                            student: this.form.student,
                            book: this.form.book,
                            qty: this.form.qty,
                            startDate: this.form.startDate,
                          
                            status: this.form.status,
                            foreignkey: this.form.foreignkey,
                            user: this.form.user  

                            // description: this.form.description,
                            // created: dayjs().format("YYYY-MM-DD HH:mm:ss"),
                            // updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
                        })
                        .then((res) => {

                            if (res.data.status == "insert") {
                                this.$q.notify({
                                    message: "Inserted successfully",
                                    type: "positive",
                                    position: "top-right",
                                });
                                //
                                setTimeout(() => {
                                    history.go(-1);

                                }, 500);

                            } else {
                                console.log(res.status)
                                this.$q.notify({
                                    message: "Cannot Inserted!!!" + res.status,
                                    type: "negative",
                                    position: "top-right",
                                });
                                this.$q.notify({
                                    message: res.data,
                                    type: "negative",
                                    position: "top-right",
                                });
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
            findById(id) {
                axios.post("action/returbBook_action.php", {
                    action: "findreturnBookById",
                    id: id

                }).then((res) => {
                    this.form = res.data
                    console.log(res.data)

                })

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
            getAllData() {
                axios
                    .post("action/returbBook_action.php", {
                        action: "getAllreturnBook",
                    })
                    .then((res) => {
                        this.dataTable = res.data;

                        this.form.foreignkey = this.dataTable.length + 1;

                    });
            },
        },
        mounted() {
            this.getStudent();
            this.getBook();
            this.getStaff()
            this.getAllData()
        },
    });
    </script>
</body>

</html>