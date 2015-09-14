<?php $this->Html->css('pages/blog_masonry_3col.css', array('inline' => false));?>

<div class="breadcrumbs">
	<div class="container">
    	<h1 class="pull-left">Blog</h1>
        <ul class="pull-right breadcrumb">
        	<li><a href="/">Home</a></li>
            <li><?php echo $this->Html->link('Blog', array('controller' => 'posts', 'action' => 'index'))?></li>
        	<li class="active"><?php echo $author; ?> </li>
        	
        </ul>
   	</div><!--/container-->
</div>

<div class="blog_masonry_3col">
	<div class="container content grid-boxes masonry">
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

<?php $this->Html->script('plugins/masonry/jquery.masonry.min.js', array('inline' => false));?>
<?php $this->Html->script('pages/blog-masonry.js', array('inline' => false));?>
<?php $this->Html->script('plugins/style-switcher.js', array('inline' => false));?>