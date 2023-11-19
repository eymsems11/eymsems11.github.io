
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="betacraft, launcher, proxy, minecraft, beta, alpha, classic, server">
    <meta name="generator" content="betacraftuk/homepage">
    <meta name="description"
        content="Home of the Betacraft Launcher project, aiming to fix some flaws of the official Minecraft Launcher. You are also welcome to join our nostalgic Minecraft Beta server!">
    <meta name="author" content="Betacraft Team">

    <title>Register - Eymsems11 Software</title>
    <link rel="icon" href="/assets/favicon.png" type="image/png">
    
    <link rel="stylesheet" href="/assets/style.css">
    <script>
        // Tarayıcı dilini ve URL'yi al
        var browserLanguage = navigator.language || navigator.userLanguage;
        var currentURL = window.location.href;

        // Dil kontrolü
        function changeLanguage() {
            var languageParam = '?hl=en';

            if (currentURL.indexOf('?') === -1) {
                // Eğer URL'de ? işareti yoksa
                window.location.href = currentURL + languageParam;
            } else {
                // Eğer URL'de ? işareti varsa
                window.location.href = currentURL + '&hl=en';
            }
        }

        // İçerik kontrolü
        function checkContent() {
            var isTurkey = browserLanguage.indexOf('tr') !== -1;
            var hasEnParam = currentURL.indexOf('?hl=en') !== -1;
        
            if (hasEnParam && !hasSubServerParam) {
                // Eğer sadece ?hl=en parametresi varsa
                document.getElementById('news-text').innerText = "News";
                document.getElementById('rules-text').innerText = "Rules";
                document.getElementById('faq-text').innerText = "FAQ";
                document.getElementById('archive-text').innerText = "Archive";
                document.getElementById('contact-text').innerText = "Contact";
                document.getElementById('support-text').innerText = "Support";
            }
        }

        // Türkçe kontrolü ve içerik kontrolü çağır
        window.onload = function () {
            if (browserLanguage.indexOf('tr') === -1) {
                // Eğer dil Türkçe değilse, dil değişikliği butonunu göster
                document.getElementById('language-change').style.display = 'block';
            }
            checkContent();
        };
    </script>
</head>

<body>
    <header class="navigation-container" aria-label="Başlık">
        <nav aria-label="Navigasyon ve logo" class="navigation">
            <a class="navigation__home" href="/" title="Ana Sayfa" aria-label="Ana sayfaya git">
                <img class="navigation__logo" alt="Betacraft, eski Minecraft logosu tarzında yazılmış" src="/assets/logo.png" height="40" width="248">
            </a>
            <div class="navigation__links navigation__links--start" aria-label="Site navigasyonu">
                <a class="navigation__link navigation__link--white" href="news.htm" id="news-text">Haberler</a>
                <a class="navigation__link navigation__link--white" href="rules.htm" id="rules-text">Kurallar</a>
                <a class="navigation__link navigation__link--white" href="faq.htm" id="faq-text">SSS</a>
                <a class="navigation__link navigation__link--white" href="archive" id="archive-text">Arşiv</a>
                <a class="navigation__link navigation__link--white" href="contact.htm" id="contact-text">İletişim</a>
                <a class="navigation__link navigation__link--white" href="support.htm" id="support-text">Destek</a>
            </div>
            <?php
session_start();

// Eğer giriş yapılmışsa ve kullanıcı adı saklanmışsa, kullanıcı adını ve çıkış yapma bağlantısını göster
if(isset($_SESSION['username']) && isset($_COOKIE['unique_computer_id'])) {
    $username = $_SESSION['username'];
    echo '<div class="navigation__links navigation__links--end" aria-label="Hesap navigasyonu">';
    echo '<p>' . $username . ' Olarak Giriş Yapıldı <a class="navigation__link" href="logout.php">Çıkış Yap</a></p>';
    echo '</div>';
} else {
    echo '<div class="navigation__links navigation__links--end" aria-label="Hesap navigasyonu">';
    echo '<a class="navigation__link" href="login.htm">Giriş Yap</a>';
    echo '<a class="navigation__link" href="register.htm">Kaydol</a>';
    echo '</div>';
}
?>

        </nav>
    </header>

    
<main class="main" aria-label="Main content">
    <section>
        <h1>Kayıt Formu</h1>
        <form class="account-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Form alanları -->
            <div class="account-form__field">
                <label for="email-field">E-posta Adresiniz:</label>
                <input type="email" name="email" id="email-field" required>
            </div>

            <div class="account-form__field">
                <label for="password-field">Şifre:</label>
                <input type="password" name="password" id="password-field" required>
            </div>

            <div class="account-form__field">
                <label for="username-field">Minecraft Kullanıcı Adınız:</label>
                <input type="text" name="username" id="username-field" required>
            </div>

            <div class="account-form__field">
                <label for="birthdate-field">Doğum Tarihi (en az 12 yaşında olmalısınız):</label>
                <input type="date" name="birthdate" id="birthdate-field" max="2011-11-18" required>
            </div>

            <input type="submit" value="Kayıt Ol">
        </form>

        <?php
// Formdan gelen verileri işleme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = $_POST["username"];
    $birthdate = $_POST["birthdate"];
    $registration_ip = $_SERVER['REMOTE_ADDR']; // Kayıt olduğu bilgisayarın IP adresi

    // Veritabanı bağlantı bilgileri
    $servername = "localhost";
    $db_username = "root"; // Varsayılan olarak XAMPP'te kullanıcı adı "root" olabilir
    $db_password = ""; // Varsayılan olarak XAMPP'te şifre yoktur
    $dbname = "buddies"; // Kullandığınız veritabanının adı

    // Bağlantı oluşturma
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Bağlantı kontrolü
    if ($conn->connect_error) {
        die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
    }

    // SQL sorgusu oluşturma
    $sql = "INSERT INTO users (email, password, minecraft_username, birthdate, registration_ip)
            VALUES ('$email', '$password', '$username', '$birthdate', '$registration_ip')";

    // Sorguyu çalıştırma ve kontrol etme
    if ($conn->query($sql) === TRUE) {
        echo "Kullanıcı başarıyla kaydedildi!";
    } else {
        echo "Hata oluştu: " . $sql . "<br>" . $conn->error;
    }

    // Bağlantıyı kapatma
    $conn->close();
}
?>
    </section>
</main>

    <footer class="footer" aria-label="Footer containing legal information">
        Copyright &copy; Eymsems11 Software. &mdash; This website is not affiliated with Mojang.
        <a class="footer__link" href="/legal#terms-of-service">Terms of Service</a>
        | <a class="footer__link" href="/legal#privacy-policy">Privacy Policy</a>
    </footer> 
</body>

</html>
