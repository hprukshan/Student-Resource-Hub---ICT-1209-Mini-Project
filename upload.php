<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

$successScript = '';
$errorMsg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title    = trim($_POST['title']);
    $category = $_POST['category'] ?? ''; 
    $user_id  = $_SESSION['user_id'];
    
    if (isset($_FILES['note_file']) && $_FILES['note_file']['error'] == 0) {
        $allowedExts = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'zip'];
        $filename    = $_FILES['note_file']['name'];
        $fileExt     = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($fileExt, $allowedExts)) {
            $new_filename = time() . '_' . basename($filename);
            $destination  = 'uploads/' . $new_filename;
            
            if (!is_dir('uploads/')) {
                mkdir('uploads/', 0755, true);
            }
            
            if (move_uploaded_file($_FILES['note_file']['tmp_name'], $destination)) {
                $sql = "INSERT INTO notes (user_id, title, category, file_path, uploaded_at) VALUES (?, ?, ?, ?, NOW())";
                $stmt = $pdo->prepare($sql);
                
                if ($stmt->execute([$user_id, $title, $category, $destination])) {
                    $successScript = "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Note Uploaded Successfully!',
                                text: 'Redirecting to your dashboard...',
                                showConfirmButton: false,
                                timer: 1600,
                                timerProgressBar: true
                            }).then(() => {
                                window.location.href = 'dashboard.php';
                            });
                        });
                    </script>";
                } else {
                    $errorMsg = "Database error. Failed to save note info.";
                }
            } else {
                $errorMsg = "Failed to move uploaded file. Check 'uploads' folder permissions.";
            }
        } else {
            $errorMsg = "Invalid file type! Only PDF, DOC, PPT, and ZIP files are allowed.";
        }
    } else {
        $errorMsg = "Please select a valid file to upload.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Note - Xnotes</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?v=1.2">

    <style>
        .custom-file-box {
            background-color: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 50px;
            padding: 0.65rem 1.25rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
        }
        .custom-file-box:hover {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(150, 123, 182, 0.35);
        }
        .upload-icon-btn {
            font-size: 1.4rem;
            color: #967bb6;
            display: flex;
            align-items: center;
        }
        .file-name-text {
            color: #6c757d;
            font-size: 0.95rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>

    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg glass-element shadow-sm py-2">
        <div class="container-fluid px-4">
            <a class="navbar-brand p-0 m-0" href="index.php">
                <img src="images/logonew1.png" alt="Xnotes Logo" height="80">
            </a>
            <div class="d-flex ms-auto align-items-center">
                <a class="nav-link icon-btn px-2" href="dashboard.php" title="Back to Dashboard">
                    <i class="bi bi-arrow-left-circle-fill"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="card glass-element glass-card p-4 p-md-5" style="width: 100%; max-width: 580px;">
            <h3 class="fw-bold text-center mb-4" style="color: #333;">Upload a New Note</h3>
            
            <?php if(!empty($errorMsg)): ?>
                <div class="alert alert-danger text-center fw-bold"><?php echo htmlspecialchars($errorMsg); ?></div>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Note Title</label>
                    <input type="text" class="form-control form-control-lg rounded-pill" name="title" placeholder="E.g. Web Tech Chapter 1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Category / Subject</label>
                    <select class="form-select form-select-lg rounded-pill" id="categorySelect" name="category" required>
                        <option value="" disabled selected>Select a subject...</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Custom Clean File Upload Area -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Select File (PDF, DOC, PPT, ZIP)</label>
                    <label class="custom-file-box shadow-sm" for="noteFileInput">
                        <span class="upload-icon-btn">
                            <i class="bi bi-cloud-arrow-up-fill"></i>
                        </span>
                        <span class="file-name-text" id="fileNameDisplay">Choose a file to upload...</span>
                    </label>
                    <input type="file" id="noteFileInput" name="note_file" class="d-none" accept=".pdf,.doc,.docx,.ppt,.pptx,.zip" required>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-theme btn-lg py-2 shadow-sm">
                        <i class="bi bi-upload me-2"></i> Upload Note
                    </button>
                </div>
            </form>
        </div>
    </div>

    <footer class="glass-element py-4 mt-auto">
        <div class="container text-center text-dark fw-medium">
            &copy; 2026 Xnotes | Rajarata University BICT
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php echo $successScript; ?>

    <script src="js/script.js"></script>
    <script>
        // File එක තේරූ විට එහි නම පෙට්ටිය තුළ පෙන්වීම
        document.getElementById('noteFileInput').addEventListener('change', function() {
            let fileName = this.files[0] ? this.files[0].name : "Choose a file to upload...";
            let display = document.getElementById('fileNameDisplay');
            display.innerText = fileName;
            display.style.color = '#333';
            display.style.fontWeight = '500';
        });
    </script>
</body>
</html>