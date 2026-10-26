<?php
// Memastikan hanya admin yang bisa mengakses
session_start();
if ($_SESSION['level'] != 'Admin' && $_SESSION['level'] != 'admin') {
    header("Location: ../../index.php?page=beranda");
    exit();
}

// Menghubungkan database
include '../../config/database.php';

// Ambil ID feedback dari URL
if (isset($_GET['id'])) {
    $id_feedback = mysqli_real_escape_string($kon, $_GET['id']);

    // Query hapus
    $query_hapus = mysqli_query($kon, "DELETE FROM tbl_feedback WHERE id_feedback = '$id_feedback'");

    if ($query_hapus) {
        echo "<script>alert('Feedback berhasil dihapus.'); window.location.href='../../index.php?page=feedback_admin';</script>";
    } else {
        echo "<script>alert('Gagal menghapus feedback.'); window.location.href='../../index.php?page=feedback_admin';</script>";
    }
} else {
    header("Location: ../../index.php?page=feedback_admin");
}