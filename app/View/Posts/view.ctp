<!--=== Breadcrumbs ===-->
<div class="breadcrumbs">
	<div class="container">
    	<h1 class="pull-left"><?php echo h($post['Post']['title']); ?></h1>
        <ul class="pull-right breadcrumb">
        	<li><a href="/">Home</a></li>
            <li><a href="/posts">Blog</a></li>
         	<li class="active"><?php echo h($post['Post']['title']); ?></li>
      	</ul>
    </div>
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->
    
<!--=== Content Part ===-->
<div class="container content blog-page blog-item">		
    <!--Blog Post-->        
	<div class="blog margin-bottom-40">
        <?php if(isset($post['Post']['media_type'])) :?>
        <div class="blog-img">
        	<img class="img-responsive full-width" src="/img/blog/<?php echo $post['Post']['media']?>" alt="">
        </div>
        <?php endif; ?>
       	<h2><?php echo h($post['Post']['title']); ?></h2>
        <div class="blog-post-tags">
            <ul class="list-unstyled list-inline blog-info">
                <li><i class="fa fa-calendar"></i> <?php echo date("F j, Y",strtotime($post['Post']['created'])); ?></li>
                <li><i class="fa fa-pencil"></i> <?php echo $post['Post']['author']; ?></li>
            	<li><i class="fa fa-tags"></i> Technology, Education, Internet, Media</li>
        	</ul>                    
        </div>
		<?php echo h($post['Post']['body']); ?>
	</div>
</div>