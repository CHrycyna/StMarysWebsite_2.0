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
				<div class="grid-boxes masonry">
				    <?php foreach ($posts as $post): ?>
			    	<div class="grid-boxes-in">
			    		<?php if(isset($post['Post']['media_type'])) :?>
			        	<img class="img-responsive" src="/img/blog/<?php echo $post['Post']['media']?>" alt="">
			            <?php endif; ?>
			            <div class="grid-boxes-caption">
			            	<h3><?php echo $this->Html->link($post['Post']['title'],
								array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></h3>
			               	<ul class="list-inline grid-boxes-news">
			                	<li><span>By</span> <?php echo $this->Html->link($post['User']['username'],
								array('controller' => 'posts', 'action' => 'author', $post['User']['username'])); ?></li>
			                    <li>|</li>
			                    <li><i class="fa fa-clock-o"></i> <?php echo date("F j, Y",strtotime($post['Post']['created'])); ?></li>
			                </ul>                    
			                <?php
			                if (strlen($post['Post']['body']) > 250)
			                	echo substr($post['Post']['body'], 0, 250) . "...";
			                else
			                	echo $post['Post']['body'];
			                ?>
			        	</div>
			    	</div>
			    	<?php endforeach; ?>
			    	<?php unset($post); ?>
				</div><!--/container-->
			</div>
		</div>
		<div class="col-md-3">
                <div class="headline-v2 bg-color-light"><h2>Trending</h2></div>
                <!-- Trending -->
                <ul class="list-unstyled blog-trending margin-bottom-50">
                <?php foreach($trending as $trend) :?>
                	<li>
                        <h3><?php echo $this->Html->link($trend['Post']['title'],
								array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?></h3>
                        <small>
                        	<?php echo date("F j, Y",strtotime($trend['Post']['created'])); ?> / 
                        	<a href="#">Hi-Tech,</a> <a href="#">Technology</a>
                        </small>
                    </li>
                <?php endforeach;; ?>
                <?php unset($trend); ?>
                </ul>
                <!-- End Trending -->

                <div class="headline-v2 bg-color-light"><h2>Tags</h2></div>
                <!-- Tags v2 -->
                <ul class="list-inline tags-v2 margin-bottom-50">
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Economy</a></li>
                    <li><a href="#">Sport</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Books</a></li>
                    <li><a href="#">Elections</a></li>
                    <li><a href="#">Flickr</a></li>
                    <li><a href="#">Politics</a></li>
                </ul>
                <!-- End Tags v2 -->

                <div class="headline-v2 bg-color-light"><h2>Photostream</h2></div>
                <!-- Photostream -->
                <ul class="list-inline blog-photostream margin-bottom-50">
                    <li>
                        <a href="assets/img/main/img22.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 1">
                            <span><img class="img-responsive" src="assets/img/main/img22.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img23.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 2">
                            <span><img class="img-responsive" src="assets/img/main/img23.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img4.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 3">
                            <span><img class="img-responsive" src="assets/img/main/img4.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img9.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 4">
                            <span><img class="img-responsive" src="assets/img/main/img9.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img25.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 5">
                            <span><img class="img-responsive" src="assets/img/main/img25.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img6.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 6">
                            <span><img class="img-responsive" src="assets/img/main/img6.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img20.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 7">
                            <span><img class="img-responsive" src="assets/img/main/img20.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img3.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 8">
                            <span><img class="img-responsive" src="assets/img/main/img3.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img7.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 9">
                            <span><img class="img-responsive" src="assets/img/main/img7.jpg" alt=""></span>
                        </a>
                    </li>                        
                </ul>
                <!-- End Photostream -->
            </div>
	</div>
</div>

<?php $this->Html->script('plugins/masonry/jquery.masonry.min.js', array('inline' => false));?>
<?php $this->Html->script('pages/blog-masonry.js', array('inline' => false));?>
<?php $this->Html->script('plugins/style-switcher.js', array('inline' => false));?>
<?php 
$this->Html->scriptStart(array('inline' => false));

echo "
function callback(response) {
	console.log('Response: ' + response);
};
		
jQuery(document).ready(function() {
	Api({
		api: 1.0,
		type: 'post',
		controller: 'posts',
		method: 'get',
		callback: callback,
	});
});";

$this->Html->scriptEnd();

?>


