<?php
$conn = mysqli_connect("localhost", "root", "", "psb_online_9");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return  $rows;
}

function signup($data)
{
  global $conn;

  $username = htmlspecialchars(strtolower(stripslashes($data['username'])));
  $email = htmlspecialchars($data['email']);
  $password = mysqli_real_escape_string($conn, $data['password']);
  $confirm_password = mysqli_real_escape_string($conn, $data['confirm_password']);

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "
    <script>
      alert('Username Tidak Tersedia');
    </script>
    ";
    return false;
  }

  if ($password !== $confirm_password) {
    echo "
    <script>
      alert('Confirm Password Tidak Sesuai');
    </script>
    ";
    $errConfirm = 'Confirm Password Tidak Sesuai';
    return false;
  }

  // if (strlen($password) < 8) {
  //   return false;
  // }

  $password = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO users(username,email,password) VALUES ('$username','$email', '$password')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function tambah_biodata($data)
{
  global $conn;

  $fullname = htmlspecialchars($data['fullname']);
  $nisn =  htmlspecialchars($data['nisn']);
  $alamat =  htmlspecialchars($data['alamat']);
  $jenis_kelamin =  htmlspecialchars($data['jenis_kelamin']);
  $agama =  htmlspecialchars($data['agama']);
  $tempat_lahir =  htmlspecialchars($data['tempat_lahir']);
  $tgl_lahir =  htmlspecialchars($data['tgl_lahir']);
  $asal_sekolah =  htmlspecialchars($data['asal_sekolah']);
  $no_telp =  htmlspecialchars($data['no_telp']);
  $nama_ortu =  htmlspecialchars($data['nama_ortu']);
  $user_id =  htmlspecialchars($data['user_id']);

  $query = "INSERT INTO biodata VALUES ('','$fullname', '$nisn', '$alamat', '$jenis_kelamin', '$agama', '$tempat_lahir', 
            '$tgl_lahir', '$asal_sekolah', '$no_telp',
            '$nama_ortu', '$user_id')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function tambah_pendaftaran($data)
{
  global $conn;

  $queryRes = "SELECT max(id_pendaftaran) as maxKode From pendaftaran";
  $result = mysqli_query($conn, $queryRes);
  $row = mysqli_fetch_assoc($result);

  $maxKode = $row['maxKode'];
  $i = (int) substr($maxKode, 4, 3);
  $i++;
  $char = '2021';
  $resKode = $char . sprintf('%03s', $i);

  $jurusan_id = htmlspecialchars($data['jurusan_id']);
  $nilai_mtk = htmlspecialchars($data['nilai_mtk']);
  $nilai_ipa = htmlspecialchars($data['nilai_ipa']);
  $nilai_ing = htmlspecialchars($data['nilai_ing']);
  $nilai_ind = htmlspecialchars($data['nilai_ind']);
  $nilai_ind = htmlspecialchars($data['nilai_ind']);
  $tgl_pend = date('Y-m-d');
  $user_id = htmlspecialchars($data['user_id']);

  $ijazah = upload_pdf();
  if (!$ijazah) {
    return false;
  }

  $query = "INSERT INTO pendaftaran (id_pendaftaran,jurusan_id, nilai_mtk, nilai_ipa, nilai_ing, nilai_ind, ijazah, tgl_pend ,user_id) VALUES
            ('$resKode','$jurusan_id', '$nilai_mtk', '$nilai_ipa', '$nilai_ing', '$nilai_ind',
            '$ijazah', '$tgl_pend' ,'$user_id')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function update_status($data)
{
  global $conn;

  $id_pendaftaran = $data['id_pendaftaran'];
  $status = $data['status'];

  $query = "UPDATE pendaftaran SET status_id = '$status' WHERE id_pendaftaran = '$id_pendaftaran'";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function update_biodata($data)
{
  global $conn;

  $fullname = htmlspecialchars($data['fullname']);
  $nisn = htmlspecialchars($data['nisn']);
  $alamat = htmlspecialchars($data['alamat']);
  $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
  $agama = htmlspecialchars($data['agama']);
  $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
  $asal_sekolah = htmlspecialchars($data['asal_sekolah']);
  $no_telp = htmlspecialchars($data['no_telp']);
  $nama_ortu = htmlspecialchars($data['nama_ortu']);
  $user_id = htmlspecialchars($data['user_id']);

  $query = "UPDATE biodata SET fullname='$fullname', nisn='$nisn', alamat='$alamat', jenis_kelamin='$jenis_kelamin', agama = '$agama',
            tempat_lahir='$tempat_lahir', asal_sekolah='$asal_sekolah', no_telp='$no_telp', nama_ortu='$nama_ortu' 
            WHERE user_id = '$user_id'";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function update_pendaftaran($data)
{
  global $conn;

  $jurusan_id = htmlentities($data['jurusan_id']);
  $nilai_mtk = htmlspecialchars($data['nilai_mtk']);
  $nilai_ipa = htmlspecialchars($data['nilai_ipa']);
  $nilai_ing = htmlspecialchars($data['nilai_ing']);
  $nilai_ind = htmlspecialchars($data['nilai_ind']);
  $user_id = $data['user_id'];

  $ijazah_lama = $data['ijazah_lama'];
  if ($_FILES['ijazah']['error'] === 4) {
    $ijazah = $ijazah_lama;
  } else {
    $ijazah = upload_pdf();
  }

  $query = "UPDATE pendaftaran SET jurusan_id = '$jurusan_id', nilai_mtk='$nilai_mtk', nilai_ipa='$nilai_ipa', 
            nilai_ing='$nilai_ing', nilai_ind='$nilai_ind', ijazah='$ijazah'
            WHERE user_id = '$user_id'";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function edit_user($data)
{
  global $conn;

  $id_user = $data['id_user'];
  $email = $data['email'];
  $old_image = $data['old_image'];
  if ($_FILES['image']['error'] === 4) {
    $image = $old_image;
  } else {
    $image = upload_img();
  }

  $query = "UPDATE users SET email='$email', image='$image' WHERE id_user = '$id_user'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function upload_img()
{
  $nameFile = $_FILES['image']['name'];
  $sizeFile = $_FILES['image']['size'];
  $error = $_FILES['image']['error'];
  $tmpName = $_FILES['image']['tmp_name'];

  if ($error === 4) {
    echo "
    <script>
      alert('Pilih File Terlebih Dahulu');
    </script>
    ";
    return false;
  }

  $ektensiFileValid = ['jpg', 'jpeg', 'png'];
  $ektensiFile = explode('.', $nameFile);
  $ektensiFile = strtolower(end($ektensiFile));
  if (!in_array($ektensiFile, $ektensiFileValid)) {
    echo "
    <script>
      alert('Yang Anda Upload Bukan Image!!');
    </script>
    ";
  }

  if ($sizeFile > 10000000) {
    echo "
    <script>
      alert('File Terlalu Besar');
    </script>
    ";
  }

  $newNameFile = uniqid();
  $newNameFile .= '.';
  $newNameFile .= $ektensiFile;

  // $destination_path = getcwd() . DIRECTORY_SEPARATOR . '../file/image/';
  // $target_path = $destination_path . basename($newNameFile);

  move_uploaded_file($tmpName, '../file/img/' . $newNameFile);

  return $newNameFile;
}

function upload_pdf()
{
  $nameFile = $_FILES['ijazah']['name'];
  $sizeFile = $_FILES['ijazah']['size'];
  $error = $_FILES['ijazah']['error'];
  $tmpName = $_FILES['ijazah']['tmp_name'];

  if ($error === 4) {
    echo "
    <script>
      alert('Pilih File Terlebih Dahulu');
    </script>
    ";
    return false;
  }

  $ektensiFileValid = ['pdf'];
  $ektensiFile = explode('.', $nameFile);
  $ektensiFile = strtolower(end($ektensiFile));
  if (!in_array($ektensiFile, $ektensiFileValid)) {
    echo "
    <script>
      alert('Yang Anda Upload Bukan PDF!!');
    </script>
    ";
  }

  if ($sizeFile > 1000000) {
    echo "
    <script>
      alert('File Terlalu Besar');
    </script>
    ";
  }

  $newNameFile = uniqid();
  $newNameFile .= '.';
  $newNameFile .= $ektensiFile;

  $destination_path = getcwd() . DIRECTORY_SEPARATOR . '../file/pdf/';
  $target_path = $destination_path . basename($newNameFile);

  move_uploaded_file($tmpName, $target_path);

  return $newNameFile;
}

function tambah_jurusan($data)
{
  global $conn;

  $nama_jurusan = $data['nama_jurusan'];

  $query = "INSERT INTO jurusan VALUES ('', '$nama_jurusan')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
function tambah_level($data)
{
  global $conn;

  $nama_level = $data['nama_level'];

  $query = "INSERT INTO level VALUES ('', '$nama_level')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
function tambah_status($data)
{
  global $conn;

  $nama_status = $data['nama_status'];

  $query = "INSERT INTO status VALUES ('', '$nama_status')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
