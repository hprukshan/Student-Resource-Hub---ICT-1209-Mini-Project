<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Xnotes</title>
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
                        <a class="nav-link px-3" href="index.php">
                            <i class="bi bi-house-door-fill icon-btn"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="upload.php">
                            <i class="bi bi-cloud-arrow-up-fill icon-btn"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link btn px-4 btn-theme shadow-sm" href="auth/login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5 main-content">
        <h3 class="fw-bold mb-4" style="color: #333;">My Dashboard</h3>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card glass-element glass-card p-4 text-center">
                    <i class="bi bi-person-circle display-1 text-secondary mb-3"></i>
                    <h4 class="fw-bold">Student Name</h4>
                    <p class="text-dark mb-2">student@tec.rjt.ac.lk</p>
                    <span class="badge rounded-pill text-white px-3 py-2 mb-3" style="background-color: #967bb6;">BICT
                        Undergraduate</span>
                    <button class="btn btn-sm btn-outline-dark rounded-pill fw-semibold" data-bs-toggle="modal"
                        data-bs-target="#editProfileModal">Edit Profile</button>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card glass-element glass-card p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold m-0">My Uploaded Notes</h5>
                        <a href="upload.php" class="btn btn-sm btn-theme px-3">+ Add New</a>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <div>
                                <h6 class="fw-bold mb-1">ICT 1209 - Web Technologies</h6>
                                <small class="text-dark">Uploaded on: 2026-07-20</small>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-outline-dark rounded-pill me-1"><i
                                        class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-outline-danger rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <div>
                                <h6 class="fw-bold mb-1">ICT 2304 - OOP Tutorials</h6>
                                <small class="text-dark">Uploaded on: 2026-07-25</small>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-outline-dark rounded-pill me-1"><i
                                        class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-outline-danger rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Section -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Change Name:</label>
                            <input type="text" class="form-control rounded-pill" value="Student Name">
                        </div>

                        <hr class="my-4">

                        <h6 class="fw-bold text-dark mb-3">Change Password</h6>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Campus Email (Required)</label>
                            <input type="email" class="form-control rounded-pill" placeholder="username@tec.rjt.ac.lk"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Old Password</label>
                            <input type="password" class="form-control rounded-pill"
                                placeholder="Enter current password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">New Password</label>
                            <input type="password" class="form-control rounded-pill" placeholder="Enter new password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Confirm New Password</label>
                            <input type="password" class="form-control rounded-pill" placeholder="Confirm new password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-theme rounded-pill px-4" data-bs-dismiss="modal">Save
                        Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Section -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content shadow text-center p-3">
                <div class="modal-body">
                    <i class="bi bi-exclamation-circle text-danger display-4"></i>
                    <h5 class="fw-bold mt-3">Are you sure?</h5>
                    <p class="text-muted">Do you really want to delete this note? This cannot be undone.</p>
                </div>
                <div class="modal-footer border-0 justify-content-center flex-nowrap">
                    <button type="button" class="btn btn-light rounded-pill px-3 w-50"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger rounded-pill px-3 w-50"
                        data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="glass-element py-4 mt-auto">
        <div class="container text-center text-dark fw-medium">
            &copy; 2026 Xnotes | Rajarata University BICT
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>