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
                    <q-btn class="q-ma-md" @click="registerClick()" >Register</q-btn>
                    <q-btn dense @click="toCart" icon="shopping_cart_checkout" style="font-size: 20px;">
                    {{addtocarts.length}}
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

                    <q-card flat bordered class="my-card">
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
                        <div class="row" >
                            <div v-for="(book, index) in books" :key="index" class="justify-around q-mx-auto col-lg-3 col-md-4 col-sm-6 col-xs-12">

                           
                            <q-card class="my-card q-ma-md  "    >
                                    <q-card-section class="col-5 flex flex-center ">
                                        <q-img
                                                style="height:200px"
                                                class="rounded-borders "
                                                :src="'upload/' + book.image"
                                         />
                                    </q-card-section>
                                <div>                                 
                                    <q-card-section class="">
                                  
                                    <div class="text-h5  q-mb-xs">{{book.title}}</div>
                                    <div class="text-overline "> Type :{{ book.type }}</div>
                                    <div class="text-overline">In stock :{{ book.qty }}</div>
                                    <div class="text-overline">Price :{{ book.price }}$</div>

                                    <div class="text-caption text-grey">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                    </q-card-section>                                 
                                </div>
                                <q-card-actions class="justify-between items-center">
                                   
                                    
                                    <q-btn flat color="primary" @click="addtocart(book) ">
                                            Add to Cart         
                                    </q-btn>
                                    <q-btn flat >
                                            View More 
                                    </q-btn>
                                </q-card-actions>


                               
                            </q-card>
                            </div>
                                        
                                
                        </div>  
                    </q-card>
                    
                    <q-dialog v-model="dialog" persistent :maximized="maximizedToggle" transition-show="slide-up"
                            transition-hide="slide-down">
                            <q-card flat bordered class="my-card" style="width: 800px">

                                <div class="row justify-between">

                                    <!-- btn search -->
                                    <q-card-section class="text-h5">
                                        Register
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
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <q-input dense hint="Email" ref="email" v-model="email"
                                                    label="Email" outlined
                                                    :rules="[val => !!val || 'Email is required']" />
                                            </div>

                                            <!-- latin -->
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <q-input dense hint="Phone Number" ref="phone" v-model="phone"
                                                    label="Phone" outlined
                                                    :rules="[val => !!val || 'Phone is required']" />
                                            </div>

                                        </div>
                                        <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                            <!-- name -->
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <q-input dense hint="Password" ref="password" v-model="password"
                                                    label="Password" outlined
                                                    :rules="[val => !!val || 'Password is required']" />
                                            </div>

                                            <!-- latin -->                                        

                                        </div>
                                        <!-- description -->
                                        <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <q-input dense hint="Address" ref="address" v-model="address"
                                                    label="Address" outlined
                                                    :rules="[val => !!val || 'Address is required']" />
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <q-select dense hint="Gender" ref="gender" :options="genderOpt"
                                                    v-model="gender" label="Gender" outlined
                                                    :rules="[val => !!val || 'GEnder is required']" />
                                            </div>

                                        </div>
                                    </q-card-section>
                                </div>

                                <q-card-section align="right">

                                    <div class="q-pa-sm">
                                        <q-btn icon="add" label="Submit" color="indigo-10" push @click="submitRigister()" />
                                    </div>
                                </q-card-section>



                                <!-- end table -->
                            </q-card>
                        </q-dialog>


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
                <div class="text-center">
                        <p>Copyright and reserved by 2022-2025</p>
                    </div>
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
                stars: '',
                expanded: false,
                books: [],
                addtocarts:[],
                dialog: false,
                email: '',
                phone: '',
                date : dayjs(new Date()).format('YYYY-MM-DD'),
                password: '',
                gender: '',
                address: '',
                genderOpt : [
                    'Female',
                    'Male'
                ]


            };
        },
        created() {},
        methods: {
            toCart(){
                window.location.href = "cart.php";
            },
            submitRigister(){
                     axios
                        .post("action/clientRegister.php", {
                            action: "add",
                            email: this.email,
                            phone: this.phone,   
                            password: this.password,
                            gender : this.gender,
                            address: this.address,    
                            date: this.date                                                                  
                        })
                        .then((res) => {
                            if (res.data.status == "dublicate")  {
                                this.$q.notify({
                                    message: "This user is token  !!!",
                                    type: "negative",
                                    position: "top-right",
                                   
                                });
                                    // setTimeout(() => {
                                    //     window.location.href = "homeClient.php";
                                    // }, 300);
                                
                                
                            }
                            else {
                                this.$q.notify({
                                    message: "Insert Successfully !!!",
                                    type: "positive",
                                    position: "top-right",
                                });
                                setTimeout(() => {
                                        window.location.href = "homeClient.php";
                             }, 400);

                                    
                                
                            }
                        });
            },
            addtocart(item){
                        
                    axios
                        .post("action/addtocart.php", {
                            action: "addtocart",
                            book_id: item.id,
                            title: item.title,                     
                            qty: 1,                                                
                        })
                        .then((res) => {
                            if (res.data.status == "increase")  {
                                this.$q.notify({
                                    message: "Insert Successfully !!!",
                                    type: "positive",
                                    position: "top-right",
                                });
                                setTimeout(() => {
                                        window.location.href = "homeClient.php";
                                    }, 600);                        
                            }
                            else {
                                this.$q.notify({
                                    message: "Insert new Items  !!!",
                                    type: "positive",
                                    position: "top-right",
                                });
                                    setTimeout(() => {
                                        window.location.href = "homeClient.php";
                                    }, 100);
                                
                            }
                        });
            },  
            userClick(){
                this.Userdialog = true
            },
            close(){
                this.dialog = false
            },
            registerClick(){
                this.dialog = true
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
            findAddtocart() {
                axios
                    .post("action/addtocart.php", {
                        action: "getAllBook",
                    })
                    .then((res) => {
                        this.addtocarts = res.data;
                       
                        console.log(res);
                    });
            },
            
            findBook() {
                axios
                    .post("action/book_action.php", {
                        action: "getAllBook",
                    })
                    .then((res) => {
                        this.books = res.data;
                        console.log(res);   
                    });
            },
           
           
           
        },
        mounted() {         
            this.findAddtocart();
            this.findBook();
            
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