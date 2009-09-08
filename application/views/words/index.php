<?php include('layout/header.php'); ?>
<div align="center"><?=display_flash('message')?></div>
<h1>All Words</h1>
	<?php if(!empty($words)): ?>
		<ul id="sortable">
		<?php foreach($words as $word): ?>
			<li class="ui-state-default" id="<?=$word->id?>">
				<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
				<div class="word_manage"><?=anchor('words/edit/'.$word->id,'EDIT')?> | <?=anchor('words/delete/'.$word->id,'DELETE')?></div>
				<div class="word_title" style="color:<?=$word->color?>"><?=$word->title?></div>
			</li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
<br/><br/>
<div style="text-align:center;width:30%;">
<?=form_open('words/changeOrder',array('id'=>'orderform'))?>
<input type="hidden" id="sequence_ids" name="sequence_ids" value=""/>
<input type="submit" id="submitOrder" name="submit" value="Save"/>
<?=form_close()?>
</div>

<?php include('layout/footer.php'); ?>