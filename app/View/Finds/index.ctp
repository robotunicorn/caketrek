<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$('.search-input').keyup(function(){
		$('.results').html('');
		//var siteurl = 'lol';
		var searchtext = $(this).val();
		$.get("finds/ajaxProcess?entry="+searchtext,function(data) {
		var data = jQuery.parseJSON(data);
		 $.each(data, function(key,value) {
			$('.results').append('<ul id="ul-'+key.toLowerCase()+'" class="nav nav-tabs nav-stacked"><li style="margin-top:15px; margin-bottom:5px;"><span style="font-size:13px" class="label label-info">'+key+'</span></li></ul>');
	       	$.each(value, function(k,v){
				var displayfield = v.displayfields[0];
				$('#ul-'+key.toLowerCase()).append('<li><a href="'+key.toLowerCase()+'/view/'+v.id+'" target="_blank">'+v[displayfield]+'</a></li>');
			});
		
	      });

		});
	});
});
</script>
<?php
echo $this->Form->create('Find');
echo $this->Form->input("search_text",array(
	'label'=>'Rechercher sur le site',
	'id'=>'search-'.rand(),
	'name'=>'search-'.rand(),
	'class'=>'search-input'
));
?>
<a id="lol" href="#">Ajax</a>
<?php
echo $this->Form->end("Rechercher");
?>
<div class="results" style="width:80%">

</div>
