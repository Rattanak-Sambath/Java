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
                <q-list >
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
                        <q-item-section>
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
                            <q-card-section class="text-h5">
                                Dashboard
                            </q-card-section>
                        </div>


                        <q-separator></q-separator>

                        <!--  -->
                        <div class="row">
                            <div class="col-md-9 col-lg-9">
                                <div class="q-mx-tu" style=" width:100% ">
                                    <div class=" row text-center">
                                        <div class=" col-md-4 col-sm-12 col-xs-12  ">
                                            <div class=" q-item q-item-type row no-wrap q-pa-xs"
                                                style="background-color: rgb(243, 113, 105); height: 150px">
                                                <div class="q-item__section column q-item__section--side justify-center q-pa-lg q-mr-none text-white"
                                                    style="background-color: rgb(243, 70, 54);">
                                                    <q-icon name="person"></q-icon>
                                                    </div>
                                                <div
                                                    class="q-item__section column q-item__section--main justify-center q-pa-md q-ml-none  text-white">
                                                    <div class="q-item__label text-white text-h6 text-weight-bolder">
                                                        Book
                                                    </div>
                                                    <div class="q-item__label"> {{book.length}}</div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 ">
                                            <div class="q-item q-item-type row no-wrap q-pa-xs bg-green-10"
                                                style="height:150px">
                                                <div
                                                    class=" bg-green-5 q-item__section column q-item__section--side justify-center q-pa-lg q-mr-none text-white">
                                                    <q-icon name="person"></q-icon>

                                                    <!---->
                                                </div>
                                                <div
                                                    class="q-item__section column q-item__section--main justify-center q-pa-md q-ml-none  text-white">
                                                    <div class="q-item__label text-white text-h6 text-weight-bolder">
                                                        Student
                                                    </div>
                                                    <div class="q-item__label">{{student.length}}</div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 ">
                                            <div class="q-item q-item-type row no-wrap q-pa-xs bg-indigo-10"
                                                style="height:150px">
                                                <div class="bg-indigo-5 q-item__section column q-item__section--side
                                            justify-center q-pa-lg q-mr-none text-white">
                                                    <q-icon name="person"></q-icon>

                                                    <!---->
                                                </div>
                                                <div
                                                    class="q-item__section column q-item__section--main justify-center q-pa-md q-ml-none  text-white">
                                                    <div class="q-item__label text-white text-h6 text-weight-bolder">
                                                        Staff
                                                    </div>
                                                    <div class="q-item__label">{{staff.length}}</div>
                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                    <div class=" row text-center q-my-xs">
                                        <div class="col-md-4 col-sm-4 col-xs-12 ">
                                            <div class="q-item q-item-type row no-wrap q-pa-xs bg-deep-orange-10"
                                                style="height:150px">
                                                <div
                                                    class="bg-deep-orange-5 q-item__section column q-item__section--side justify-center q-pa-lg q-mr-none text-white">
                                                    <i class="notranslate material-icons q-icon text-white"
                                                        aria-hidden="true" role="presentation"
                                                        style="font-size: 24px;">bar_chart</i>
                                                </div>
                                                <div
                                                    class="q-item__section column q-item__section--main justify-center q-pa-md q-ml-none  text-white">
                                                    <div class="q-item__label text-white text-h6 text-weight-bolder">
                                                        Lend Book</div>
                                                    <div class="q-item__label">{{lendBook.length}}</div>
                                                </div>
                                                <!---->
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12  ">
                                            <div class="q-item q-item-type row no-wrap q-pa-xs bg-teal-10"
                                                style="height:150px">
                                                <div
                                                    class="bg-teal-5 q-item__section column q-item__section--side justify-center q-pa-lg q-mr-none text-white">
                                                    <i class="notranslate material-icons q-icon text-white"
                                                        aria-hidden="true" role="presentation"
                                                        style="font-size: 24px;">bar_chart</i>
                                                </div>
                                                <div
                                                    class="q-item__section column q-item__section--main justify-center q-pa-md q-ml-none  text-white">
                                                    <div class="q-item__label text-white text-h6 text-weight-bolder">
                                                        Return Book</div>
                                                    <div class="q-item__label">{{returnBook.length}}</div>
                                                </div>
                                                <!---->
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 ">
                                            <div class="q-item q-item-type row no-wrap q-pa-xs"
                                                style="background-color: rgb(162, 112, 177); height: 150px">
                                                <div class="q-item__section column q-item__section--side justify-center q-pa-lg q-mr-none text-white"
                                                    style="background-color: rgb(159, 82, 177);"><i
                                                        class="notranslate material-icons q-icon text-white"
                                                        aria-hidden="true" role="presentation"
                                                        style="font-size: 24px;">bar_chart</i></div>
                                                        <div
                                                    class="q-item__section column q-item__section--main justify-center q-pa-md q-ml-none  text-white">
                                                    <div class="q-item__label text-white text-h6 text-weight-bolder">
                                                        Accessary</div>
                                                    <div class="q-item__label">{{accessaryOpt.length}}</div>
                                                </div>
                                                <!---->
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- left section -->
                            <div class="col-md-3 col-lg-3">
                                <div class="row" style="width: 100%; height: 100%;">

                                    <div class="text-center " style="margin: 0px auto">
                                        <img style="width: 150px;"
                                            src="https://upload.wikimedia.org/wikipedia/commons/9/95/Vue.js_Logo_2.svg" />
                                    </div>



                                    <div class="text-center q-my-lg" style="height: 130px; margin: 0px auto">
                                        <img style="width: 190px; "
                                            src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" />
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">


                            </div>
                            <div class="col-lg-4">

                            </div>
                        </div>

                    </q-card>
                    <div class="text-center">
                        <p>Copyright and reserved by 2022-2025</p>
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
                    



                </q-page>
            </q-page-container>


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
                leftDrawerOpen: true,
                staff: [],
                student: [],
                book: [],
                lendBook: [],
                returnBook: [],
                accessaryOpt: [],
                Userdialog: false,
                maximizedToggle: false

            };
        },
        created() {},
        methods: {
            userClick(){
                this.Userdialog = true
            },
            toggleLeftDrawer() {
                this.leftDrawerOpen = !this.leftDrawerOpen
            },

            homeClient() {
                window.location.href = "homeClient.php"
            },
            toHistory() {
                window.location.href = "history.php";
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