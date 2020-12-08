<?php session_start();?>
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
                <?php
                if(isset($_SESSION['logout'])){
                    ?>
                    <hr/>
                    <div class="alert alert-danger"><?=$_SESSION['logout'];?></div>
                <?php
                    unset($_SESSION['logout']);
                }
                if(isset($_SESSION['login'])){
                    ?>
                    <hr/>
                    <div class="alert alert-success"><?=$_SESSION['login'];?></div>
                    <?php
                    unset($_SESSION['login']);
                }

                ?>
                <!-- Most of the body is here. It's just a row with an 8/12 column -->
                <div class="row justify-content-center w-100 my-5">
                    <div class="col-8">
                        <!-- Need to make this section taller -->
                        <div class="card text-center w-100 border-0 rounded-0" style="background-color: #9A9A9A;">
                            <div class="card-body">

                                <?= isset($_SESSION['email']) ? '
 <p class="card-text">
                                 <div class="dropbox">
                                        <!-- forgot to add where i got the drop and drag code from to edit to fit out needs
                                            https://www.youtube.com/watch?v=Wtrin7C4b7w
                                            creator: dcode
                                            uploaded: 05/05/2020
                                            length: 38:07 -->
                                        <span class="dropbox__txt" id="db-text">Drop file here or click to upload</span>
                                        <input type="file" name="daFile" class="dropbox__input" id="real-file">
                                        <script>
                                            ImgServerController.dragdrop();
                                        </script>
                                        </p>
                                    </div>':'<div class="alert alert-warning"> Please Login in first to upload images </div>';

                                ?>


 <!--                               <p class="card-text">-OR-</p>
                                    <p>
                                    <input type="file" id="real-file" hidden="hidden"/>
                                    <button type="button" id="cus-but"> Upload a file </button>
                                    <span id="but-text"> No file uploaded </span>
                                    <script>
                                        ImgServerController.cusButSetup();
                                    </script>
                                </p> -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center w-100 my-5">
                    <div id="imageDescription" class="col-8"></div>
                </div>
            </div>


            <!-- Modal-->

<div style="text-align:right;">
    <iframe width="550" height="315" src="https://www.youtube.com/embed/cHFAyg065H8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
