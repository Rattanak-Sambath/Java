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
                                New Staff
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
                                        <q-input dense hint="Username" ref="name" v-model="form.name" label="Name"
                                            outlined :rules="[val => !!val || 'Name is required']" />
                                    </div>

                                    <!-- latin -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-input dense hint="Phone Number" ref="phone" v-model="form.phone"
                                            label="Phone" outlined :rules="[val => !!val || 'Phone is required']" />
                                    </div>

                                </div>

                                <!-- description -->
                                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-input dense hint="Address" ref="address" v-model="form.address"
                                            label="Address" outlined :rules="[val => !!val || 'Address is required']" />
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

    <script>
    var app = new Vue({
        el: "#q-app",
        name: "new-home",
        data: function() {
            return {

                genderOpt: ["Male", "Female"],
                data: [],
                leftDrawerOpen: true,
                form: {
                    name: "",
                    phone: "",
                    address: "",

                    gender: ""
                },
            };
        },
        created() {},
        methods: {


            toggleLeftDrawer() {
                this.leftDrawerOpen = !this.leftDrawerOpen
            },
            onSubmit() {
                this.$refs.name.validate();
                this.$refs.phone.validate();
                this.$refs.address.validate();
                this.$refs.gender.validate();




                if (this.$refs.name.hasError || this.$refs.phone.hasError || this.$refs.address.hasError || this
                    .$refs.gender.hasError) {
                    // check when value null
                } else {
                    //
                    axios
                        .post("action/staff_action.php", {
                            action: "addNewStaff",
                            name: this.form.name,
                            phone: this.form.phone,
                            address: this.form.address,
                            gender: this.form.gender,


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
                                    history.go(-1);

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

            convertDate(d) {
                return dayjs(d).format("YYYY-MM-DD");
            },
        },
    });
    </script>
</body>

</html>