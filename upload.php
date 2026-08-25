<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Notes - Xnotes</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- වෙනම් කරගත් CSS ෆයිල් එක ලින්ක් කිරීම -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- NAV BAR -->
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
                        <a class="nav-link px-3" href="contact.php" title="About">
                            <i class="bi bi-info-circle-fill icon-btn"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link btn px-4 fw-semibold"
                            style="border: 2px solid #967bb6; color: #967bb6; border-radius: 50px;"
                            href="auth/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn px-4 btn-theme shadow-sm" href="auth/register.php">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5 mb-5 main-content d-flex justify-content-center align-items-center">
        <div class="col-md-8 col-lg-6">
            <div class="card glass-element glass-card p-4 p-md-5">

                <h3 class="fw-bold text-center mb-4" style="color: #333;">Upload <span style="color:red;">X</span>notes
                </h3>

                <form>

                    <div class="mb-3">
                        <select id="moduleSelect" class="form-select form-select-lg rounded-pill shadow-sm fw-semibold"
                            required>
                            <option selected disabled value="">Module Code ▼</option>

                        </select>
                    </div>

                    <div class="mb-4">
                        <input type="text"
                            class="form-control form-control-lg rounded-pill shadow-sm text-center fw-semibold"
                            placeholder="Note Title" required>
                    </div>

                    <div class="upload-dropzone p-4 text-center mb-4"
                        onclick="document.getElementById('fileInput').click()">
                        <i class="bi bi-cloud-arrow-up display-6 mb-2" style="color: #967bb6;"></i>
                        <p class="mb-1 fw-semibold text-dark">Drag & Drop PDF here</p>
                        <p class="text-muted small mb-2">or</p>
                        <label for="fileInput" class="btn btn-sm btn-outline-dark rounded-pill px-3 fw-semibold">
                            [ Browse ]
                        </label>
                        <input type="file" id="fileInput" class="d-none" accept=".pdf">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-theme btn-lg rounded-pill shadow-sm py-2">Upload
                            Note</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <footer class="glass-element py-4 mt-auto">
        <div class="container text-center text-dark fw-medium">
            &copy; 2026 Xnotes | Rajarata University BICT
        </div>
    </footer>

    <!-- Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        const modules = [
            [1, "ICT 1202", "Electronic Circuits", 0], [1, "ICT 1305", "Program Designing and Programming", 0], [1, "ICT 1111", "Productivity and Collaborative Tools", 0], [1, "CMT 1301", "Fundamentals of Physics for Technology", 0], [1, "CMT 1303", "Fundamentals of Mathematics for Technology", 0], [1, "CML 1301", "Personality Development", 0], [1, "CMT 1005", "Communication Skills I", 0], [1, "ICT 1210", "Introduction to Multimedia", 0], [1, "ICT 1108", "Skill Development Project I", 0], [1, "ICT 1209", "Web Technologies", 1], [1, "ICT 1207", "Human Computer Interaction", 1], [1, "CML 1203", "Principles of Management", 0], [1, "CML 1204", "Health and Wellbeing", 0], [1, "CMT 1009", "Communication Skills II", 0], [1, "CMT 1307", "Mathematics For Technology I", 0], [1, "ENT 1302", "Fundamentals of Electricity and Magnetism", 0],
            [2, "ICT 2202", "Operating Systems", 0], [2, "ICT 2303", "Data Structures and Algorithms", 0], [2, "ICT 2304", "Object Oriented Programming", 0], [2, "ICT 2207", "Software System Design", 0], [2, "ICT 2212", "Skill Development Project II", 0], [2, "CML 2202", "Engineering Economics", 0], [2, "CMT 2002", "Communication Skills III", 0], [2, "EET 2207", "Mathematics for Technology II", 0], [2, "ICT 2305", "Computational Mathematics", 0], [2, "ICT 2214", "Introduction to Information Systems", 0], [2, "ICT 2211", "Fundamentals of Statistics", 0], [2, "ICT 2213", "Data Communication and Networking", 0], [2, "ICT 2308", "Database Systems", 0], [2, "ICT 2109", "Communication and Learning Skills", 0], [2, "CML 2204", "Foreign Language", 0], [2, "CML 2205", "Ethics for Science and Technology", 0],
            [3, "ICT 3201", "Software Project Management", 1], [3, "ICT 3203", "Scientific Computer Applications", 0], [3, "CML 3101", "Legal and Patent Aspects", 0], [3, "ICT 3312", "Software Verification and Validation", 0], [3, "ICT 3206", "Skills Development Project III", 0], [3, "ICT 3314", "Advanced Computer Networks", 0], [3, "ICT 3208", "Design and Analysis of Algorithms", 0], [3, "ICT 3307", "Computational Statistics", 0], [3, "ICT 3217", "Advance Computer Networks", 0], [3, "ICT 3209", "Computer Organization and Architecture", 0], [3, "ICT 3310", "Information Security", 0], [3, "ICT 3311", "Robotics", 0], [3, "ICT 3315", "Internet of Things", 0], [3, "ICT 3213", "Advanced SW System Design", 0], [3, "ICT 3216", "Research Methodology", 0], [3, "ICT 3204", "E-Business Systems", 0], [3, "CML 3203", "Basics of Accountancy", 0],
            [4, "ICT 4301", "Mobile Computing", 0], [4, "ICT 4202", "Internet Applications", 0], [4, "ICT 4203", "Software Engineering", 0], [4, "ICT 4205", "Current Topics in Information Technology", 0], [4, "ICT 4306", "Data Science", 1], [4, "ICT 4207", "Artificial Intelligence", 0], [4, "ICT 4210", "Digital Image Processing", 0], [4, "ICT 4211", "Computer Graphics and Visualization", 0], [4, "CML 4201", "Entrepreneurship", 0], [4, "CML 4202", "Human Resource Management", 0]
        ];

        let moduleSelect = document.getElementById('moduleSelect');

        modules.forEach(function (mod) {
            let code = mod[1];
            let name = mod[2];

            let option = document.createElement('option');
            option.value = code;
            option.innerText = code + " - " + name;
            moduleSelect.appendChild(option);
        });
    </script>
</body>

</html>