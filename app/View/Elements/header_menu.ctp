<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<?php echo $this->Html->link("My CMS", '/', array('class'=>"navbar-brand")); ?>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

				<?php 
				
				$header_menus = $this->requestAction('/menus/header_menu');

				foreach ($header_menus as $key => $header_menu)
				{
					//print_r($this->request->params['pass']);
					//print_r($header_menu);
					echo '<li class="'.(($header_menu['Menu']['slug'] == '/'.$this->request->params['controller'].'/view/'.$this->request->params['pass'][0])?'active':'').'">';
					
					echo $this->Html->link($header_menu['Menu']['name'], $header_menu['Menu']['slug']);
					
					echo '</li>';
				}




				/*
				 * 				<li><a href="#">Home</a></li>
				<li class="active"><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
				data-toggle="dropdown">Dropdown <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
				<li><a href="#">Action</a></li>
				<li><a href="#">Another action</a></li>
				<li><a href="#">Something else here</a></li>
				<li class="divider"></li>
				<li><a href="#">Separated link</a></li>
				<li class="divider"></li>
				<li><a href="#">One more separated link</a></li>
				</ul></li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
				<li><a href="#">login</a></li>
				</ul>
				*/

				?>
			</ul>
				<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
				</form>		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
