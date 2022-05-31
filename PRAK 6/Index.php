<?php

    require('Koneksi.php');

    session_start();
    if(!isset($_SESSION['nomor_member'])) {
        header('Location: ErrorPage.php');
        exit;
    } else {
        // Show users the page
    }

    // write query for all books
    $sql = 'SELECT id_buku, judul_buku, penulis, penerbit, tahun_terbit FROM buku ORDER BY id_buku';
    $sql2 = 'SELECT id_member, nama_member, nomor_member, alamat, tgl_mendaftar FROM member ORDER BY id_member';
    $sql3 = 'SELECT id_peminjaman, tgl_pinjam, tgl_kembali FROM peminjaman ORDER BY id_peminjaman';


    // make query & get result
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    $result3 = mysqli_query($conn, $sql3);



    // fetch the resulting rows as an array
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $members = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    $borrow = mysqli_fetch_all($result3, MYSQLI_ASSOC);


    // free result from memory
    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_free_result($result3);


    //close connection
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>

    <h4 class="center grey-text">Books!</h4>

    <div class="container">
        <div class="row">

            <?php foreach($books as $book): ?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="codeSS/icons8-book-64.png" class="book">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($book['judul_buku']); ?></h6>
                            <div><?php echo htmlspecialchars($book['penulis']); ?></div>
                            <div><?php echo htmlspecialchars($book['penerbit']); ?></div>
                            <div><?php echo htmlspecialchars($book['tahun_terbit']); ?></div>
                        </div>
                        <div class="card-action right-align">
                            <a href="Buku.php?id=<?php echo $book['id_buku']?>" class="library-text">More Info</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

    <h4 class="center grey-text">Members</h4>

    <div class="container">
        <div class="row">

            <?php foreach($members as $member): ?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="codeSS/icons8-member-85.png" class="member">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($member['nama_member']); ?></h6>
                            <div><?php echo htmlspecialchars($member['nomor_member']); ?></div>
                            <div><?php echo htmlspecialchars($member['alamat']); ?></div>
                            <div><?php echo htmlspecialchars($member['tgl_mendaftar']); ?></div>
                        </div>
                        <div class="card-action right-align">
                            <a href="Member.php?id=<?php echo $member['id_member']?>" class="library-text">More Info</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

    <h4 class="center grey-text">Peminjaman</h4>

    <div class="container">
        <div class="row">

            <?php foreach($borrow as $peminjaman): ?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($peminjaman['tgl_pinjam']); ?></h6>
                            <div><?php echo htmlspecialchars($peminjaman['tgl_kembali']); ?></div>
                        </div>
                        <div class="card-action right-align">
                            <a href="Peminjaman.php?id=<?php echo $peminjaman['id_peminjaman']?>" class="library-text">More Info</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
    <?php include('templates/footer.php') ?>

</html>