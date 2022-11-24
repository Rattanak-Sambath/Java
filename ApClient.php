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
                    <!-- <q-btn class="" dense round flat icon="contact_mail" @click="userClick">
                        <q-badge color="red" floating transparent>
                            <?php echo  $_SESSION['email'] ?>
                        </q-badge>
                    </q-btn> -->
                    <div class="q-ma-md">
                        <?php echo $_SESSION['role'] ?>
                    </div> 

                    <!-- right side -->
                    <q-avatar >
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
                            <q-item to="/Maintenance" active-class="q-item-no-link-highlighting bg-gray">
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
                                Client List
                            </q-card-section>

                            
                        </div>
                        <q-breadcrumbs class="q-ma-xs" separator="---" class="text-orange" active-color="secondary">
                            <q-breadcrumbs-el label="Home" icon="home" class="q-ma-md" />
                            /
                            <q-breadcrumbs-el label="Client" icon="badge" class="q-ma-xs" />



                        </q-breadcrumbs>

                        <div>
                            <q-separator />
                        </div>
                        <!--  -->
                        <div>
                            <q-card rounded>
                                <q-table flat :columns="dialogcolumns"  :filter="filter" :data="data">
                                    <!-- index -->
                                    <template slot="body-cell-index" slot-scope="props" :props="props.row">
                                        <q-td>
                                            {{ props.pageIndex + 1 }}
                                        </q-td>
                                    </template>
                                    <template slot="body-cell-status" slot-scope="props" :props="props.row">
                                        <q-td>
                                        <q-badge outline class="bg-orange" >{{props.row.status}}</q-badge>
                                        </q-td>
                                    </template>
                                    
                                    <!-- action -->
                                    <template slot="body-cell-action" slot-scope="props" :props="props.row.foreignkey">
                                         <q-td align="center" >                                
                                            <q-btn dense color="primary" icon="done"  @click="approve(props.row)" />                                         
                                        </q-td>
                                        <q-td align="center" >                                
                                            <q-btn dense color="red" icon="cancel"  @click="decline(props.row)" />                                         
                                        </q-td>
                                        <q-td align="center" >                                
                                            <q-btn dense color="primary" icon="visibility"  @click="detail(props.row)" />                                         
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

                            </q-card>
                        </div>
                    </q-card>


                 
                </q-page>
            </q-page-container>
            <q-dialog
                    v-model="dialog"
                    >
                    <q-card style="width: 800px; max-width: 80vw;">
                     <q-table flat :columns="columns" :filter="dialogfilter" title="Client list details"    :data="dialogData">
                                    <!-- index -->
                                    <template slot="body-cell-index" slot-scope="props" :props="props.row">
                                        <q-td>
                                            {{ props.pageIndex + 1 }}
                                        </q-td>
                                    </template>
                                    <template slot="body-cell-status" slot-scope="props" :props="props.row">
                                        <q-td>
                                        <q-badge outline class="bg-orange" >{{props.row.status}}</q-badge>
                                        </q-td>
                                    </template>
                                    
                                    <!-- action -->
                                    <template slot="body-cell-action" slot-scope="props" :props="props.row.foreignkey">
                                         <q-td align="center" >                                
                                            <q-btn dense color="primary" icon="done"  @click="approve(props.row)" />                                         
                                        </q-td>
                                        <q-td align="center" >                                
                                            <q-btn dense color="red" icon="cancel"  @click="decline(props.row)" />                                         
                                        </q-td>
                                        <!-- <q-td align="center" >                                
                                            <q-btn dense color="primary" icon="visibility"  @click="detail(props.row)" />                                         
                                        </q-td> -->
                                    </template>
                                    <!-- <template v-slot:top-left class=""  >
                                         <p class="text-bold" style="font-size: 25px;">Client list Details</p>

                                    </template> -->
                                    <template v-slot:top-right >
                                      
                                        <q-input round dense debounce="300" v-model="dialogfilter" placeholder="Search">
                                            <template v-slot:append>
                                                <q-icon name="search" />
                                            </template>
                                        </q-input>
                                       
                                      
                                    </template>

                                </q-table>
                    </q-card>
                    </q-dialog>
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
                
                maximizedToggle: false,
                       
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
                        name: "title",
                        label: "Title",
                        align: "left",
                        field: (row) => row.title,
                    },
                    {
                        name: "qty",
                        label: "Qty",
                        align: "left",
                        field: (row) => row.qty,
                    },
                    {
                        name: "total",
                        label: "Total",
                        align: "left",
                        field: (row) => row.total + ' $',
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
                    
                    {
                        name: "action",
                        label: "Action",
                        align: "center",
                    },
                    
                ],
                dialogcolumns: [
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
                        field: (row) => row.total + ' $',
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
                    
                    {
                        name: "action",
                        label: "Action",
                        align: "center",
                    },
                    
                ],
                genderOpt: ["Male", "Female"],
                data: [],
                dialogData: [],
                leftDrawerOpen: true,
                showId: '',
                dialog: false,
                form: {
                    name: "",
                    phone: "",
                    address: "",
                    gender: ""
                },
                filter: '',
                dialogfilter: ''
            };
        },
        created() {},
        methods: {
           
            popupDialog(){
                this.popup = true;
            },  
            toClient() {
                window.location.href = "ApClient.php"
            },
           
            close() {
                this.dialog = false
                this.form = "";

            },
            toggleLeftDrawer() {
                this.leftDrawerOpen = !this.leftDrawerOpen
            },
           
            toAccessary(){
                window.location.href = "Accessary.php";
            },
            goAddStudent() {
                window.location.href = "studentForm.php";
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
            onDelete(id) {
                axios.post("action/student_action.php", {
                    action: "deleteStudent",
                    id: id

                }).then((res) => {
                    if (res.data.status == "delete") {
                        this.$q.notify({
                            message: "Delete successfully",
                            type: "positive",
                            position: "top-right",

                        });
                        //
                        setTimeout(() => {
                            window.location.href = "student.php";
                        }, 2000);
                    } else {
                        this.$q.notify({
                            message: "Delete unsuccessful",
                            type: "negative",
                            position: "top-right",

                        });
                    }

                })
            },
            decline(item){
                axios
                    .post("action/ClientAction.php", {
                        action: "declinetoclient",                       
                        id: item.foreignkey,
                        status: "decline",
                    })
                    .then((res) => {
                        if (res.data.status == "decline") {
                            this.$q.notify({
                                message: "This Record have been decline !!!!",
                                type: "positive",
                                position: "top-right",
                            });
                            setTimeout(() => {
                                window.location.href = "ApClient.php";
                            }, 1500);
                        } else {
                            this.$q.notify({
                                message: "This Record not found !",
                                type: "warning",
                                position: "top-right",
                            });
                            setTimeout(() => {
                                window.location.href = "ApClient.php";
                            }, 1500);
                           
                        
                        }
                    });
            },
            approve(item) {
                
                axios
                    .post("action/ClientAction.php", {
                        action: "approvetoclient",                       
                        id: item.foreignkey,
                        status: "approve",
                    })
                    .then((res) => {
                        if (res.data.status == "update") {
                            this.$q.notify({
                                message: "This Record have been updated !!!!",
                                type: "positive",
                                position: "top-right",
                            });
                            setTimeout(() => {
                                window.location.href = "ApClient.php";
                            }, 1500);
                        } else {
                            this.$q.notify({
                                message: "This Record not found !",
                                type: "warning",
                                position: "top-right",
                            });
                            setTimeout(() => {
                                window.location.href = "ApClient.php";
                            }, 1500);
                           
                        
                        }
                    });
            },
            detail(item) {
             
                axios
                    .post("action/ClientAction.php", {
                        action: "getdetailbyid",                       
                        id: item.foreignkey,                      
                    })
                    .then((res) => {
                      
                        if (res) {
                            console.log('detail', res.data);
                            this.dialog = true;
                            this.dialogData =res.data;
                        } else {
                            this.$q.notify({
                                message: "This Record not found !",
                                type: "warning",
                                position: "top-right",
                            });
                            // setTimeout(() => {
                            //     window.location.href = "ApClient.php";
                            // }, 1500);
                           
                        
                        }
                    });
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
            getAllData() {
                axios
                    .post("action/ClientAction.php", {
                        action: "getAllClient",
                    })
                    .then((res) => {
                        this.data = res.data;
                        console.log(res.data)

                    });
            },
            convertDate(d) {
                return dayjs(d).format("YYYY-MM-DD");
            },
        },
        mounted() {
            this.getAllData()
            if (props.row.id) {
                this.onEdit();
            }
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
