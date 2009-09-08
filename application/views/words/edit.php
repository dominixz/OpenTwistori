<?php include('layout/header.php'); ?>

<?=form_open('words/update')?>
Edit a word : <input type="text" name="word_title" value="<?=$word->title?>" /><br/>
Color : <input type="text" name="color" id="color" value="<?=$word->color?>" /><br/>
<input type="hidden" name="word_id" value="<?=$word->id?>" />
<input type="submit" name="word_submit" value="Edit word" />
<?=form_close()?>
<div id="colorpicker"></div>
<?php include('layout/footer.php'); ?>