<?php if($fTipe == '0'){ ?>
    Insert profile user
    <form action="<?php echo base_url('rest_api?tipe=profile&auth=create') ?>" method="POST">
        <input type="text" name="user_nama" placeholder="Input Nama">
        <input type="text" name="user_email" placeholder="Input Email">
        <input type="text" name="user_nohp" placeholder="Input No Hp">
        <button type="submit">Submit</button>
    </form>

    Cek validasi email dan no hp
    <form action="<?php echo base_url('rest_api?tipe=profile&auth=validnomail') ?>" method="POST">
        <input type="text" name="user_nomail" placeholder="Input email / hp">
        <button type="submit">Submit</button>
    </form>

<?php 
    if(!empty($records)){
        echo $records->user_nama.'&nbsp;<a href="'.base_url('profile/test/'.md56($records->user_id)).'">Edit Data</a>';
    }
}else{
?>

    <form action="<?php echo base_url('rest_api?tipe=profile&auth=update&keys='.md56($records->user_id)); ?>" method="POST" enctype="multipart/form-data">
        Nama : <input value="<?php echo $records->user_nama; ?>" type="text" name="user_nama" placeholder="Input Nama"><br>
        Email : <input value="<?php echo $records->user_email; ?>" type="text" name="user_email" placeholder="Input Email"><br>
        Jenis Kelamin : <select name="user_jenmin"> 
            <option value=""></option>
            <option <?php echo ($records->user_jenmin == '0' ? 'selected' : '') ?> value="0">Pria</option>
            <option <?php echo ($records->user_jenmin == '1' ? 'selected' : '') ?> value="1">Wanita</option>
        </select><br>
        Tempat Lahir : <input value="<?php echo $records->user_temlahir; ?>" type="text" name="user_temlahir" placeholder="Input Tempat Lahir"><br>
        Tanggal Lahir : <input value="<?php echo $records->user_tgllahir; ?>" type="text" name="user_tgllahir" placeholder="Input Tanggal Lahir"><br>
        Golongan Darah : <input value="<?php echo $records->user_golrah; ?>" type="text" name="user_golrah" placeholder="Input Golongan Darah"><br>
        Rhesus : <select name="user_rhesus">
            <option value=""></option>
            <option <?php echo ($records->user_rhesus == '0' ? 'selected' : '') ?> value="0"> - </option>
            <option <?php echo ($records->user_rhesus == '1' ? 'selected' : '') ?> value="1"> + </option>
        </select><br>
        No HP : <input value="<?php echo $records->user_nohp; ?>" type="text" name="user_nohp" placeholder="Input No Hp"><br>
        Foto : <input type="file" name="user_foto" value="<?php echo $records->user_temlahir; ?>"><br>
        <button type="submit">Submit</button>
    </form>

<?php } ?>