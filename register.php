
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="betacraft, launcher, proxy, minecraft, beta, alpha, classic, server">
    <meta name="generator" content="betacraftuk/homepage">
    <meta name="description"
        content="Home of the Betacraft Launcher project, aiming to fix some flaws of the official Minecraft Launcher. You are also welcome to join our nostalgic Minecraft Beta server!">
    <meta name="author" content="Betacraft Team">

    <title>Login - Betacraft</title>
    <link rel="icon" href="/assets/favicon.png" type="image/png">
    
    <link rel="stylesheet" href="/assets/style.css">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Betacraft",
            "url": "https://betacraft.uk",
            "logo": "https://betacraft.uk/assets/pack.png"
        }
    </script>
    <script async src="/assets/safari.js"></script>
</head>

<body>
    <header class="navigation-container" aria-label="Header">
        <nav aria-label="Navigation and logo" class="navigation">
            <a class="navigation__home" href="/" title="Homepage" aria-label="Go to homepage">
                <img class="navigation__logo" alt="Betacraft written in the old Minecraft logo style"
                    src="/assets/logo.png" height="40" width="248">
            </a>
            <div class="navigation__links navigation__links--start" aria-label="Site navigation">
                <a class="navigation__link navigation__link--white" href="/downloads">Downloads</a>
                <a class="navigation__link navigation__link--white"
                    href="https://www.patreon.com/BetacraftLauncher">Donate</a>
                <a class="navigation__link navigation__link--white" href="https://discord.gg/d4WvXeQ">Discord</a>
                
            </div>
            <div class="navigation__links navigation__links--end" aria-label="Account navigation">
                
                <a class="navigation__link" href="/login">Log in</a>
                
                
            </div>
        </nav>
    </header>

    
    

    
<main class="main" aria-label="Main content">
    <section aria-label="Login">
        <h1>Sign in</h1>
        <p>When logging in, use your e-mail address as username.</p>

        <form class="account-form" action="/login" method="post">
            <input type="hidden" name="csrf" value="NIECYPB5BPOWLI42MGWRYDT2DBR5JEMKU6KLJMMN3ONNBQGVP6MQ">

            <div class="account-form__field">
                <label class="acocunt-form__label" for="username-field">Email</label>
                <input class="form__input" type="email" name="email" placeholder="me@example.com" id="username-field">
            </div>

            <div class="account-form__field">
                <label class="form__label" for="password-field">Password</label>
                <input class="form__input" type="password" name="password" id="password-field">
                <a class="account-form__link" href="/forgot-password">Forgot password?</a>
            </div>

            <label for="remember-me" title="Only for aesthetic purposes :)">
                Remember me
                <input type="checkbox" id="remember-me">
            </label>

            <input class="form__input" type="submit" value="Sign in">
        </form>
    </section>
    <h3>Registration is disabled. Don't ask why, you don't need a Betacraft account to use the launcher.</h3>
</main>

    <footer class="footer" aria-label="Footer containing legal information">
        Betacraft 2013-2023 &mdash; This website is not affiliated with Mojang.
        <a class="footer__link" href="/legal#terms-of-service">Terms of Service</a>
        | <a class="footer__link" href="/legal#privacy-policy">Privacy Policy</a>
    </footer>
</body>

</html>
