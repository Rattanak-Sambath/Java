<?php
        
        include "connection/db.php";
        // if(isset($_POST['book'])){
        //     $id = $_GET['book'];
        //     $sql = "SELECT * FROM tbl_book WHERE title = $id";
        //     $res = mysqli_query($conn, $sql);
        //     if($res === true) {
        //         var_dump($res);
        //     } else {
               
        //     }
            
        // }
        
        if(isset($_POST['submit'])) {
            $student = $_POST['student'];
            $book = $_POST['book'];
            $date = $_POST['date'];           
            $qty = $_POST['qty'];
            $image =$findImage;
            $tmp_name = $_FILES['image']['tmp_name'];
            
            $insert = "INSERT INTO tbl_lendbook(student,title, qty, date, image)
                       VALUES ('$student','$book', '$qty', '$date', '$image')";
            $run_insert = mysqli_query($conn, $insert);
            if($run_insert === true) {
              
                move_uploaded_file($tmp_name, "upload/$image");
                header('Location:lendBook.php');
            } else {
                echo "Error";
            }

        }
     
            $student = "select * from tbl_student";
            $fetchstudent = mysqli_query($conn, $student);
        
        
            $book = "select * from tbl_book";
            $fetchbook = mysqli_query($conn, $book);

            
             if(!empty($_POST['student'])) {
                    $selected = $_POST['student'];
                    var_dump($selected);
                    echo 'Please select the value.' + $selected;
                
                    
                } 
                    
           
            
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
                                New LendBook
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
                                            <div class="col-xs-12 col-sm-6 col-md-6 text-left">
                                                <label class="form-label">Student *</label>
                                                <select class="form-select" name="student">
                                                    <option>Student</option>
                                                    <?php
                                                        foreach ($fetchstudent as $row){
                                                            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>'; 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6 text-left">
                                                <label class="form-label">Qty *</label>
                                                <input type="text " placeholder="Qty" class="form-control" name="qty"
                                                    required>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6 text-left">
                                                <label class="form-label">BookTitle *</label>
                                                <select class="form-select" name="book">
                                                    <option>BookTitle</option>
                                                    <?php
                                                        foreach ($fetchbook as $row){
                                                            echo '<option value="'.$row['title'].'">'.$row['title'].'</option>'; 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6 text-left">
                                                <label class="form-label">Date *</label>
                                                <input type="date" class="form-control" id="exampleInputPassword1"
                                                    name="date" required>
                                            </div>


                                        </div>
                                        <div class="q-pa-sm row q-col-gutter-x-md q-col-gutter-y-md">



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
                //   columns: [{
                //       name: "index",
                //       label: "No",
                //       align: "left",
                //     },
                //     {
                //       name: "name",
                //       label: "Khmer",
                //       align: "left",
                //       field: (row) => row.name,
                //     },
                //     {
                //       name: "latin",
                //       label: "English",
                //       align: "left",
                //       field: (row) => row.latin,
                //     },
                //     {
                //       name: "gender",
                //       label: "Gender",
                //       align: "left",
                //       field: (row) => row.gender,
                //     },
                //     {
                //       name: "phone",
                //       label: "Phone",
                //       align: "left",
                //       field: (row) => row.phone,
                //     },
                //     {
                //       name: "homeName",
                //       label: "Home Name",
                //       align: "left",
                //       field: (row) => row.homeName,
                //     },
                //     {
                //       name: "action",
                //       label: "Action",
                //       align: "center",
                //     },type
                //   ],
                genderOpt: ["Male", "Female"],
                data: [],
                leftDrawerOpen: true,
                form: {
                    title: "",
                    qty: "",
                    date: dayjs(new Date()).format("YYYY-MM-DD"),
                    type: "",
                    image: '',
                },
                typeOpt: ["Science", "Biology", "Scienfiction"],

            };
        },
        created() {},
        methods: {
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
            onSubmit() {
                this.$refs.title.validate();
                this.$refs.qty.validate();
                this.$refs.date.validate();
                this.$refs.type.validate();
                if (this.$refs.title.hasError || this.$refs.qty.hasError || this.$refs.date.hasError || this
                    .$refs.type.hasError) {
                    // check when value null
                } else {
                    let data = new FormData();
                    data.append('title', this.form.title);
                    data.append('qty', this.form.qty);
                    data.append('date', this.form.date);
                    data.append('type', this.form.type);
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
    });
    </script>
</body>

</html>