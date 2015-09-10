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

<div class="blog_masonry_3col">
	<div class="container content grid-boxes masonry">
	    <?php foreach ($posts as $post): ?>
    	<div class="grid-boxes-in masonry-brick">
        	<img class="img-responsive" src="http://htmlstream.com/preview/unify-v1.8/assets/img/main/img3.jpg" alt="">
            <div class="grid-boxes-caption">
            	<h3><?php echo $this->Html->link($post['Post']['title'],
					array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></h3>
               	<ul class="list-inline grid-boxes-news">
                	<li><span>By</span> <a href="#">Kathy Reyes</a></li>
                    <li>|</li>
                    <li><i class="fa fa-clock-o"></i><?php echo $post['Post']['created']; ?></li>
                    <li>|</li>
                    <li><a href="#"><i class="fa fa-comments-o"></i> 06</a></li>
                </ul>                    
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        	</div>
    	</div>
    	<?php endforeach; ?>
    	<?php unset($post); ?>
	</div><!--/container-->
</div>

<?php $this->Html->script('pages/blog-masonry.js', array('inline' => false));?>
<?php $this->Html->script('plugins/style-switcher.js', array('inline' => false));?>