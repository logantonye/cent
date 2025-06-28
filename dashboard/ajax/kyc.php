<?php
session_start();
require "../../config.php";
require "../../mail.php";
$id=$_SESSION['user_id'];

if (isset($_FILES['kyc'])) {
    $image      = $_FILES['kyc']['name'];
    $image_tmp  = $_FILES['kyc']['tmp_name'];
    $target_dir = "../images/avatar/";

    // Ensure file extension is allowed (add more as needed)
    $allowed_ext = ['jpg', 'jpeg', 'png', 'pdf'];
    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed_ext)) {
        echo "Unsupported file type. Please upload JPG, PNG, or PDF.";
        exit;
    }

    // Create unique file name
    $new_filename = uniqid("kyc_", true) . "." . $ext;
    $target_file = $target_dir . $new_filename;

    if (move_uploaded_file($image_tmp, $target_file)) {
        $image_path = "images/avatar/" . $new_filename;

        // Use prepared statement for update
        $stmt = $conn->prepare("UPDATE `users` SET `kyc` = ?, `activated` = 'pending' WHERE `id` = ?");
        $stmt->bind_param("si", $image_path, $id);
        $stmt->execute();
        $stmt->close();

        // Send notification email
        $subject = "New KYC to review";
        $message = "You have a new KYC document to review on Centenial Trade";
        $to = "support@Realstockfx.com";
        sendmail($to, $subject, $message);

        echo "Your account is undergoing review.";
    } else {
        echo "Failed to upload file. Please try again.";
    }
}



?>