<?php $this->extend('/Posts/template');?>
<?php $this->Html->css('pages/blog_masonry_3col.css', array('inline' => false)); ?>
<?php $this->assign('blogTitle', $tag); ?>
<?php $this->assign('blogBreadcrumbs', $tag)?>

<?php $this->start('blogContent'); ?>
<?php echo $this->element('MasonryBlog'); ?>
<?php $this->end();?>
<?php $this->Html->script('plugins/masonry/jquery.masonry.min.js', array('inline' => false));?>
<?php $this->Html->script('pages/blog-masonry.js', array('inline' => false));?>
<?php 
$this->Html->scriptStart(array('inline' => false));
echo "jQuery(document).ready(function() {
	Blog.init();
});";
$this->Html->scriptEnd();
?>
