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
                <q-list @click="homeClient" >
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
                            <q-breadcrumbs-el label="to cart" icon="shopping_cart_checkout" class="q-ma-xs" />

                        </q-breadcrumbs>
                        <div class="row justify-between col-lg-6">
                          
                        </div>


                        <q-separator></q-separator>

                        <!--  -->
                        <div class="row" >
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <q-card-section class="text-h5 text-bold row justify-between items-center">
                                                Shopping Cart
                                                <div>
                                                                
                                                    <q-card-section class="text-h5 text-bold">
                                                        {{ addtocarts.length }} Items
                                                    </q-card-section>
                                                </div>
                                            </q-card-section>
                                            <hr>
                                <q-table flat :columns="columns" :filter="filter" :data="addtocarts">
                                    <!-- index -->
                                    <template slot="body-cell-index" slot-scope="props" :props="props.row">
                                        <q-td>
                                            {{ props.pageIndex + 1 }}
                                        </q-td>
                                    </template>
                                    <template slot="body-cell-total" slot-scope="props" :props="props.row">
                                        <q-td>
                                            {{props.row.qty * props.row.price}}
                                        </q-td>
                                    </template>
                                    <!-- action -->

                                    <template slot="body-cell-image" slot-scope="props" :props="props.row">
                                        <q-td align="center" class="vertical-align-middle">

                                            <div v-show="!props.row.id">
                                                <img style="width:50px ; height: 50px" alt="">
                                            </div>
                                            <div v-show="props.row.id">
                                                <img :src="'upload/' + props.row.image"
                                                    style="width:50px ; height: 50px" alt="">
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
                                    <template slot="body-cell-action" slot-scope="props" :props="props.row">                                    
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
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 q-mx-auto" >
                                         
                                                   <q-card-section class="text-h5 text-bold">
                                                        Order Summary
                                                    </q-card-section>
                                                    <hr>
                                         <q-card class="q-pa-md q-my-lg">
                                                <div class="col-xs-12 col-sm-6 col-md-6 q-my-md">
                                                    <q-input dense hint="Price" ref="delivery" v-model="delivery"
                                                    label="Delivery" outlined  />
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 q-my-md">
                                                    <q-input dense hint="PromotCode" v-model="delivery"
                                                    label="Promote" outlined />
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 q-my-md">
                                                <q-select dense hint="Payment" ref="payment" :options="paymentOpt"
                                                    v-model="payment" label="Payment" outlined
                                                    :rules="[val => !!val || 'Payment is required']" />
                                                    
                                                </div>
                                                <div class="row justify-between items-center q-pa-sm">
                                                    <div>
                                                           Total Cost
                                                    </div>
                                                    <div>
                                                          {{totalAmount  }} $
                                                    </div>
                                                </div>

                                                <div class="text-right ">
                                                      <q-btn icon="add"  full-width color="primary" label="Submit"  @click="submitCart" />
                                                </div>
                                         </q-card>
                                        
                                </div>

                        </div>  
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
                filter: "",
                data:[],
                expanded: false,
                books: [],
                addtocarts:[],
                delivery:'',
                promotecode:'',
                payment:'',
                paymentOpt:[
                    'ABA',
                    'ACLEDA',
                    'Other'
                ],
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
                        align: "center",
                        field: (row) => row.qty,
                    },
                    {
                        name: "price",
                        label: "Price",
                        align: "center",
                        field: (row) => row.price,
                    },
                    {
                        name: "total",
                        label: "Total",
                        align: "center",
                        
                    },
                    {
                        name: "image",
                        label: "Image",
                        align: "center",
                        field: (row) => row.image,
                    },
                    
                   
                    {
                        name: "action",
                        label: "Action",
                        align: "center",

                    },

                ],


            };
        },
        created() {},
        computed :{

            totalAmount(){
                let total = 0;
                this.data.forEach((item)=>{
                    total += item.price * item.qty;
                    
                })
                return total;
               
            },
         },
        methods: {
            submitCart(){
                axios.post("action/ClientAction.php", {
                            action: "addtoclient",
                            addtocarts: this.addtocarts,
                            payment : this.payment,
                            user_name : "Dara",
                            status: "pending", 

                        })
                        .then((res) => {
                            console.log(res);
                            if (res.data.status == "insert")  {
                                this.$q.notify({
                                    message: "Insert Successfully !!!",
                                    type: "positive",
                                    position: "top-right",
                                });
                                setTimeout(() => {
                                    window.location.href = "homeClient.php";
                                }, 100);
                                
                            }
                        });
            },
            toCart(){
                window.location.href = "cart.php";
            },
                 
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
            
            toProfile() {
                window.location.href = "profile.php";
            },
            getCart() {
                axios
                    .post("action/addtocart.php", {
                        action: "getAllcart",
                    })
                    .then((res) => {
                        this.data = res.data;
                        console.log(res.data)


                    });
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
            // findBook() {
            //     axios
            //         .post("action/addtocart.php", {
            //             action: "getAllBook",
            //         })
            //         .then((res) => {
            //             this.books = res.data;
            //             console.log('book',res);       
            //         });
            // },
            onDelete(id) {
                axios.post("action/addtocart.php", {
                    action: "deleteBook",
                    id: id

                }).then((res) => {
                    if (res.data.status == "delete") {
                        this.$q.notify({
                            message: "Delete Book successfully",
                            type: "positive",
                            position: "top-right",

                        });
                        //
                        setTimeout(() => {
                            window.location.href = "cart.php";
                        }, 100);
                    } else {
                        this.$q.notify({
                            message: "Delete unsuccessful",
                            type: "negative",
                            position: "top-right",

                        });
                    }

                })
            },
           
           
        },
        
        mounted() {         
            this.findAddtocart();
            this.findBook();
            this.getCart();
            
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