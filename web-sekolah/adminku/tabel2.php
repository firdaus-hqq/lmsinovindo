<?php
if (isset($_SESSION['idsiswa'])) {
    $id_siswa = $_SESSION['idsiswa'];
    $sql = "SELECT * FROM tugas WHERE id_siswa = '$id_siswa' order by id_file desc";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $tugas = $result->fetch_array();
    }
}

$listTugas = $mysqli->query($sql);
?>

<div class="box box-warning">
    <div class='box-header with-border'>
        <div class="table-responsive">
            <p align='left'><a href='tambahtugas.php' role='button' class='btn btn-warning'>Tambah Tugas</a></p>
            <p>
            <h2>Edit Tugas</h2>
            </p>
            <table id='example1' class='table table-bordered table-striped'>
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
                            <td class="mailbox-date"><a target="_blank" href="tugas/link/<?= $tugas['file'] ?>"><?= $tugas['link'] ?></a></td>
                            <td>
                                <a href="../adminku/edit.php?id_file=<?= $tugas['id_file']; ?>"><button class="btn btn-info">Edit</button></a>

                                <button class="btn btn-danger" onclick="confirm('Yakin ingin menghapus tugas ini?') ? window.location.href='delete.php?id_file=<?= $tugas['id_file'] ?>':''">Hapus</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- /.table -->
        </div>
    </div>
</div>