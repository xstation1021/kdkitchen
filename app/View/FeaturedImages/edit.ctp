<?php echo $this->Form->create('Setting', array('method'=>'post')); ?>
<h4>Home</h4>
    <?php echo $this->Form->input('slider_img_1', array('style'=>'width:400px;')); ?>
    <?php echo $this->Form->input('slider_img_2', array('style'=>'width:400px;')); ?>
    <?php echo $this->Form->input('slider_img_3', array('style'=>'width:400px;')); ?>
    <?php echo $this->Form->input('slider_img_4', array('style'=>'width:400px;')); ?>
    <?php echo $this->Form->input('small_slider_img_1', array('style'=>'width:400px;')); ?>
    <?php echo $this->Form->input('small_slider_img_2', array('style'=>'width:400px;')); ?>
    <?php echo $this->Form->input('small_slider_img_3', array('style'=>'width:400px;')); ?>
    <?php echo $this->Form->input('small_slider_img_4', array('style'=>'width:400px;')); ?>
    <?php echo $this->Form->input('small_slider_img_5', array('style'=>'width:400px;')); ?>    
    <?php echo $this->Form->input('from_newyork', array('style'=>'width:400px;')); ?>

<h4>What is KD Kitchen</h4>
    <?php echo $this->Form->input('whatis_kd_img', array('style'=>'width:400px;')); ?>
    <?php echo $this->Form->input('whatis_kd_img_home', array('style'=>'width:400px;')); ?>

<h4>Instructor Training</h4>
    <?php echo $this->Form->input('instructor_training_img', array('style'=>'width:400px;')); ?>
    <?php echo $this->Form->input('instructor_training_img_home', array('style'=>'width:400px;')); ?>

<h4>Find KD Kitchen</h4>
    <?php echo $this->Form->input('find_kd_kitchen_img_home', array('style'=>'width:400px;')); ?>

<h4>Products</h4>
    <?php echo $this->Form->input('products_img', array('style'=>'width:400px;')); ?>
    <?php echo $this->Form->input('products_img_home', array('style'=>'width:400px;')); ?>
<?php echo $this->Form->end('save'); ?>
