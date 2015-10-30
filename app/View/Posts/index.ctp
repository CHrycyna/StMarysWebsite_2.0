<?php $this->Html->css('pages/blog_masonry_3col.css', array('inline' => false));?>

<div class="breadcrumbs">
	<div class="container">
    	<h1 class="pull-left">Blog</h1>
        <ul class="pull-right breadcrumb">
        	<li><a href="/">Home</a></li>
            <li class="active">Blog</li>
        </ul>
   	</div><!--/container-->
</div>

<div class="container content">
	<div class="row">
		<div class="col-md-9">
			<div class="blog_masonry_3col">
				<div id="grid" class="grid-boxes masonry"></div>
			</div>
		</div>
		<div class="col-md-3">
        	<!-- Trending -->
			<div class="headline-v2 bg-color-light"><h2>Trending</h2></div>
            <ul id="trendingPosts" class="list-unstyled blog-trending margin-bottom-50"></ul>
            <!-- End Trending -->

			<!-- Tags v2 -->
            <div class="headline-v2 bg-color-light"><h2>Tags</h2></div>
            <ul id="randomTags" class="list-inline tags-v2 margin-bottom-50"></ul>
            <!-- End Tags v2 -->

			<!-- Photostream -->
            <div class="headline-v2 bg-color-light"><h2>Photostream</h2></div>
            <ul id="photostream" class="list-inline blog-photostream margin-bottom-50"></ul>
            <!-- End Photostream -->
        </div>
	</div>
</div>

<?php $this->Html->script('plugins/masonry/jquery.masonry.min.js', array('inline' => false));?>
<?php $this->Html->script('pages/blog-masonry.js', array('inline' => false));?>
<?php $this->Html->script('plugins/style-switcher.js', array('inline' => false));?>
<?php $this->Html->script('posts.js', array('inline' => false));?>
<?php 
$this->Html->scriptStart(array('inline' => false));

echo "jQuery(document).ready(function() {
	Api({
		api: 1.0,
		type: 'POST',
		controller: 'posts',
		method: 'get',
		callback: indexMasonry,
	});
	Api({
		api: 1.0,
		type: 'POST',
		data: { nbImages: 9},
		controller: 'posts',
		method: 'recentImages',
		callback: recentImages,
	});
	Api({
		api: 1.0,
		type: 'POST',
		data: { nbPosts: 3 },
		controller: 'posts',
		method: 'trendingPosts',
		callback: trendingPosts
	});
	Api({
		api: 1.0,
		type: 'POST',
		data: { nbTags: 10 },
		controller: 'posts',
		method: 'randomTags',
		callback: randomTags
	});
});";

$this->Html->scriptEnd();

?>


