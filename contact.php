<?php include "header.php"; ?>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "database/connect_db.php";
    $firstName = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $object = $_POST['object'];
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
    $stmt = $conn->prepare("INSERT INTO contact (prenom, nom, email, `object`, `message`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $email, $object, $message);
    $stmt->execute();
    ini_set('SMTP','mail_Server.com');
    ini_set('smtp_port','465');
    mail('tefl.ben10@gmail.com', $object , $message);
}


?>

<body>
    <main class="contact-main">
        <form class="contact-form" action="contact.php" method="post">
            <div class="form-div">
                <label for="fname">First Name</label>
                <input class="box" type="text" name="fname" id="" required>
                <label for="lname">Last Name</label>
                <input class="box" type="text" name="lname" id="" required>
                <label for="email">Email</label>
                <input class="box" type="email" name="email" id="" required>
                <select class="box" name="object">
                    <option value="Editing or deleting posts">Editing or deleting posts</option>
                    <option value="Reporting a post">Reporting a post</option>
                    <option value="A question to a blog writer">A question to a blog writer</option>
                </select>
                <label for="message">Message</label>
                <textarea class="box" name="message" id="" cols="50" rows="20"
                    placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. At." required></textarea>
                <input type="submit" id="submit" value="Envoyez">
            </div>
        </form>
    </main>


    <footer class="footer-create">
        <nav class="liens">
            <ul class="navbar-2">
                <li><a href="index.php">Posts</a></li>
                <li><a href="login.php">Se Connecter</a></li>
                <li><a href="signin.php">S'inscrire</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="socials">
            <h5>Suivez-nous:</h5>
            <div class="social-list">
                <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></i></a>
                <a href="https://www.linkedin.com" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                <a href="https://www.youtube.com" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
        <p class="copyrights">© 2024, JIT Company.</p>
    </footer>
</body>

