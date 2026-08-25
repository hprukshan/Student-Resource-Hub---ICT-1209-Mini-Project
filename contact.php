<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Xnotes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg glass-element shadow-sm py-2">
        <div class="container-fluid px-4">
            <a class="navbar-brand p-0 m-0" href="index.php">
                <img src="images/logonew1.png" alt="Xnotes Logo" height="80">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="index.php" title="Home">
                            <i class="bi bi-house-door-fill icon-btn"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active px-3" href="contact.php" title="About / Contact">
                            <i class="bi bi-info-circle-fill icon-btn"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="dashboard.php" title="Dashboard">
                            <i class="bi bi-person-circle icon-btn"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link btn px-4 fw-semibold"
                            style="border: 2px solid #967bb6; color: #967bb6; border-radius: 50px;"
                            href="auth/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn px-4 text-white fw-semibold shadow-sm"
                            style="background-color: #967bb6; border-radius: 50px;" href="auth/register.php">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contact form -->
    <div class="container mt-5 mb-5 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="card glass-element glass-card p-4 p-md-5" style="width: 100%; max-width: 550px;">

            <h3 class="fw-bold text-center mb-4" style="color: #333;">Contact Us</h3>

            <div id="msgAlert" class="alert d-none text-center" role="alert"></div>

            <form id="contactForm">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" class="form-control form-control-lg" id="name" placeholder="Enter your name"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">University Email</label>
                    <input type="email" class="form-control form-control-lg" id="email"
                        placeholder="username@tec.rjt.ac.lk" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Message</label>
                    <textarea class="form-control form-control-lg" id="message" rows="5"
                        placeholder="How can we help you?" required></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-theme btn-lg py-2 shadow-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <footer class="glass-element py-4 mt-auto">
        <div class="container text-center text-dark fw-medium">
            &copy; 2026 Xnotes | Rajarata University BICT
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let form = document.getElementById('contactForm');

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            let email = document.getElementById('email').value.trim();
            let alertBox = document.getElementById('msgAlert');

            if (email.endsWith('@tec.rjt.ac.lk')) {
                alertBox.textContent = "Your message has been sent successfully!";
                alertBox.className = "alert alert-success text-center";
                alertBox.classList.remove('d-none');
                form.reset();
            } else {
                alertBox.textContent = "Please use a valid university email!";
                alertBox.className = "alert alert-danger text-center";
                alertBox.classList.remove('d-none');
            }
        });
    </script>
</body>

</html>