<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  Integrated Web system                                      *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: osorio2380@yahoo.es                                            *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************

  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
?>

<?php include 'head_user.php'; ?>

<?php switch(Filter::$action): case "edit": ?>
<?php $row = Core::getRowById(Core::nTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-news1'] ?><span><?php echo $lang['tools-news2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row->title;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="title" value="<?php echo $row->title;?>" placeholder="<?php echo $lang['tools-news3'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-news3'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input">
										<input type="text" name="author" value="<?php echo $row->author;?>" placeholder="<?php echo $lang['tools-news4'] ?>">
									</label>
									<div class="note"><?php echo $lang['tools-news4'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-prepend icon-calendar"></i> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="created" value="<?php echo $row->created;?>" id="datepicker-autoclose" placeholder="<?php echo $lang['tools-news5'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-news5'] ?></div>
								</section>
								<section class="col col-6">
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="active" value="1" <?php getChecked($row->active, 1); ?>>
											<i></i><?php echo $lang['tools-news6'] ?></label>
										<label class="radio">
											<input type="radio" name="active" value="0" <?php getChecked($row->active, 0); ?>>
											<i></i><?php echo $lang['tools-news7'] ?></label>
									</div>
									<div class="note"><?php echo $lang['tools-news8'] ?></div>
								</section>
							</div>
							<section>
								<div id="editor">
									<textarea name="body" id="summernote"  placeholder="Type some text">
										<?php echo $row->body;?>
									</textarea>
								</div>
							</section>
							<footer>
							<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-news9'] ?><span><i class="icon-ok"></i></span></button>
								<a href="user.php?do=news" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-news10'] ?></a> 
							</footer>
							<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>							
<?php echo Core::doForm("processNews");?> 
<script type="text/javascript">
  $(document).ready(function() {
    $("#date").datepicker({
        dateFormat: 'yy-mm-dd'
    });
});
</script>
<?php break;?>
<?php case "add":?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<form class="xform" id="admin_form" method="post">
							<header><?php echo $lang['tools-news11'] ?><span><?php echo $lang['tools-news12'] ?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="title" placeholder="News Title">
									</label>
									<div class="note note-error"><?php echo $lang['tools-news13'] ?></div>
								</section>
								<section class="col col-6">
									<label class="input">
										<input type="text" name="author" placeholder="<?php echo $lang['tools-news14'] ?>">
									</label>
									<div class="note"><?php echo $lang['tools-news14'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-prepend icon-calendar"></i> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="created" value="<?php echo date('Y-m-d');?>" id="datepicker-autoclose" placeholder="<?php echo $lang['tools-news5'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['tools-news5'] ?></div>
								</section>
								<section class="col col-6">
									<div class="inline-group">
										<label class="radio">
											<input name="active" type="radio" value="1" checked="checked" >
											<i></i><?php echo $lang['tools-news6'] ?></label>
										<label class="radio">
										<input type="radio" name="active" value="0" >
										<i></i><?php echo $lang['tools-news7'] ?></label>
									</div>
									<div class="note"><?php echo $lang['tools-news8'] ?></div>
								</section>
							</div>
							<section>
								<div id="editor">
									<textarea name="body" id="summernote"  placeholder="Type some text">
										
									</textarea>
								</div>
							</section>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['tools-news15'] ?><span><i class="icon-ok"></i></span></button>
								<a href="user.php?do=news" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-news10'] ?></a> 
							</footer>
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processNews");?> 
<script type="text/javascript">
  $(document).ready(function() {
    $("#date").datepicker({
        dateFormat: 'yy-mm-dd'
    });
});
</script>
<?php break;?>
<?php default: ?>
<?php $newsrow = $core->getNews();?>
<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th><b><?php echo $lang['tools-news16'] ?></th>
										<th class="text-center"><b><?php echo $lang['tools-news17'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-news18'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-news19'] ?></b></th>
									</tr>
								</thead>
								<div class="m-t-0">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="user.php?do=news&amp;action=add"><button id="demo-btn-addrow" class="btn btn-secondary btn-sm"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['tools-news20'] ?></button></a> 
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php if(!$newsrow):?>
									<tr>
										<td colspan="3">
										<?php echo "
										<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
										",false;?>
										</td>
									</tr>
									<?php else:?>
									<?php foreach ($newsrow as $row):?>
									<tr>
										<td><?php echo $row->title;?></td>
										<td class="text-center"><?php echo $row->cdate;?></td>
										<td class="text-center"><?php echo $row->author;?></td>
										<td class="text-center">
											<a href="user.php?do=news&amp;action=edit&amp;id=<?php echo $row->id;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-news21'] ?>"><i class="ti-pencil" aria-hidden="true"></i></button></a> 
											<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->title;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-news22'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
										</td>
									</tr>
									<?php endforeach;?>
									<?php unset($row);?>
									<?php endif;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doDelete("Delete News","deleteNews");?>
<?php break;?>
<?php endswitch;?>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>