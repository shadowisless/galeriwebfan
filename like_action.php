<?php
    session_start();
    include "koneksi.php";

    if(isset($_GET['fotoid'])) {
        $fotoid = $_GET['fotoid'];
        $userid = $_SESSION['userid'];

        // Periksa apakah pengguna sudah memberikan like sebelumnya
        $sqlCheckLike = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
        $hasLiked = mysqli_num_rows($sqlCheckLike) > 0;

        if(!$hasLiked) {
            // Jika belum memberikan like, tambahkan like
            $sqlInsertLike = mysqli_query($conn, "INSERT INTO likefoto (fotoid, userid, tanggallike) VALUES ('$fotoid', '$userid', NOW())");

            if($sqlInsertLike) {
                // Handle keberhasilan menambahkan like (mungkin redirect atau memberikan respons sukses)
                header("Location: foto.php");
                exit();
            } else {
                // Handle kesalahan saat menambahkan like
                echo "Gagal menambahkan like.";
            }
        } else {
            // Handle jika pengguna sudah memberikan like sebelumnya
            echo "Anda sudah memberikan like pada foto ini.";
        }
    } else {
        // Handle jika parameter fotoid tidak diberikan
        echo "Parameter fotoid tidak valid.";
    }
?>