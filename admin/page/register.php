<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div class="css_loginregister">
        <form method="post" action="action.php?action=register" enctype="multipart/form-data" class="news-form" autocomplete="off">
            <h2 style="text-align:center">Register</h2>
            <br>

            <div class="form-group">
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder=" " class="form-input" required>
                <label for="nama_lengkap" class="floating">Nama Lengkap</label>
            </div>

            <div class="form-group">
                <input type="tel" name="no_telp" id="no_telp" placeholder=" " class="form-input" required pattern="^(\+62|62|0)8[1-9][0-9]{7,10}$" title="The phone number must be from Indonesia, starting with +62, 62, or 0, followed by 8 and 8-11 other digits." autocomplete="off">
                <label for="no_telp" class="floating">No. Telp</label>
            </div>

            <div class="form-group">
                <input type="email" name="email" id="email" placeholder=" " class="form-input" required>
                <label for="email" class="floating">Email</label>
            </div>

            <div class="form-group">
                <input type="password" name="password" id="password" placeholder=" " class="form-input" required pattern="^\S{4,10}$" title="Password must be 4-10 characters and contain no spaces">
                <label for="password" class="floating">Password</label>
            </div>

            <div class="form-group">
                <select name="role" id="role" class="form-input" required style="width:100%;">
                    <option value="">-- Pilih Role --</option>
                    <option value="Kasir">Kasir</option>
                    <option value="Super Admin">Super Admin</option>
                </select>
                <label for="role" class="floating">Role</label>
            </div>

            <button type="submit" name="submit" class="form-button">Register</button>
            <br>
            <br>
            <div class="opsi">
                Sudah Memiliki Akun? <a href="page.php?page=login">Login</a>
            </div>
        </form>
    </div>
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
        /* ===== Colors ===== */
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
        width: 100%;
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
        width: 100%;
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
        max-width: 700px;
        min-width: 400px;
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