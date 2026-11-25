<?php
require_once ("koneksi.php");

$sql = "SELECT id, no_anggota, nama_lengkap, email, no_hp, jenis_anggota, alamat from anggota";

$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota Perpustakaan</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
        }
        .inline {
            display: inline;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nomor Anggota</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Nomor HP</th>
            <th>Jenis Anggota</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($hasil)) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($row['no_anggota']); ?></td>
            <td><?php echo htmlspecialchars($row['nama_lengkap']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['no_hp']); ?></td>
            <td><?php echo htmlspecialchars($row['jenis_anggota']); ?></td>
            <td><?php echo htmlspecialchars($row['alamat']); ?></td>
            <td>
                <a href="detail.php?id=<?php echo (int) $row["id"]; ?>">Detail</a>
                <form class="inline" action="hapus.php" method="post"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    <input type="hidden" name="id" value="<?php echo (int) $row["id"]; ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php mysqli_free_result($hasil); ?>
</body>
</html>