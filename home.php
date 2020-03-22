<style type="text/css">
	.kotak-berita{
		margin: 0 auto;
		width: 270px;
		padding: 10px;
	}

	.judul{
		font-size: 18px;
		font-weight: bold;
		text-align: left;
		background-color: #1495ef;
		color: #FFFFFF;
		padding: 5px;
		border-radius: 10px 10px 0 0;
	}

	.link-feed{
		text-align: left;
		padding: 5px;
		border: 1px solid #dedede;
	}
</style>
<?php 
	include('rssclass.php');
	$feedlist = new rss('https://www.kominfo.go.id/content/rss/laporan_isu_hoaks/');
	echo $feedlist->display(10,"kominfo")
?>