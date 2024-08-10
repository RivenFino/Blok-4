<?php

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

$button = "Perbarui";
$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id = '$user_id'");
$row = mysqli_fetch_assoc($queryUser);

$nama   = $row['nama'];
$email  = $row['email'];
$phone  = $row['phone'];
$alamat = $row['alamat'];
$status = $row['status'];
$level  = $row['level'];


?>

<form action="<?php echo BASE_URL . "module/user/action.php?user_id=$user_id"; ?>" method="post" require>
    <div class="element-form">
        <label for="">Nama</label>
        <span>
            <input type="text" name="nama" value="<?php echo $nama; ?>">
        </span>
    </div>
    <div class="element-form">
        <label for="">Email</label>
        <span>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </span>
    </div>
    <div class="element-form">
        <label for="">Phone</label>
        <span>
            <input type="number" name="phone" value="<?php echo $phone; ?>">
        </span>
    </div>
    <div class="element-form">
        <label for="">Alamat</label>
        <span>
            <textarea name="alamat"><?php echo $alamat; ?></textarea>
        </span>
    </div>
    <div class="element-form">
        <label for="">Level</label>
        <span>
            <input type="radio" name="level" value="superadmin" <?php if ($level == "superadmin") {
                                                                    echo "checked";
                                                                } ?>> Superadmin
            <input type="radio" name="level" value="customer" <?php if ($level == "customer") {
                                                                    echo "checked";
                                                                } ?>> Customer
        </span>
    </div>
    <div class="element-form">
        <label for="">Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if ($status == "on") {
                                                                echo "checked";
                                                            } ?>> On
            <input type="radio" name="status" value="off" <?php if ($status == "off") {
                                                                echo "checked";
                                                            } ?>> Off
        </span>
    </div>

    <div class="element-form">
        <span>
            <input type="submit" name="button" value="<?php echo $button; ?>">
        </span>
    </div>
</form>