<?php $this->start('slider');?>

<div data-ride="carousel" class="carousel slide" id="myCarousel">

<?php $banners = $this->requestAction('/banners/index'); ?>

<ol class="carousel-indicators">
<?php $i= 0; foreach ($banners as $banner):?>
	<li class="<?php echo ($banner['Banner']['default'])?"active":""?>" data-slide-to="<?php echo "$i";?>" data-target="#myCarousel"></li>
<?php $i++; endforeach;?>
</ol>

<div class="carousel-inner">
<?php $i = 1; foreach ($banners as $banner):?>
		<div class="item<?php echo ($banner['Banner']['default'])?" active":""?>">
			
			<?php 
			
			if (file_exists('upload/banner/'.$banner['Banner']['id'] .'_background.jpg')){
				echo '<img alt="'.$i.' slide" src="'. $this->webroot.'upload/banner/'.$banner['Banner']['id'] .'_background.jpg">';
			}elseif(!empty($banner['Banner']['back_image_base'])){
				echo '<img alt="'.$i.' slide" src="'. $banner['Banner']['back_image_base'] .'">';
			}
			
			?>
			
			<div class="container">
				<div class="carousel-caption">
					<h1>
					<?php if (file_exists('upload/banner/'.$banner['Banner']['id'] .'_logo.jpg')){
				echo '<img width="100" src="'. $this->webroot.'/upload/banner/'.$banner['Banner']['id'] .'_logo.jpg">';
				}
				echo $banner['Banner']['name'];?></h1>
					<br> <br>
					<p><?php echo $banner['Banner']['description'];?></p>
					<p>
						<?php echo $this->Html->link($banner['Banner']['button_text'], $banner['Banner']['button_url'], array('class'=>'btn btn-lg btn-primary'));?>
						&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $banner['Banner']['button_side_text'];?>
					</p>
				</div>
			</div>
		</div>
<?php $i++; endforeach;?>
	</div>
<a data-slide="prev" role="button" href="#myCarousel" class="left carousel-control"><span class="glyphicon glyphicon-chevron-left"></span> </a> 
	<a data-slide="next" role="button" href="#myCarousel" class="right carousel-control"><span class="glyphicon glyphicon-chevron-right"></span> </a>
</div>
<?php

/*
 		<div class="item">
			<img alt="First slide" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgmJ/9HwADtwIKgdCwmAAAAABJRU5ErkJggg==">
			<div class="container">
				<div class="carousel-caption">
					<h1>Another example headline.</h1>
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.
						Donec id elit non mi porta gravida at eget metus. Nullam id dolor
						id nibh ultricies vehicula ut id elit.</p>
					<p>
						<a role="button" href="#" class="btn btn-lg btn-primary">Learn
							more</a>
					</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img alt="Second slide"
				src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWMo6JjwHwAFfAKILCuYsQAAAABJRU5ErkJggg==">
			<div class="container">
				<div class="carousel-caption">
					<h1>One more for good measure.</h1>
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.
						Donec id elit non mi porta gravida at eget metus. Nullam id dolor
						id nibh ultricies vehicula ut id elit.</p>
					<p>
						<a role="button" href="#" class="btn btn-lg btn-primary">Browse
							gallery</a>
					</p>
				</div>
			</div>
		</div>

 */

$this->end();?>
