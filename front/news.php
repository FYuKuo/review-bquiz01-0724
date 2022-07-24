<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">

	<?php
	include('./layout/maquee.php');
	$num = $News->math('COUNT', ['sh' => 1]);
	$limit = 5;
	$pages = ceil($num / $limit);
	$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
	if ($page > $pages || $page <= 0) {
		$page = 1;
	}
	$start = ($page - 1) * $limit;
	$limitSql = " Limit $start,$limit";
	?>

	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<div style="text-align:center;">
		<ol class="ssaa" style="list-style-type:decimal;" start="<?= $start + 1 ?>">
			<?php
			$news = $News->all(['sh' => 1], $limitSql);
			foreach ($news as $key => $new) {
			?>
				<li style="margin: 5px 0;">
					<?= mb_substr($new['text'], 0, 30) ?>
					<div class="all" style="display: none;"><?= $new['text'] ?>
					</div>
				</li>
			<?php
			}
			?>

		</ol>
		<div class="page cent bl">
			<?php
			if ($page > 1) {
			?>
				<a href="?do=<?= $do ?>&page=<?= $page - 1 ?>">
					&lt;
				</a>
			<?php
			}
			for ($i = 1; $i <= $pages; $i++) {
			?>
				<a href="?do=<?= $do ?>&page=<?= $i ?>" class="<?= ($page == $i) ? 'nowPgae' : '' ?>">
					<?= $i ?>
				</a>
			<?php
			}
			if ($page < $pages) {
			?>
				<a href="?do=<?= $do ?>&page=<?= $page + 1 ?>">
					&gt;
				</a>
			<?php
			}
			?>
		</div>
	</div>
	<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
	<script>
		$(".ssaa li").hover(
			function() {
				$("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
				$("#altt").show()
			}
		)
		$(".ssaa li").mouseout(
			function() {
				$("#altt").hide()
			}
		)
	</script>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			console.log('12');
			$("#alt").html("" + $(this).children(".all").html() + "").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>