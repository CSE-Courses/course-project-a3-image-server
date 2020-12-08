<!-- The footer -->
<footer id="footer" class="footer mt-auto py-3">
    <div class="container">
        <!-- The footer rectangle -->
        <div class="card border-0 m-2">
            <div class="card-body p-2">
            
                <!-- The rows and columns of the footer -->
                <div class="row">
                    <div class="col-9">
                        <div class="card-text h-100 d-inline-flex align-items-center">Created by Joyce Sommer, Martin Donovan, Mohit Gokul Murali, Nick Anzalone, and Sean Jones for Fall 2020 CSE 442 at SUNY University at Buffalo.</div>
                    </div>
                    
                    <!-- text-reset makes the links inherit their color -->
                    <div class="col-3 text-right">
                    
                        <?php if (!isset($_SESSION['email'])) { ?>
                        <!-- Not authenticated -->
                        <div>
                            <a href="loginForm.php" class="text-reset">Login</a>
                        </div><div>
                            <a href="registrationForm.php" class="text-reset">Sign Up</a>
                        </div>
                        <?php } else { ?>
                        <!-- Authenticated -->
                        <div>
                            &nbsp;&nbsp;
                            <a href="./php/logout.php" class="text-reset">Logout</a>
                        </div>
                        <div>
                            <a href="view_images.php" class="text-reset">View Images</a>
                        </div>
                        <?php } ?>
                        
                        
                        <div>
                            <a href="aboutUs.php" class="text-reset">About Us</a>
                        </div>
                        <div>
                            <a href="index.php" class="text-reset">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>