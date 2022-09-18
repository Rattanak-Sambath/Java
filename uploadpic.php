<?php
include 'session/check_if_no_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="mb-3 card">
        <div class="card-body">
            <h2 class="card-title text-center">
                Create User Page
            </h2>
            <form style="width: 50%; margin: auto; margin-top: 30px;" action="" method="post"
                enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title : </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Qty : </label>
                    <input type="text" class="form-control" name="qty" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Date </label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="date" required>
                </div>
                <div class="mb-3">

                    <label for="exampleInputPassword1" class="form-label">Type : </label>
                    <input name="type" class="form-control"></input>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Image : </label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="image">
                </div>

                <br>
                <button type="submit" name="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

    <?php
        include "connection/db.php";
        if(isset($_POST['submit'])) {
            $title = $_POST['title'];
            $qty = $_POST['qty'];
            $date = $_POST['date'];           
            $type = $_POST['type'];
            $image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            
            $insert = "INSERT INTO tbl_book(title, qty, date, type, image)
                       VALUES ('$title', '$qty', '$date', '$type', '$image')";
            $run_insert = mysqli_query($conn, $insert);
            if($run_insert === true) {
                echo "Data has been installed"; 
                move_uploaded_file($tmp_name, "upload/$image");
                header('Location: book.php');
            } else {
                echo "Error";
            }

        }
    ?>
</body>

</html>