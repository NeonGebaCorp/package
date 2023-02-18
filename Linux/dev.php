<!DOCTYPE html>
<html>
<head>
        <title>Form dengan Checkbox</title>
</head>
<body>
        <h1>Form dengan Checkbox</h1>

        <?php
        // jika tombol submit diklik
        if (isset($_POST['submit'])) {
                // ambil data dari form
                $nama = $_POST['nama'];
                $menu = $_POST['menu'];
                // ambil nilai checkbox
                $nilaiCheckbox = isset($_POST['checkbox']) ? 'Ya' : 'Tidak';

                // buka file untuk ditulis
                $file = fopen("data.txt", "a") or die("Tidak dapat membuka file!");
                // tulis data ke dalam file
                fwrite($file, "Nama: " . $nama . ", Menu: " . $menu . ", Checkbox: " . $nilaiCheckbox . "\n");
                // tutup file
                fclose($file);

                // tampilkan pesan sukses
                $output = shell_exec("docker run -d --hostname " . escapeshellarg($nama) . " " . escapeshellarg($menu));
                //$output = shell_exec('docker run -d --hostname  myimage');
                echo "<p>Data berhasil disimpan!</p>";
		echo $output;
        }
        ?>

        <form method="POST" action="">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" required><br><br>

                <label for="menu">Pilih Menu:</label>
                <select name="menu" id="menu" required>
                        <option value="">-- Pilih --</option>
                        <option value="agungsurya/vps:latest">Ubuntu 20.04</option>
                        <option value="agungsurya/vps:debian">Debian 10</option>
                        <option value="Alpine">Alpine</option>
                </select><br><br>

                <input type="checkbox" id="checkbox" name="checkbox" value="1">
                <label for="checkbox"> Setuju VPS Mengunakan Docker</label><br>
                <br>
                <input type="submit" name="submit" value="Simpan">
        </form>
</body>
</html>
