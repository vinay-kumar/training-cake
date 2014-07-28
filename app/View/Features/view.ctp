<h1><?php echo h($feature['Feature']['name']); ?></h1>
<hr />
<div class="row">
	<div class="col-md-12">
		<div class="thumbnail">
			<img data-src="holder.js/600x300" alt="...">
			<div class="caption">
				<h3><?php echo (isset($feature['FeaturePage'][0]['Page']['name']))?($feature['FeaturePage'][0]['Page']['name']):''; ?></h3>
				<p>			<?php echo (isset($feature['FeaturePage'][0]['Page']['description']))?($feature['FeaturePage'][0]['Page']['description']):''; ?>...</p>
				<p>
					<a href="#" class="btn btn-primary" role="button">Button</a> <a
						href="#" class="btn btn-default" role="button">Button</a>
				</p>
			</div>
		</div>
	</div>
</div>
<hr />

<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img data-src="holder.js/300x300" alt="...">
			<div class="caption">
				<h3><?php echo (isset($feature['FeaturePage'][1]['Page']['name']))?($feature['FeaturePage'][1]['Page']['name']):''; ?></h3>
							<p>			<?php echo (isset($feature['FeaturePage'][1]['Page']['description']))?($feature['FeaturePage'][2]['Page']['description']):''; ?>...</p>
				<p>
					<a href="#" class="btn btn-primary" role="button">Button</a> <a
						href="#" class="btn btn-default" role="button">Button</a>
				</p>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img data-src="<?php echo $this->webroot;?>/js/holder.js/300x300"
				alt="...">
			<div class="caption">
				<h3><?php echo (isset($feature['FeaturePage'][2]['Page']['name']))?($feature['FeaturePage'][2]['Page']['name']):''; ?></h3>
							<p><?php echo (isset($feature['FeaturePage'][1]['Page']['description']))?($feature['FeaturePage'][1]['Page']['description']):''; ?>...</p>
				<p>
					<a href="#" class="btn btn-primary" role="button">Button</a> <a
						href="#" class="btn btn-default" role="button">Button</a>
				</p>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img data-src="holder.js/300x300" alt="...">
			<div class="caption">
				<h3><?php echo (isset($feature['FeaturePage'][3]['Page']['name']))?($feature['FeaturePage'][3]['Page']['name']):''; ?></h3>
							<p>	<?php echo (isset($feature['FeaturePage'][3]['Page']['description']))?($feature['FeaturePage'][3]['Page']['description']):''; ?>...	</p>
				<p>
					<a href="#" class="btn btn-primary" role="button">Button</a> <a
						href="#" class="btn btn-default" role="button">Button</a>
				</p>
			</div>
		</div>
	</div>
</div>
<?php //debug($feature); ?>
<?php

$this->start ( 'script_bottom' );
echo $this->Html->script ( 'holder' );
$this->end ();
?> 