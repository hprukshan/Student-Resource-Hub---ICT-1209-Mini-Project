<?php
session_start();
require_once 'includes/db.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

$successMsg = '';
$errorMsg = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category']; 
    $user_id = $_SESSION['user_id'];
    
    
    if (isset($_FILES['note_file']) && $_FILES['note_file']['error'] == 0) {
        
        $allowedExts = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'zip'];
        $filename = $_FILES['note_file']['name'];
        $fileExt = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        // File type checks
        if (in_array($fileExt, $allowedExts)) {
            
            
            $new_filename = time() . '_' . basename($filename);
            $destination = 'uploads/' . $new_filename;
            
            
            if (move_uploaded_file($_FILES['note_file']['tmp_name'], $destination)) {
                
              
                $sql = "INSERT INTO notes (user_id, title, category, file_path) VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                
                if ($stmt->execute([$user_id, $title, $category, $destination])) {
                    $successMsg = "Note uploaded successfully!";
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg glass-element shadow-sm py-2">
        <div class="container-fluid px-4">
            <a class="navbar-brand p-0 m-0" href="index.php">
                <img src="images/logonew1.png" alt="Xnotes Logo" height="80">
            </a>
            <div class="d-flex ms-auto gap-2">
                <a class="nav-link btn px-4 btn-theme shadow-sm" href="dashboard.php">Back to Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="card glass-element glass-card p-4 p-md-5" style="width: 100%; max-width: 600px;">
            <h3 class="fw-bold text-center mb-4" style="color: #333;">Upload a New Note</h3>
            
            <?php if($errorMsg != ''): ?>
                <div class="alert alert-danger text-center fw-bold"><?php echo $errorMsg; ?></div>
            <?php endif; ?>

            <?php if($successMsg != ''): ?>
                <div class="alert alert-success text-center fw-bold"><?php echo $successMsg; ?></div>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Note Title</label>
                    <input type="text" class="form-control form-control-lg" name="title" placeholder="E.g. Web Tech Chapter 1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Category / Subject</label>
                    <select class="form-select form-select-lg" id="categorySelect" name="category" required>
                        <option value="" disabled selected>Select a subject...</option>
                       
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Select File (PDF, DOC, PPT, ZIP)</label>
                    <input class="form-control form-control-lg" type="file" name="note_file" accept=".pdf,.doc,.docx,.ppt,.pptx,.zip" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-theme btn-lg py-2 shadow-sm">Upload Note</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="glass-element py-4 mt-auto">
        <div class="container text-center text-dark fw-medium">
            &copy; 2026 Xnotes | Rajarata University BICT
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>