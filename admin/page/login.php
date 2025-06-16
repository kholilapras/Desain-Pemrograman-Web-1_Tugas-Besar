<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Login</title>
</head>

<body>
    <div class="css_loginregister">
        <form method="post" action="action.php?action=login" enctype="multipart/form-data" class="news-form"
            autocomplete="off">
            <h2 style="text-align:center">Login</h2>
            <br>

            <div class="form-group">
                <input type="email" name="email" id="email" placeholder=" " class="form-input" required>
                <label for="email" class="floating">Email</label>
            </div>

            <div class="form-group">
                <input type="password" name="password" id="password" placeholder=" " class="form-input" required
                    pattern="^\S{4,100}$" title="Password harus 4-10 karakter dan tidak mengandung spasi">
                <label for="password" class="floating">Password</label>
            </div>

            <button type="submit" name="submit" class="form-button">Login</button>
            <br>
            <br>
            <div class="opsi">
                Belum Memiliki Akun? <a href="page.php?page=register">Register</a>
            </div>
        </form>
    </div>

    <script>
        // Validasi email automata
        document.querySelector("form").addEventListener("submit", function(e) {
            const emailInput = document.getElementById("email").value;

            if (!isValidEmail(emailInput)) {
                e.preventDefault();
                alert("Format email tidak valid.");
            }
        });

        function isValidEmail(email) {
            let state = 0;

            for (let i = 0; i < email.length; i++) {
                const c = email[i];

                switch (state) {
                    case 0:
                        if (isAlpha(c)) state = 1;
                        else return false;
                        break;
                    case 1:
                        if (isAlphaNum(c) || c === '.' || c === '_' || c === '-') state = 1;
                        else if (c === '@') state = 2;
                        else return false;
                        break;
                    case 2:
                        if (isAlpha(c)) state = 3;
                        else return false;
                        break;
                    case 3:
                        if (isAlphaNum(c) || c === '-') state = 3;
                        else if (c === '.') state = 4;
                        else return false;
                        break;
                    case 4:
                        if (isAlpha(c)) state = 5;
                        else return false;
                        break;
                    case 5:
                        if (isAlpha(c)) state = 5;
                        else return false;
                        break;
                    default:
                        return false;
                }
            }

            return state === 5;
        }

        function isAlpha(c) {
            return /^[A-Za-z]$/.test(c);
        }

        function isAlphaNum(c) {
            return /^[A-Za-z0-9]$/.test(c);
        }
    </script>

</body>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    :root {
        --blue_dark: #1450A0;
        --blue_light: #2878F0;
        --gold: #F0A014;
        --white: #F0F0F0;
        --black: #141414;
        --black2: #282828;
        --red: #C80000;
    }

    .css_loginregister {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    body {
        background-image: url('assets/img/background.jpg');
        background-color: #404040;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        height: 100%;
        margin: 0;
    }

    .form-group {
        position: relative;
        margin-bottom: 20px;
        background-color: transparent;
    }

    label {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        font-size: 16px;
        color: var(--gold);
        transition: all 0.2s;
        pointer-events: none;
        background-color: transparent;
        width: 100%;
    }

    input,
    select {
        width: 95%;
        padding: 10px;
        backdrop-filter: blur(10px);
        border-radius: 5px;
        color: var(--white);
        font-size: 1rem;
        background-color: transparent;
        position: relative;
        border: none;
    }

    input:focus,
    input:not(:placeholder-shown),
    select:focus,
    select:not([value=""]) {
        padding-top: 20px;
        padding-bottom: 5px;
        background-color: transparent;
        width: 95%;
        border: none;
    }

    input:focus+.floating,
    input:not(:placeholder-shown)+.floating,
    select:focus+.floating,
    select:not([value=""])+.floating {
        top: 10px;
        left: 10px;
        font-size: 12px;
        color: var(--gold);
        background-color: transparent;
        width: 100%;
    }

    form {
        max-width: 500px;
        min-width: 250px;
        padding: 40px;
        margin: 0 auto;
        color: var(--gold);
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        margin: 0 auto;
    }

    .form-button {
        background-color: var(--blue_dark);
        color: var(--white);
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        border: none;
        font-size: 1rem;
        cursor: pointer;
    }

    .opsi {
        text-align: center;
        color: var(--white);
    }

    .opsi a {
        text-decoration: none;
        color: var(--gold);
    }

    option {
        background-color: var(--black2);
        font-size: 1rem;
        width: 100%;
    }
</style>

</html>