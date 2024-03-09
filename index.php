<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #159957, #155799);
            margin: 0;
            padding: 20px;
            text-align: center;
            min-height: 100vh;
        }

        h1 {
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            display: inline-block;
            margin-right: 10px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        .photo-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .photo-box {
            position: relative;
            overflow: hidden;
            margin: 10px;
        }

        .photo-box img {
            width: 100%;
            height: auto;
            display: block;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.6);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .photo-box:hover .overlay {
            opacity: 1;
        }

        .overlay a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid white;
            margin: 5px;
        }

        .overlay a:hover {
            background-color: white;
            color: black;
        }

        .photo-info {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 5px;
            text-align: left;
        }
        ul.navbar {
    list-style: none;
    margin: 0;
    padding: 10px;
    background-color: #333;
    overflow: hidden;
}

ul.navbar li {
    display: inline;
}

ul.navbar li a {
    text-decoration: none;
    color: white;
    padding: 10px;
    display: inline-block;
}

ul.navbar li a:hover {
    background-color: #555;
}

@media (max-width: 600px) {
    ul.navbar li {
        display: block;
        width: 100%;
        text-align: center;
    }
}
    </style>
</head>
<body>
    <h1>Halaman Landing</h1>
    <?php
        session_start();
        if(!isset($_SESSION['userid'])){
    ?>
        <ul>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    <?php
        } else {
    ?>  
<ul class="navbar">
    <li><a href="index.php">Home</a></li>
    <li><a href="album.php">Album</a></li>
    <li><a href="foto.php">Foto</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
    <?php
        }
    ?>
    
    <div class="photo-container">
        <?php
            include "koneksi.php";
            $sql=mysqli_query($conn,"SELECT foto.*, user.namalengkap, COUNT(likefoto.likeid) AS jumlah_like, COUNT(komentarfoto.komentarid) AS jumlah_komentar FROM foto LEFT JOIN likefoto ON foto.fotoid = likefoto.fotoid LEFT JOIN komentarfoto ON foto.fotoid = komentarfoto.fotoid JOIN user ON foto.userid = user.userid GROUP BY foto.fotoid");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <div class="photo-box">
                <img src="gambar/<?=$data['lokasifile']?>" alt="<?=$data['judulfoto']?>">
                <div class="overlay">
                    <a href="like.php?fotoid=<?=$data['fotoid']?>">Like</a>
                    <a href="komentar.php?fotoid=<?=$data['fotoid']?>">Komentar</a>
                </div>
                <div class="photo-info">
                    <p><?=$data['namalengkap']?></p>
                    <p>Likes: <?=$data['jumlah_like']?></p>
                    <p>Comments: <?=$data['jumlah_komentar']?></p>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
</body>
</html>