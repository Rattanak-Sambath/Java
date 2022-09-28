<?php
        include "connection/db.php";
      
        if(isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
           
            $image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            
            $insert = "INSERT INTO tbl_user(email,password, role, image)
                       VALUES ('$email','$password', '$role','$image')";
            $run_insert = mysqli_query($conn, $insert);
            if($run_insert === true) {
                echo "Data has been installed"; 
                move_uploaded_file($tmp_name, "upload/$image");
                header('Location: login.php');
            } else {
                echo "Error";
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


                        <div class="d-flex container justify-between">

                            <!-- btn search -->
                            <q-card-section class="text-h5">
                                Register
                            </q-card-section>

                            <div class="q-pa-sm">
                                <q-btn label="Back" color="negative" @click="goBack" />
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

                                                <input type="text" placeholder="Email" ref="email" class="form-control"
                                                    id="exampleInputEmail1" name="email" required>
                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-md-6">

                                                <input type="text " ref="password" placeholder="Password"
                                                    class="form-control" name="password" required>
                                            </div>


                                        </div>

                                        <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <select placeholder="Type" ref="role" name="role" class="form-control">
                                                    <option value="admin">Admin</option>
                                                    <option value="guest">Guest</option>

                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">

                                                <input type="file" ref="image" class="form-control"
                                                    id="exampleInputPassword1" name="image">
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6"></div>
                                        </div>


                                        <br>
                                        <button type="submit" name="submit" class="btn btn-primary">Create</button>
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
                form: {
                    email: "",
                    password: '',
                    role: "",
                    image: '',
                },


            };
        },
        created() {},
        methods: {
         
            toggleLeftDrawer() {
                this.leftDrawerOpen = !this.leftDrawerOpen
            },
           
            onSubmit() {
                this.$refs.email.validate();
                this.$refs.password.validate();
                this.$refs.role.validate();
                this.$refs.image.validate();

                if (this.$refs.email.hasError || this.$refs.password.hasError || this.$refs.role.hasError ||
                    this
                    .$refs.image.hasError) {
                    // check when value null
                } else {
                    let data = new FormData();
                    data.append('email', this.form.email);
                    data.append('password', this.form.password);
                    data.append('role', this.form.role);

                    data.append('image', this.form.image);
                    axios
                        .post("action/book_action.php", data, {

                            header: {

                            }
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
             history.go(-1)
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