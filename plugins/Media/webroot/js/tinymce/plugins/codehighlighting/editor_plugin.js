﻿(function(){tinymce.PluginManager.requireLangPack('codehighlighting');tinymce.create('tinymce.plugins.codehighlighting',{init:function(ed,url){ed.addCommand('mceaddcodehighlight',function(){ed.windowManager.open({file:url+'/codehighlighting.htm',width:530+ed.getLang('codehighlighting.delta_width',0),height:500+ed.getLang('codehighlighting.delta_height',0),inline:1},{plugin_url:url,some_custom_arg:'custom arg'})});ed.addButton('codehighlighting',{title:'codehighlighting.codehighlighting_button_desc',cmd:'mceaddcodehighlight',/*image:url+'/img/codehighlight.gif'*/});ed.onNodeChange.add(function(ed,cm,n){cm.setActive('codehighlighting',n.nodeName=='IMG')})},getInfo:function(){return{longname:'codehighlighting',author:'Nawaf M Al Badia',authorurl:'http://weblogs.asp.net/nawaf/',infourl:'http://weblogs.asp.net/nawaf/',version:"1.0"}}});tinymce.PluginManager.add('codehighlighting',tinymce.plugins.codehighlighting)})();