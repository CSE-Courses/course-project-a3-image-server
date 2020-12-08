<?php session_start();?>
<!-- The navbar -->
<div id="navbar">
    <nav id="cseNavbar" class="navbar rounded-pill-bottom" style="background-color: #918D85; color:#fff">
        <div>
            <ul class="navbar-nav flex-row mr-auto pl-5">
                <!-- The dropdown menu, just a placeholder for now, pl-5 is there to give the corner space -->
                <li class="nav-item">
                    <a class="nav-link text-reset" href="#collapseMenu" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseMenu">
                        <!-- Hamburger icon -->
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                        </svg>
                    </a>
                </li>
                <li class="nav-item d-inline-flex align-items-center pl-5" id="sessionName">
                    <?php
                        if (isset($_SESSION['email'])) {
                            echo $_SESSION['email'];
                        } else {
                            echo 'Status : Disconnected';
                        }
                    ?>
                </li>
            </ul>
        </div>
        
        <!-- The title, with text-reset to make the links inherit their color, and pr-5 to give the corner space -->
        <a href="index.php" class="navbar-brand text-reset m-0 h1 pr-5 py-0" style="font-size: 2rem">UB Image Server</a>
    </nav>
    
    <!-- The dropdown menu, implemented as a collaped card -->
    <div>
        <div class="collapse" id="collapseMenu" style="position: absolute; z-index:1001;">
            <div class="menu-card card-body p-0">
            
            <!-- Drop down form -->
                <form class="form-row px-2" action="./php/action_login.php"method="post">
                    <div class="col-9">
                        <div class="form-group my-1 p-1">
                            <label class="sr-only" for="menuEmail">Email</label>
                            <input type="text" class="form-control" id="menuEmail" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group my-1 p-1">
                            <label class="sr-only" for="menuPassword">Password</label>
                            <input type="password" class="form-control" id="menuPassword" name="psw" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <button type="submit" class="btn btn-dark">
                        
                            <!-- Play icon -->
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-play-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                            </svg>
                        </button>
                    </div>
                </form>
                
                <?php if (!isset($_SESSION['email'])) { ?>
                <!-- Not authenticated -->
                <div class="text-left px-3 pb-2" style="font-size: 1rem;">
                    <a class="text-reset" href="loginForm.php">Log In</a>&nbsp;|&nbsp;<a class="text-reset" href="registrationForm.php">Create Account</a>
                </div>
                <?php } else { ?>
                <!-- Authenticated -->
                <div class="text-left px-3 pb-2" style="font-size: 1rem;">
                    <a class="text-reset" href="php/logout.php">Log Out</a>&nbsp;&nbsp;
                </div>
                    
                <div class="text-left px-3 pb-2" style="font-size: 1rem;">
                    <a class="text-reset" href="view_images.php">View Images</a>&nbsp;&nbsp;
                </div>
                <?php } ?>
                
                <!-- Drop down links -->
                <div class="d-inline-flex align-items-center text-center">
                </div>
                <a class="text-reset py-2" href="aboutUs.php" style="font-size: 1.7rem">About Us</a>
                <a class="text-reset py-2" href="index.php" style="font-size: 1.7rem">Home</a>
            </div>
        </div>
    </div>
</div>