<?php include('layout/header.php'); ?>
<div align="center"><?=display_flash('message')?></div>
<?=form_open('words/create')?>
Enter a word : <input type="text" name="word_title" /><br/>
Color : <input type="text" name="color" id="color" value="#123456" /><br/>
<input type="submit" name="word_submit" value="Add word" />
<?=form_close()?>
<div id="colorpicker"></div>
<?php include('layout/footer.php'); ?>