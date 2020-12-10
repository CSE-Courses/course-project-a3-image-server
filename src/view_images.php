<?php
session_start();
?>

<!doctype html>
<html class="h-100" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- local bootstrap css-->
        <link rel="stylesheet" href="./styles/bootstrap.min.css">

        <!-- custom stylesheet -->
        <link rel="stylesheet" href="./styles/customstyle.css">

        <title>Home - Image Server</title>
    </head>

    <!-- The classes help format the sticky footer -->
    <body class="d-flex flex-column h-100">

        <script src="./js/customfunctions.js"> </script>

        <?php include './php/header.php' ?>

        <!-- The classes help format the sticky footer -->
        <main role="main" class="flex-shrink-0">
            <div id="content" class="container">

                <!-- Most of the body is here. It's just a row with an 8/12 column -->
                <div class="row justify-content-center w-100 my-5">
                    <div class="container" style="border-radius: 10px">
                        <?php

                        if(isset($_SESSION['success'])){
                            ?>
                            <div class="alert alert-success"><?=$_SESSION['success']?></div>
                        <?php
                            unset($_SESSION['success']);
                        }
                        else if(isset($_SESSION['error'])){
                           ?>
                            <div class="alert alert-success"><?=$_SESSION['error']?></div>
                        <?php
                            unset($_SESSION['error']);
                        }
                        ?>
                        <!-- Need to make this section taller -->
                        <div class="card text-center w-100 border-0 rounded-0" style="border-radius: 10px">
                            <div class="card-body">
                                <p class="card-text">
                                    User Uploaded Images
                                </p>

                                <table border="1" style="width: 100%">
                                   <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>Image Title</th>
                                       <th>Image Size</th>
                                       <th> Image </th>
                                       <th colspan="2"> Action </th>
                                   </tr>
                                   </thead>
                                    <tbody>
                                    <?php
                                    $user_email = ($_SESSION['email']);

                                    $query = "SELECT * FROM imagestore where email = '$user_email'";
                                    include 'php/connect_db.php';
                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                    $flag = FALSE;


                                    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH) ) {
                                        ?>
                                        <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['imagename'] ?></td>
                                        <td><?= $row['lengthofimage'] ?></td>
                                        <td>


                        <img style="width: 250px;" src="./tmp_store/<?=$user_email."/".array_reverse(explode('/',$row['tmp_name']))[0];?>"/>
                                        </td>
                                            <td>
                                                <a href="./add_image_data.php?id=<?=$row['id']?>" style="color: black;">Add Meta</a>
                                            </td>
                                            <td>
                                                <a href="./view_weather.php?id=<?=$row['id']?>">View Weather</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>

                                </table>
                                </p>
                            </div>
                        </div>
                    </div>
                    <form action="./php/downloadCsv" method="post"> 
                        <input type ="submit" name="export" value="Download MetaData"> 
                     </form>
                </div>
                <div class="row justify-content-center w-100 my-5">
                    <div id="imageDescription" class="col-8"></div>
                </div>
            </div>


        </main>

        <?php include './php/footer.php' ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <script>
            var status = '<?php echo isset($_SESSION['email'] ) ? 'authenticated':'not_authenticated' ?>';


            //ImgServerView.insertNavbar(status);
            //if(status === 'not_authenticated'){
            //    document.getElementById("sessionName").innerHTML='<p>Status : Disconnected</p>'
            //}
            //ImgServerView.insertFooter(status);

            ImgServerController.setupMenuEvents();
        </script>
    </body>
</html>

