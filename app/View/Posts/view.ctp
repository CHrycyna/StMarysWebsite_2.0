<!--=== Breadcrumbs ===-->
<div class="breadcrumbs">
	<div class="container">
    	<h1 class="pull-left"><?php echo $post[0]['Post']['title']; ?></h1>
        <ul class="pull-right breadcrumb">
        	<li><a href="/">Home</a></li>
            <li><?php echo $this->Html->link('Blog', array('controller' => 'posts', 'action' => 'index'))?></li>
         	<li class="active"><?php echo $post[0]['Post']['title']; ?></li>
      	</ul>
    </div>
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<div class="container content">
	<div class="row">
		<div class="col-md-9">
			<!--=== Content Part ===-->
<div class="blog-page blog-item">		
    <!--Blog Post-->        
	<div class="blog margin-bottom-40">
        <?php if(isset($post[0]['Post']['media_type'])) :?>
        <div class="blog-img">
        	<img class="img-responsive full-width" src="/img/blog/<?php echo $post[0]['Post']['media']?>" alt="">
        </div>
        <?php endif; ?>
       	<h2><?php echo $post[0]['Post']['title']; ?></h2>
        <div class="blog-post-tags">
            <ul class="list-unstyled list-inline blog-info">
                <li><i class="fa fa-calendar"></i> <?php echo date("F j, Y",strtotime($post[0]['Post']['created'])); ?></li>
                <li><i class="fa fa-pencil"></i> <?php echo $this->Html->link($post[0]['User']['username'],
					array('controller' => 'posts', 'action' => 'author', $post[0]['User']['username'])); ?></li>
            	<?php if (isset($tags)) :?>
            	<li><i class="fa fa-tags"></i> 
            	<?php
            	$first = true;
            	foreach($tags as $tag) {
            		$tagLink = $this->Html->link($tag,
					array('controller' => 'posts', 'action' => 'tag', $tag));
               	
            		if($first)
            		{
            			echo $tagLink;
            			$first = false;
            		}
            		else
            		{
            			echo ", ".$tagLink;
            		}
            	}
            	?>
            	</li>
            	<?php endif; ?>
        	</ul>                    
        </div>
		<?php echo $post[0]['Post']['body']; ?>
	</div>
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

                <div class="headline-v2 bg-color-light"><h2>Latest Posts</h2></div>
                <!-- Latest Links -->
                <ul class="list-unstyled blog-latest-posts margin-bottom-50">
                    <li>
                        <h3><a href="#">The point of using Lorem Ipsum</a></h3>
                        <small>19 Jan, 2015 / <a href="#">Hi-Tech,</a> <a href="#">Technology</a></small>                            
                        <p>Phasellus ullamcorper pellentesque ex. Cras venenatis elit orci, vitae dictum elit egestas a. Nunc nec auctor mauris, semper scelerisque nibh.</p>
                    </li>
                    <li>
                        <h3><a href="#">Many desktop publishing packages...</a></h3>
                        <small>23 Jan, 2015 / <a href="#">Art,</a> <a href="#">Lifestyles</a></small>                            
                        <p>Integer vehicula sed justo ac dapibus. In sodales nunc non varius accumsan.</p>
                    </li>
                </ul>
                <!-- End Latest Links -->

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

