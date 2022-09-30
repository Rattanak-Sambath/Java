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
                        <q-breadcrumbs class="q-ma-xs" separator="---" class="text-orange" active-color="secondary">
                            <q-breadcrumbs-el label="Home" icon="home" class="q-ma-md" />
                            /
                            <q-breadcrumbs-el label="Accessary" icon="apps" class="q-ma-xs" />

                            /
                            <q-breadcrumbs-el label="Accessary Form" icon="apps" class="q-ma-xs" />

                        </q-breadcrumbs>
                        <div>
                            <q-separator />
                        </div>
                        <!--  -->
                        <div>
                            <q-card-section>
                            <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md" v-if="form.type === 'Donate'">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-card-section class="text-right text-bold">
                                            <p >Name of the Donater :</p>
                                        </q-card-section>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div >
                                          <q-input dense hint="Donater" clearable  ref="name" v-model="form.donate" label="Donater"
                                                        outlined :rules="[val => !!val || 'Name is required']" />
                                        </div> 
                                    </div>
                                   
                             </div>
                          
                                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                    <!-- name -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-input dense hint="Username" ref="name" v-model="form.name" label="Name"
                                            outlined :rules="[val => !!val || 'Name is required']" />
                                    </div>

                                    <!-- latin -->
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-select dense hint="Type" ref="type" v-model="form.type"
                                            label="Type" :options="typeOpt" outlined :rules="[val => !!val || 'Type is required']" />
                                          
                                    </div>

                                </div>

                                <!-- description -->
                                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-input dense hint="Price" ref="price" v-model="form.price"
                                            label="Price" outlined :rules="[val => !!val || 'Price is required']" />
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-select dense hint="Category" clearable ref="category" :options="categoryOpt"
                                            v-model="form.category" label="Category" outlined
                                            :rules="[val => !!val || 'Category is required']" />
                                    </div>

                                </div>
                                <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-input type="number" dense hint="Qty" ref="qty" v-model="form.qty"
                                            label="Qty" outlined :rules="[val => !!val || 'Qty is required']" />
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <q-input type="date" dense hint="Date" ref="darte" 
                                            v-model="form.date" outlined
                                            :rules="[val => !!val || 'Date is required']" />
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

                categoryOpt: ["Camera", "Scanner", "Monitor", "Fans"],
                data: [],
                leftDrawerOpen: true,
                typeOpt: ['Cash', 'Donate'],
                form: {
                    name: "",
                    price: '',
                    qty: "1",
                    category: "",
                    date: dayjs(new Date()).format('YYYY-MM-DD'),
                    type:'',
                    donate: ''
                    
                },
            };
        },
        created() {},
         watch: {
            'form.qty' : {
                handler: function(newValue, oldValue) {
                    if (newValue) {
                        this.form.price = this.form.qty * this.form.price
                    }
                   
                },
                deep: true,
                immediate: true
            }
        },
        methods: {


            toggleLeftDrawer() {
                this.leftDrawerOpen = !this.leftDrawerOpen
            },
           
            onSubmit() {
                this.$refs.name.validate();
              
                if (this.$refs.name.hasError  ) {
                    // check when value null
                } else {
                    //
                    axios
                        .post("action/Accessary_action.php", {
                            action: "addNewAccessary",
                            name: this.form.name,
                            type: this.form.type,
                            price: this.form.price,
                            qty: this.form.qty,
                            date: this.form.date,
                            category: this.form.category,
                            donate: this.form.donate
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