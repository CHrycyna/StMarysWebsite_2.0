<?php $this->extend('/Posts/template'); ?>
<?php $this->assign('blogTitle', $post[0]['Post']['title']); ?>
<?php $this->assign('blogBreadcrumbs', $post[0]['Post']['title'])?>
<?php $this->start('blogContent'); ?>
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
<?php $this->end();?>



