var sessionDataArray = [];
if ("<?php session_start(); echo 1; ?>" === "1") {
    var sessionEmail = "<?php echo $_SESSION['email']; ?>";
    var sessionDataSize = "<?php echo $_SESSION['dataSize']; ?>";
    <?php
    for ($i = 0; $i < $_SESSION['dataSize']; $i++) {
        echo 'sessionDataArray.push($_SESSION["image.strval($i)]);';
    }
    ?>
    var sessionMessage = "<?php echo $_SESSION['message']; ?>";
} else {
    sessionEmail = "";
}