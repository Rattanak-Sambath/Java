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
                <q-list @click="homeClient()">
                    <q-item to="/home" active-class="q-item-no-link-highlighting">
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
                        <div>
                            <q-card-section class="text-h5 text-bold">
                                Buying History
                            </q-card-section>
                        </div>
                        <q-separator></q-separator>
                        <q-card-section>
                                <q-table flat :columns="columns" :filter="filter" :data="data">
                                    <!-- index -->
                                    <template slot="body-cell-index" slot-scope="props" :props="props.row">
                                        <q-td>
                                            {{ props.pageIndex + 1 }}
                                        </q-td>
                                    </template>
                                    <template slot="body-cell-status" slot-scope="props" :props="props.row" >
                                        <q-td>
                                        <q-badge outline   :class="props.row.status == 'approve' ? 'bg-primary' : 'bg-orange' " >{{props.row.status}}</q-badge>
                                        </q-td>
                                    </template>
                                    
                                    <!-- action -->
                                    
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


                        <q-separator></q-separator>                                    
                        

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
                
                Userdialog: false,
                maximizedToggle: false,
                Userdialog: false,
                
                columns: [
                    {
                        name: "index",
                        label: "No",
                        align: "left",
                    },
                    {
                        name: "name",
                        label: "Name",
                        align: "left",
                        field: (row) => row.name,
                    },
                    {
                        name: "total",
                        label: "Total",
                        align: "left",
                        field: (row) => row.total,
                    },
                    
                    {
                        name: "phone",
                        label: "Phone",
                        align: "left",
                        field: (row) => row.phone,
                    },
                  
                    {
                        name: "status",
                        label: "Status",
                        align: "left",
                    },
                    
                
                    
                ],
                genderOpt: ["Male", "Female"],
                data: [],
                leftDrawerOpen: true,
                showId: '',
                form: {
                    name: "",
                    phone: "",
                    address: "",
                    gender: ""
                },
                filter: ''

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

            toDashboard() {
                window.location.href = "client/home.php"
            },
            toHistory() {
                window.location.href = "history.php";
            },
            homeClient() {
                window.location.href = "homeClient.php"
            },
            toAbout() {
                window.location.href = "about.php";
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
            
            getAllData() {
                axios
                    .post("action/ClientAction.php", {
                        action: "getAllApprove",
                    })
                    .then((res) => {
                        this.data = res.data;
                        console.log(res.data)

                    });
            },
            
           
        },
        mounted() {
           this.getAllData();
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