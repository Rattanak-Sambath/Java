<?php
        include "connection/db.php";
        if(isset($_POST['update'])) {
            $id = $_GET['id'];
            $title = $_POST['title'];
            $staff = $_POST['staff'];
            $qty = $_POST['qty'];
            $date = $_POST['date'];           
            $type = $_POST['type'];
            $image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
           
            
            $insert = "update tbl_book set title='$title',staff='$staff', qty='$qty', date='$date', type='$type', image='$image' where id=$id";
            $run_insert = mysqli_query($conn, $insert);
            if($run_insert === true) {
                echo "Data has been installed"; 
                move_uploaded_file($tmp_name, "upload/$image");
                header('Location: book.php');
            } else {
                echo "Error";
            }

        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $insert = " select * from tbl_book where id = $id";
            $run_insert = mysqli_query($conn, $insert);
            while($row = $run_insert->fetch_array()) {
                $title = $row['title'];
                $staff = $row['staff'];

                $qty = $row['qty'];
                $type = $row['type'];
                $date = $row['date'];
                $image = $row['image'];
               
            } 
            
        }
        $fetchStaff = "select * from tbl_staff";
        $result =mysqli_query($conn,$fetchStaff);


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</head>

<body>
    <!-- Add the following at the end of your body tag -->
    <div id="q-app">
        <q-layout view="lHh Lpr lFf" class="bg-white">
            <q-header class="bg-indigo-10" elevated>

            </q-header>


            <q-page-container>
                <q-page class="q-pa-md">
                    <q-card flat bordered class="my-card text-center">


                        <div class="d-flex justify-between">

                            <!-- btn search -->
                            <q-card-section class="text-h5">
                                Update Book
                            </q-card-section>

                            <div class="q-pa-sm">
                                <q-btn label="Back" color="negative" @click="goBack()" />
                            </div>

                        </div>
                        <div>
                            <q-separator />
                        </div>
                        <!--  -->
                        <div class="container p-4">
                            <form method="post" action="#" enctype="multipart/form-data">

                                <q-card class="row my-4 ">

                                    <form style="width: 50%; margin: auto; margin-top: 30px;" action="" method="post"
                                        enctype="multipart/form-data">
                                        <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                            <div class="col-xs-12 col-sm-6 col-md-6">

                                                <input type="text" placeholder="Title" class="form-control"
                                                    id="exampleInputEmail1" name="title" value="<?= $title ?>" required>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">

                                                <select type="text" class="form-control" id="exampleInputPassword1"
                                                    name="staff" required value="<?= $staff ?>">
                                                    <?php  while($row = $result->fetch_array()){
                                                    echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
                                                      } ?>
                                                </select>

                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-md-6">

                                                <input type="text " placeholder="Qty" class="form-control" name="qty"
                                                    required value="<?= $qty ?>">
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">

                                                <input type="date" class="form-control" id="exampleInputPassword1"
                                                    name="date" required value="<?= $date ?>">
                                            </div>

                                        </div>
                                        <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <input placeholder="Type" name="type" value="<?= $type ?>"
                                                    class="form-control"></input>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">

                                                <input type="file" class="form-control" id="exampleInputPassword1"
                                                    name="image" value="<?= $image ?>">
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6"></div>
                                        </div>


                                        <br>
                                        <button type="submit" name="update" class="btn btn-primary">Upadte</button>
                                    </form>
                                </q-card>


                            </form>
                        </div>


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

                genderOpt: ["Male", "Female"],
                data: [],
                leftDrawerOpen: true,

                title: "",
                qty: "",
                date: dayjs(new Date()).format("YYYY-MM-DD"),
                type: "",
                image: '',

                typeOpt: ["Science", "Biology", "Scienfiction"],

            };
        },
        created() {},
        methods: {
            getDataById() {

                //
                axios
                    .post("action/book_action.php", {
                        action: "getDataById",
                        id: id,
                    })
                    .then((res) => {

                        if (res.data == "no data") {
                            this.$q.notify({
                                message: "This ID not found !",
                                type: "warning",
                                position: "top-right",
                            });
                            setTimeout(() => {
                                window.location.href = "home.php";
                            }, 2000);
                        } else {

                            this.data = res.data
                            console.log(res.data);

                        }
                    });
            },
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
            // uploadFile() {
            //     this.file = this.$refs.file.files[0];
            //     let formData = new FormData();
            //     formData.append('file', this.file);
            //     formData.append('title', this.title);
            //     this.$refs.file.value = '';
            //     axios.post('action/upload.php', formData, {
            //             headers: {
            //                 'Content-Type': 'multipart/form-data'
            //             }
            //         })
            //         .then(function(response) {
            //             if (!response.data) {
            //                 alert('File not uploaded.');
            //             } else {
            //                 alert('File uploaded successfully.');
            //             }
            //         })
            //         .catch(function(error) {
            //             console.log(error);
            //         });
            // },

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
        },
        mounted() {
            // this.getDataById()
        },
    });
    </script>
</body>

</html>