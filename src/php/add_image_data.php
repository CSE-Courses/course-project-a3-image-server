<?php

$id =  $_REQUEST['id'];
?>

<!doctype html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- local bootstrap css-->
    <link rel="stylesheet" href="../styles/bootstrap.min.css">

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="../styles/customstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <title>Home - Image Server</title>
</head>

<!-- The classes help format the sticky footer -->
<body class="d-flex flex-column h-100">

<script src="../js/customfunctions.js"> </script>

<script src="../js/sessionVar.php"> </script>

<div id="navbar"></div>

<!-- The classes help format the sticky footer -->
<main role="main" class="flex-shrink-0">
    <div id="content" class="container">

        <!-- Most of the body is here. It's just a row with an 8/12 column -->
        <div class="row justify-content-center w-100 my-5">
            <div class="col-8">
                <!-- Need to make this section taller -->
                <div class="card text-center w-100 border-0 rounded-0" style="background-color: #9A9A9A;">
                    <div class="card-body">
                        <p class="card-text">
                            Add Image Information
                        </p>

                        <form method="POST" action="do_upload_imagedata.php">
                            <input type="hidden" value="<?=$id?>" name="id">
                            <div class="form-group">
                                <input type="text" name="location" placeholder="Location eg. New York" class="form-control"/>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="date" class="form-control" name="date">
                                </div>
                                <div class="col">
                                    <input type="time" class="form-control" name="time">
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
                            </div>
                        </form>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center w-100 my-5">
            <div id="imageDescription" class="col-8"></div>
        </div>
    </div>


</main>

<!-- The footer -->
<footer id="footer" class="footer mt-auto py-3"></footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script>
    ImgServerView.insertNavbar();
    ImgServerView.insertFooter();
    ImgServerController.setupMenuEvents();
</script>

</body>
</html>
