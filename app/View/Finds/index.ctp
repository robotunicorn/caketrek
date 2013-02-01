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
		position:relative
	}
	.search-area .results li .private{
		color:#dc0f18; 
		background-color:#f1dadb
	}
	.search-area .results li.search-error{
		padding:10px;
		display:block;
		font-weight:bold
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
		font-size:12px
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
	    opacity: 0.9}, 500);
	
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
						$('.results').append('<li><a class="private" href="#">Privé</a><span style="background-color:#dc0f18" class="result-type label label-inverse">'+key+'</span></li>');
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
	
<div class="search-area">
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
</div>