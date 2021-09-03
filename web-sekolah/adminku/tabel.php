<?php
if (isset($_SESSION['idsiswa'])) {
    $id_siswa = $_SESSION['idsiswa'];
    $sql = "SELECT * FROM tugas WHERE id_siswa = '$id_siswa' AND status='' order by id_file desc";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $tugas = $result->fetch_array();
    }
    $sql2 = "SELECT * FROM tugas WHERE id_siswa = '$id_siswa' AND status='konfirmasi' order by id_file desc";
    $result2 = $mysqli->query($sql2);
    if ($result2->num_rows > 0) {
        $tugas2 = $result2->fetch_array();
    }
    $sql3 = "SELECT * FROM tugas WHERE id_siswa = '$id_siswa' AND status='revisi' order by id_file desc";
    $result3 = $mysqli->query($sql3);
    if ($result3->num_rows > 0) {
        $tugas3 = $result3->fetch_array();
    }
}

$listTugas = $mysqli->query($sql);
$listKonfirmasi = $mysqli->query($sql2);
$listRevisi = $mysqli->query($sql3);
?>

<div class="box box-warning">
    <div class='box-header with-border'>
        <div class="table-responsive">
            <p align='left'><a href='tambahtugas.php' role='button' class='btn btn-warning'>Tambah Tugas</a></p>
            <p>
            <h2>Tugas Terkirim</h2>
            </p>
            <table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Dokumen</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($tugas = $listTugas->fetch_array()) {
                    ?>
                        <tr>
                            </td>
                            <td class="mailbox-name">
                                <?= $tugas['tanggal'] ?>
                            </td>
                            <td class="mailbox-date"><a target="_blank" href="tugas/<?= $tugas['file'] ?>"><?= $tugas['file'] ?></a></td>
                            <td class="mailbox-date"><a target="_blank" href="<?= $tugas['file'] ?>"><?= $tugas['link'] ?></a></td>
                            <td>
                                <a href="../adminku/edit.php?id_file=<?= $tugas['id_file']; ?>"><i class="fa fa-edit"></i></a>

                                <i class="fa fa-times-circle" style = "color:red;" onclick="confirm('Yakin ingin menghapus tugas ini?') ? window.location.href='delete.php?id_file=<?= $tugas['id_file'] ?>':''"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- /.table -->
        </div>
    </div>
</div>

<div class="box box-warning">
    <div class='box-header with-border'>
        <div class="table-responsive">
            <p>
            <h2>Tugas Diterima</h2>
            </p>
            <table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Dokumen</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($tugas = $listKonfirmasi->fetch_array()) {
                    ?>
                        <tr>
                            </td>
                            <td class="mailbox-name">
                                <?= $tugas['tanggal'] ?>
                            </td>
                            <td class="mailbox-date"><a target="_blank" href="tugas/<?= $tugas['file'] ?>"><?= $tugas['file'] ?></a></td>
                            <td class="mailbox-date"><a target="_blank" href="<?= $tugas['file'] ?>"><?= $tugas['link'] ?></a></td>
                            <td>
                                <a href="../adminku/edit.php?id_file=<?= $tugas['id_file']; ?>"><i class="fa fa-edit"></i></a>

                                <i class="fa fa-times-circle" style = "color:red;" onclick="confirm('Yakin ingin menghapus tugas ini?') ? window.location.href='delete.php?id_file=<?= $tugas['id_file'] ?>':''"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- /.table -->
        </div>
    </div>
</div>

<div class="box box-warning">
    <div class='box-header with-border'>
        <div class="table-responsive">
            <p>
            <h2>Tugas Direvisi</h2>
            </p>
            <table class='table table-bordered table-striped'>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Dokumen</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($tugas = $listRevisi->fetch_array()) {
                    ?>
                        <tr>
                            </td>
                            <td class="mailbox-name">
                                <?= $tugas['tanggal'] ?>
                            </td>
                            <td class="mailbox-date"><a target="_blank" href="tugas/<?= $tugas['file'] ?>"><?= $tugas['file'] ?></a></td>
                            <td class="mailbox-date"><a target="_blank" href="<?= $tugas['file'] ?>"><?= $tugas['link'] ?></a></td>
                            <td>
                                <a href="../adminku/edit.php?id_file=<?= $tugas['id_file']; ?>"><i class="fa fa-edit"></i></a>

                                <i class="fa fa-times-circle" style = "color:red;" onclick="confirm('Yakin ingin menghapus tugas ini?') ? window.location.href='delete.php?id_file=<?= $tugas['id_file'] ?>':''"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- /.table -->
        </div>
    </div>
</div>