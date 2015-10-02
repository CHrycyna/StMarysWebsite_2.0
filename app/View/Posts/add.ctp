<?php $this->Html->css('plugins/bootstrap3-wysiwyg/bootstrap3-wysiwyg.min.css', array('inline' => false));?>

<div class="breadcrumbs">
	<div class="container">
    	<h1 class="pull-left">New Post</h1>
        <ul class="pull-right breadcrumb">
        	<li><a href="/">Home</a></li>
            <li><?php echo $this->Html->link('Blog', array('controller' => 'posts', 'action' => 'index'))?></li>
        	<li class="active">New Post</li>
        	
        </ul>
   	</div><!--/container-->
</div>
<div class="container content">
<h1>Add New Post</h1>
<?php 
echo $this->Form->create('Post');
echo $this->Form->input('title', array(
		'div' => 'form-group',
		'class' => 'form-control',
));
echo $this->Form->textarea('body', array('class' => 'form-control', 'rows' => 20)); ?>

<?php 
echo $this->Form->submit('Save Post', array(
		'class' => 'btn-u rounded btn-u-dark-blue'		
));
echo $this->Form->end();

echo $this->Html->script('plugins/bootstrap3-wysiwyg/bootstrap3-wysihtml5.all.min.js', array('inline' => false));
echo $this->Html->script('plugins/bootstrap3-wysiwyg/bootstrap3-wysiwyg.min.js', array('inline' => false));


$this->Html->scriptStart(array('inline' => false));

echo "$('#PostBody').wysihtml5();";

$this->Html->scriptEnd();
?>
</div>