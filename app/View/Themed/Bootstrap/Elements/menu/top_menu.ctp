<?php $current_page = strtolower($this->viewPath); ?>


<style type="text/css" media="screen">
	.search-area{
		position:relative;
	}
	.search-area .results{
		-moz-box-shadow: 0px 1px 3px 0px #656565;
		-webkit-box-shadow: 0px 1px 3px 0px #656565;
		-o-box-shadow: 0px 1px 3px 0px #656565;
		box-shadow: 0px 1px 3px 0px #656565;
		filter:progid:DXImageTransform.Microsoft.Shadow(color=#656565, Direction=180, Strength=3);
	}
	.search-area .result-type{
		position:absolute;
		right:10px;
		top:10px;
	}
	.search-area .results li{
		display:none; 
		position:relative;
		width:100%;
	}
	.search-area .results li .private{
		color:#dc0f18; 
		background-color:#f1dadb
	}
	.search-area .results li.search-error{
		padding:10px;
		display:block;
		font-weight:bold;
		color:#000;
	}
	.search-area .results li span.displayfield{
		width:130px; 
		display:block
	}
	.search-area .results li a{
		border-left:none; 
		font-weight:bold; 
		border-right:none;	
	}
	.search-area .results li:last-child a{
		border-bottom:none;
	}
	.search-area .results #more{
		text-align:center;
		display:block;
	}
	.search-area .results #more a{
		border:none; 
		opacity:0.7; 
		font-size:12px;
		color:#4395e1;
	}
	.search-area .results{
		position:absolute;
		top:28px;
		z-index:1000;
		background:white;
		width:219px;
		opacity:0;
		min-height:40px;
		-webkit-border-top-right-radius: Opx;
		-webkit-border-bottom-right-radius: 5px;
		-webkit-border-bottom-left-radius: 5px;
		-moz-border-radius-topright: Opx;
		-moz-border-radius-bottomright: 5px;
		-moz-border-radius-bottomleft: 5px;
		border-top-right-radius: Opx;
		border-bottom-right-radius: 5px;
		border-bottom-left-radius: 5px;
	}
</style>
<script type="text/javascript" charset="utf-8">

$(document).ready(function(){
	var colors = ['4395e1','5db841','b464b9','f8835f'];
	function randOrd(){
	return (Math.round(Math.random())-0.5); }
	colors.sort( randOrd );

	/**
	*  Input effects
	**/
	$('.search-input').click(function(){
		if($(this).val()=='type to search...'){
			$(this).val('');}
	})
	$('.search-input').blur(function(){
		if($(this).val()=='' ||  $(this).val()==' '){
			$(this).val('type to search...');}
	})
	$('.search-input').keyup(function(){

		$('.results').html('');
		$('.results').stop().animate({
	    opacity: 1}, 500);

		/**
		*  Traitement entrée
		**/
		var searchtext = $(this).val();

		if(searchtext != '' && searchtext != ' '){
		$.get("finds/ajaxProcess?entry="+searchtext,function(data) {
		if(data == '[]'){
			$('.results').append('<li class="search-error">La recherche ne correspond à aucun résultat...</li>');
		}
		else{
			var data = jQuery.parseJSON(data); // Traitement JSON
			var i = 0;
		 	$.each(data, function(key,value){
				if(i>(colors.length-1)){
					i=0;
				}
				color = colors[i];

 				$.each(value, function(k,v){
					var displayfield = v.displayfields[0];
					if (v.displayfields[1] == 'public' && v[v.displayfields[1]]==false) {
						$('.results').append('<li><a class="private" href="'+key.toLowerCase()+'/view/'+v.id+'" target="_blank">Privé</a><span style="background-color:#dc0f18" class="result-type label label-inverse">'+key+'</span></li>');
					}	
					else{
						$('.results').append('<li><a style="color:#000" href="'+key.toLowerCase()+'/view/'+v.id+'" target="_blank"><span class="displayfield">'+v[displayfield]+'</span></a><span style="background-color:#'+color+'" class="result-type label label-inverse">'+key+'</span></li>');
					}
				});
				i++;
	      	});

			/**
			*  Traitement du nombre d'items
			**/		
			var from =0; var step = 7;

			function showNext(list) {
			if($("#more").length > 0){
				$("#more").remove();
			}
			if((from + (step))<list.find('li').size()){
				$(list).append('<li id="more"><a href="#">afficher plus de résultats</a></li>');
			}
			  list
			    .find('li:lt(' +(from + step) + '):not(li:lt(' + from + '))')
			      .fadeIn();
			  from += step;
			}

			// show initial set
			showNext($('.results'));

			$('#more').live('click',function(e) {
			  	e.preventDefault();
			 	showNext($('.results'));
			});								
		}
		});
	}
	else{
		$('.results').stop().animate({
	    opacity: 0}, 400);
	}
	});
});
</script>



<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<ul class="nav pull-right connect">
				<li class="divider-vertical"></li>
			
				<?php if($me['id'] != 0) :?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php echo $me['username']; ?>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<?php echo $this->Html->link('id_profile:'.$me['id'], array('controller'=>'users','action' => 'view',$me['id'] )); ?>
						</li>
						<li>
							<?php echo $this->Html->link('Profile', array('controller'=>'users','action' => 'profile' )); ?>
						</li>
						<li>
							<?php echo $this->Html->link('Settings', array('controller'=>'users','action' => 'settings' )); ?>
						</li>
						<li>
							<?php echo $this->Html->link('Notifications', array('controller'=>'Notifications','action' => 'index' )); ?>
						</li>
						<li>
							<?php echo $this->Html->link(__('List Followers'), array('controller'=>'tourists', 'action' => 'followerlist')); ?> 
						</li>
						<li>
							<?php echo $this->Html->link(__('People I follow'), array('controller'=>'tourists','action' => 'followlist')); ?> 
						</li>
						<li>
							<?php echo $this->Html->link('Logout', array('controller'=>'users','action' => 'logout' )); ?>
						</li>

					</ul>
				</li>
				<?php else: ?>
					<li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?></li>
					<li class="divider-vertical"></li>
					<li><?php echo $this->Html->link('Signup', array('controller' => 'users', 'action' => 'add')); ?></li>
				
				<?php endif; ?>
				<li class="search-area">
				<?php
				echo $this->Form->create('Find');
				echo $this->Form->input("search_text",array(
					'label'=>false,
					'value'=>'type to search...',
					'id'=>'search-'.rand(),
					'name'=>'search-'.rand(),
					'class'=>'search-input'
				));
				echo $this->Form->end();
				?>
				<ul class="results nav nav-tabs nav-stacked search-lis">
				</ul>
				</li>
		</ul>
		
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<?php echo $this->Html->link('caketrek', array('controller'=>'pages','action'=>'home'), array('class'=>'brand')); ?>				
			<div class="nav-collapse">
				<ul class="nav">
					<li <?php if($current_page=="pages"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('PagesController', array('controller' => 'pages', 'action' => 'index')); ?>
					</li>
					<li <?php if($current_page=="users"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('UsersController', array('controller' => 'users', 'action' => 'index')); ?>
					</li>
					<li <?php if($current_page=="badges"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('BadgesController', array('controller' => 'badges', 'action' => 'index')); ?>
					</li>
					<li <?php if($current_page=="tourists"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('TouristsController', array('controller' => 'tourists', 'action' => 'index')); ?>
					</li>
					<li <?php if($current_page=="guides"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('GuidesController', array('controller' => 'guides', 'action' => 'index')); ?>
					</li>

				</ul>
			</div>
		</div>
	</div>
</div>