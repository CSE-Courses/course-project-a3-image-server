<!doctype html>


<html class="h-100" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- local bootstrap css-->
        <link rel="stylesheet" href="./styles/bootstrap.min.css">

        <!-- custom stylesheet -->
        <link rel="stylesheet" href="./styles/customstyle.css">

        <title>Profile Page - Image Server</title>
    </head>
    <body class="d-flex flex-column h-100">
        
        <script src="./js/customfunctions.js"> </script>
        <script src="./js/sessionVar.php"> </script>

        <div id="navbar"></div>

        <main role="main" class="flex-shrink-0">
            <div id="content" class="container">
            
                <!-- Most of the body is here. It's just a row with an 8/12 column -->
                <div class="row justify-content-center w-100 my-5">
                    <div class="col-8">
                        <div class="card text-center w-100 border-0 rounded-0" style="background-color: #9A9A9A;"></div>
                        <!-- format welcome measage as "Welcome, {USERNAME}! -->

                        
                            <?php
                                if(!isset($_COOKIE[$cookie_name])) {
                                    header("Location: /loginForm.html");
                                } 

                                # Found code to play with at https://github.com/mikelothar/show-all-images-in-a-folder-with-php
                                # NEEDS TESTING!!

                                # Path to image folder
                                $imageFolder = 'tmp_store/$_COOKIE[$cookie_name]';

                                # Show only these file types from the image folder
                                $imageTypes = '{*.jpg,*.JPG,*.jpeg,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';
                                
                                # This is only used if images are sorted by date (see above)
                                $newestImagesFirst = true;

                                # Add images to array
                                $images = glob($imageFolder . $imageTypes, GLOB_BRACE);

                                # Sort images
                                # Sort the images based on its 'last modified' time stamp
                                $sortedImages = array();
                                $count = count($images);
                                for ($i = 0; $i < $count; $i++) {
                                    $sortedImages[date('YmdHis', filemtime($images[$i])) . $i] = $images[$i];
                                }
                                # Sort images in array
                                if ($newestImagesFirst) {
                                    krsort($sortedImages);
                                } else {
                                    ksort($sortedImages);
                                }
                                
                            ?>
                            
                        <h1>Welcome, <?= $_COOKIE[$cookie_name] ?>!</h1>
                        <br>

                        <table style="width:50%" border-spacing="10px" border="2px black">
                            <tr>
                              <th padding="10px">Username/Email</th>
                            </tr>
                            <tr>
                              <td padding="10px" style="text-align: center;"><?= $_COOKIE[$cookie_name] ?></td>
                            </tr>
                        </table>

                        <!--NEEDS TESTING-->
                        <?= writeHtml('<ul class="ins-imgs">');
                            foreach ($sortedImages as $image) {

                                # Get the name of the image, stripped from image folder path and file type extension
                                $name = 'Image name: ' . substr($image, strlen($imageFolder), strpos($image, '.') - strlen($imageFolder));

                                # Get the 'last modified' time stamp, make it human readable
                                $lastModified = '(last modified: ' . date('F d Y H:i:s', filemtime($image)) . ')';

                                # Begin adding
                                writeHtml('<li class="ins-imgs-li">');
                                writeHtml('<div class="ins-imgs-img" onclick=this.classList.toggle("zoom");><a name="' . $image . '" href="#' . $image . '">');
                                writeHtml('<img src="' . $image . '" alt="' . $name . '" title="' . $name . '">');
                                writeHtml('</a></div>');
                                writeHtml('<div class="ins-imgs-label">' . $name . ' ' . $lastModified . '</div>');
                                writeHtml('</li>');
                            }
                            writeHtml('</ul>');
                        ?>
                    </div>
                </div>
            </div>
        </main>

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