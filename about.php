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
                        <div>
                            <q-btn flat dense round @click="toggleLeftDrawer" class="q-text-lg"  icon="menu" aria-label="Menu" />
                        </div>
                    <q-toolbar-title class="row q-mx-lg" >
                        <div>
                            <q-btn flat dense round @click="toggleLeftDrawer" class="q-text-lg"  size="25px" color="white" icon="menu_book" aria-label="Menu" />
                        </div>
                        <div class="text-h5 q-my-auto">
                           Rabbit Library
                        </div>

                    </q-toolbar-title>
                    <q-btn dense color="purple" round icon="email" class="q-ml-md q-mx-md">
                            <q-badge color="red" floating>4</q-badge>
                    </q-btn>

                    <q-btn dense icon="login" size="20px" color="white" flat @click="onLogin()" />

                </q-toolbar>
            </q-header>
          <q-drawer :width="230" style="height:100% ;" v-model="leftDrawerOpen" bordered class=" text-black  ">
                <div style="height: 150px">
                    <q-img class="absolute-top" src="https://cdn.quasar.dev/img/material.png" style="height: 150px">
                   <!-- <div class="absolute-bottom bg-transparent">
                            <q-avatar size="56px" class="q-mb-sm" >
                              <img  src="<?php echo 'upload/'.$_SESSION['image'] ?>">        
                            </q-avatar>
                            
                            <div class="text-weight-bold"><?php echo $_SESSION['email']; ?></div>

                        </div>  -->
                  </q-img>
                </div><div>
                <q-card>
                <q-list @click="toHome()">
                    <q-item to="/homeClient" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="home" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>Home</q-item-label>
                        </q-item-section>
                    </q-item>
                    
                </q-list>   
                <q-list @click="toHistory()">
                    <q-item to="/history" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="history" />
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>History</q-item-label>
                        </q-item-section>
                    </q-item>
                    
                </q-list>   
                <q-list @click="toAbout()">
                    <q-item to="/about" active-class="q-item-no-link-highlighting">
                        <q-item-section avatar>
                            <q-icon name="contact_page" />
                        </q-item-section>
                        <q-item-section >
                            <q-item-label>About Us</q-item-label>
                        </q-item-section>
                    </q-item>
                    
                </q-list>   
                </q-list>
                </div>
                </q-card>
            </q-drawer>  
            <q-page-container>
                <q-page class="q-pa-md">

                    <q-card flat bordered class="my-card" style="height: 100vh;">
                        <q-breadcrumbs class="q-ma-md" separator="---" class="text-orange" active-color="secondary">
                            <q-breadcrumbs-el label="Home" icon="home" class="q-ma-md" />
                            /
                            <q-breadcrumbs-el label="Dashboard" icon="widgets" class="q-ma-xs" />

                        </q-breadcrumbs>
                        <div>
                            <q-card-section class="text-h5 text-bold text-center">
                                ABOUT US
                            </q-card-section>
                            
                            <p class="text-center text-bold"> Please take a moments to get in touch, we'll get back to you shortly</p>
                        </div>


                        <q-separator></q-separator>

                        <!--  -->
                       
                            

                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                                <div class="q-ma-md shadow-11 ">
                                     <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6535.551404555549!2d103.20307424132699!3d13.09524988546788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2skh!4v1668435475514!5m2!1sen!2skh" class="full-width" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <q-card-section class="text-h5 text-bold">
                                        Contact Us
                                    </q-card-section>
                                     <div class=" shadow-11 q-pa-md">
                                           <div class="q-mb-md">
                                                <q-input dense hint="Email Address" ref="email" v-model="form.email"
                                                    label="Email" outlined :rules="[val => !!val || 'Email is required']" />
                                           </div>
                                           <div class="q-mb-md">
                                                <q-input dense hint="Phone Number" ref="phone" v-model="form.phone"
                                                    label="Phone" outlined :rules="[val => !!val || 'Phone is required']" />
                                           </div>
                                           <div class="q-mb-md">
                                                <q-input type="textarea" dense hint="Describtion"  v-model="form.phone"
                                                    label="Description" outlined  />
                                           </div>
                                           <div class="q-mb-md text-right">
                                                <q-btn icon="arrow_right_alt" @click="submit()"  color="primary">Submit</q-btn>
                                           </div>
                                        
                                            
                                    </div>
                            </div>
                        </div>

                    </q-card>
                    


                    <!-- <q-dialog v-model="Userdialog"  :maximized="maximizedToggle" transition-show="slide-down" transition-hide="slide-up">                   
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
                    </q-dialog> -->
                    



                </q-page>
                

            </q-page-container>

            <q-foo class="text-center">
                        <p>Copyright and reserved by 2022-2025</p>
                    </q-foo>
        </q-layout>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js">
    </script>
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
                maximizedToggle:false,
                form: {
                    email: "",
                    phone: "",
                    describtion: "",
                   
                },

            };
        },
        created() {},
        methods: {
            submit(){
                this.$refs.email.validate();
                this.$refs.phone.validate();
                
                
                if (this.$refs.email.hasError || this.$refs.phone.hasError  ) {
                    
                } else {
                  
                                this.$q.notify({
                                    message: res.data.err,
                                    type: "negative",
                                    position: "top-right",
                                });
                    // axios
                        // .post("action/student_action.php", {
                        //     action: "addNewStudent",
                        //     name: this.form.name,
                        //     phone: this.form.phone,
                        //     address: this.form.address,
                        //     gender: this.form.gender,

                            // description: this.form.description,
                            // created: dayjs().format("YYYY-MM-DD HH:mm:ss"),
                            // updated: dayjs().format("YYYY-MM-DD HH:mm:ss"),
                        // })
                        // .then((res) => {
                        //     if (res.data.status == "insert") {
                        //         this.$q.notify({
                        //             message: "Inserted successfully",
                        //             type: "positive",
                        //             position: "top-right",
                        //         });
                        //         //
                        //         setTimeout(() => {
                        //             history.go(-1);

                        //         }, 500);

                        //     } else {
                        //         this.$q.notify({
                        //             message: "Cannot Inserted!!!",
                        //             type: "negative",
                        //             position: "top-right",
                        //         });
                        //         this.$q.notify({
                        //             message: res.data.err,
                        //             type: "negative",
                        //             position: "top-right",
                        //         });
                        //     }
                        // });
                }
            },
            userClick(){
                this.Userdialog = true
            },
            toggleLeftDrawer() {
                this.leftDrawerOpen = !this.leftDrawerOpen
            },

            toDashboard() {
                window.location.href = "client/home.php"
            },
            toHistory() {
                window.location.href = "history.php";
            },
            toHome() {
                window.location.href = "homeClient.php";
            },
            toAbout() {
                window.location.href = "about.php";
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
            onLogin() {             
                  window.location.href ="login.php";                 
            },
            convertDate(d) {
                return dayjs(d).format("YYYY-MM-DD");
            },
            findStaff() {
                axios
                    .post("action/staff_action.php", {
                        action: "getAllStaff",
                    })
                    .then((res) => {
                        this.staff = res.data;
                    });
            },
            findBook() {
                axios
                    .post("action/book_action.php", {
                        action: "getAllBook",
                    })
                    .then((res) => {
                        this.book = res.data;
                    });
            },
            findStudent() {
                axios
                    .post("action/student_action.php", {
                        action: "getAllStudent",
                    })
                    .then((res) => {
                        this.student = res.data;
                        console.log(res.data)

                    });
            },
            findLendBook() {
                axios
                    .post("action/lendBook_action.php", {
                        action: "getAllLendBook",
                    })
                    .then((res) => {
                        this.lendBook = res.data;
                        console.log(res.data)

                    });
            },
            findreturnBook() {
                axios
                    .post("action/returbBook_action.php", {
                        action: "getAllreturnBook",
                    })
                    .then((res) => {
                        this.returnBook = res.data;
                        console.log(res.data)

                    });
            },
            findAccessary() {
                axios
                    .post("action/Accessary_action.php", {
                        action: "getAllAccessary",
                    })
                    .then((res) => {
                        this.accessaryOpt = res.data;
                        console.log(res.data)
                    });
            }
        },
        mounted() {
            this.findStaff();
            this.findStudent();
            this.findBook();
            this.findLendBook();
            this.findreturnBook();
            this.findAccessary();
        },
    });
    </script>
</body>

</html>
<style>
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