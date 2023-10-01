    <br>
    <script>
    var darkmode_icon = document.getElementById("darkmode_icon");
    darkmode_icon.onclick = function() {
        // alert("Darkmode has been toggled!")
        document.body.classList.toggle("dark-mode");
        if (document.body.classList.contains("dark-mode")) {
            darkmode_icon.src = "https://i.imgur.com/ktl84oL.png";
            <?php
                $_SESSION['theme'] = 1;
            ?>
        } else {
            darkmode_icon.src = "https://i.imgur.com/xDrnTNb.png";
            <?php
                $_SESSION['theme'] = 0;
            ?>
        }
    }

    </script>
    <footer>
        Created by Nick Eng and Hanson
        Copyright 2023
    </footer>
</body>
</html>