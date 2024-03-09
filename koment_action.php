<?php
    session_start();
    include "koneksi.php";

    if(isset($_GET['fotoid']) && isset($_POST['komentar'])) {
        $fotoid = $_GET['fotoid'];
        $userid = $_SESSION['userid'];
        $komentar = $_POST['komentar'];

        // Periksa apakah pengguna sudah memberikan komentar sebelumnya
        $sqlCheckComment = mysqli_query($conn, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid' AND userid='$userid'");
        $hasCommented = mysqli_num_rows($sqlCheckComment) > 0;

        if(!$hasCommented) {
            // Jika belum memberikan komentar, tambahkan komentar
            $sqlInsertComment = mysqli_query($conn, "INSERT INTO komentarfoto (fotoid, userid, isikomentar, tanggalkomentar) VALUES ('$fotoid', '$userid', '$komentar', NOW())");

            if($sqlInsertComment) {
                // Handle keberhasilan menambahkan komentar (mungkin redirect atau memberikan respons sukses)
                header("Location: foto.php");
                exit();
            } else {
                // Handle kesalahan saat menambahkan komentar
                echo "Gagal menambahkan komentar.";
            }
        } else {
            // Handle jika pengguna sudah memberikan komentar sebelumnya
            echo "Anda sudah memberikan komentar pada foto ini.";
        }
    } else {
        // Handle jika parameter fotoid atau komentar tidak diberikan
        echo "Parameter fotoid atau komentar tidak valid.";
    }
?>
