<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('user/do_upload');?>

<input type="file" name="1files" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>