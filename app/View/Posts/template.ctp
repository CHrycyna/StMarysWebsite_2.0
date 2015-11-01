<!--=== Breadcrumbs ===-->
<div class="breadcrumbs">
	<div class="container">
		<h1 class="pull-left"><?php echo $this->fetch('blogTitle'); ?></h1>
        <ul class="pull-right breadcrumb">
        	<li><a href="/">Home</a></li>
        	<?php 
        		$breadcrumbs = $this->fetch('blogBreadcrumbs');
        		if(strcmp($breadcrumbs, 'Blog') == 0) :
        	?>
        		<li class="active"><?php echo $breadcrumbs; ?></li>
        	<?php else : ?>
            	<li><?php echo $this->Html->link('Blog', array('controller' => 'posts', 'action' => 'index'))?></li>
         		<li class="active"><?php echo $breadcrumbs; ?></li>
         	<?php endif;?>
      	</ul>
    </div>
</div>
<!--/breadcrumbs-->

<div class="container content">
	<div class="row">
		<div class="col-md-9">
			<?php echo $this->fetch('blogContent'); ?>
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
<!--=== End Breadcrumbs ===-->
<?php $this->Html->script('posts.js', array('inline' => false));?>
<?php 
$this->Html->scriptStart(array('inline' => false));

echo "jQuery(document).ready(function() {
	Blog.template();
});";

$this->Html->scriptEnd();
?>