(function(a){jQuery.fn.reverse=Array.prototype.reverse;var b={buttonWidthLowRes:function(b,c){b.each(function(){var b=a(this),d=parseInt(b.css("padding-left")),e=parseInt(b.css("padding-right"));b.css("max-width",(c.outerWidth()-(d+e)*2)/2)})},buttonWidthHighRes:function(b,c){b.each(function(){var b=a(this),d=parseInt(b.css("padding-left")),e=parseInt(b.css("padding-right")),f=c;if(!d)f+=d;else f-=d;if(!e)f+=e;else f-=e;b.css("max-width",f)})}},c={setSlideBackground:function(b,c,d){c.css("background-image","url("+b+")").each(function(b){a(this).css("background-position",-b*d+"px 0px")})},preloadImages:function(b,c,d){var e=0;b.each(function(b){var c=a(this),e=d.attr("src");a("<img/>").attr("src",e)})},setup:function(d,e,f,g,h,i,j,k,l,m,n,o,p,q,r){j.each(function(b){var c=a(this);c.appendTo(o).addClass("slide-content_"+b)});o.addClass(r.contentPosition).css("height",j.eq(r.pos).outerHeight());p.addClass(r.contentPosition);if(r.contentPosition){a("a",p).css("height",o.outerHeight())}else{var s=(o.outerHeight()-1)/2;a("a",p).css("height",s);a(".next",p).css("bottom",parseInt(a(".prev",p).css("bottom"))+s+1+"px")}e.each(function(b){var c=a(this),d=c.find("a").attr("href");mode=c.find("a").attr("class"),title=c.find("a").attr("title");c.add(c.find(k)).data({url:d,mode:mode,title:title})});e.css({display:"block",height:r.height-i.outerHeight()+"px"}).appendTo(m);m.css({"max-height":r.height-i.outerHeight()+"px",overflow:"hidden",width:"100%"});h.css("width",g+"px");i.css("width",100/f+"%");i.appendTo(n);if(d.width()/2===748/2){b.buttonWidthLowRes(i,d)}else{b.buttonWidthHighRes(i,g)}e.find(k).appendTo(l);e.find("a").remove();l.css("max-height",r.height-i.outerHeight()+"px");d.css({"max-height":r.height-i.outerHeight()+i.outerHeight()*Math.ceil(f/2)+"px","max-width":g*f+"px"});c.setSlideBackground(r.posBgImage,e,g);if(a(window).width()<960)k.eq(r.pos).stop(true,true).fadeIn(r.type.speed,r.type.easing).css("display","block");var t=e.eq(d.find(".slide-button.active").index()).data("url");e.css("cursor","auto");if(t)e.css("cursor","pointer");var u=k.eq(d.find(".slide-button.active").index()).data("url");k.css("cursor","auto");if(u)k.eq(d.find(".slide-button.active").index()).css("cursor","pointer");a(window).load(function(){d.addClass("fully-loaded");e.css("width",g+"px");q.css({bottom:i.innerHeight()+parseInt(i.css("border-bottom-width"))+"px",left:g*r.pos,visibility:"visible",width:g+"px"});if(a(window).width()<960){if(r.contentPosition==="center"){var b=(d.width()-o.outerWidth())/2-a("a",p).outerWidth()-1;a(".prev",p).css("left",b);a(".next",p).css("right",b)}else if(r.contentPosition==="bottom"){o.add(a("a",p)).css("bottom",d.outerHeight()-l.outerHeight());o.css("width",l.outerWidth()-(a("a",p).outerWidth()*2+2)-(parseInt(o.css("padding-left"))+parseInt(o.css("padding-right"))))}else{o.add(a(".prev",p)).css("bottom",d.outerHeight()-l.outerHeight()+30);a(".next",p).css("bottom",d.outerHeight()-l.outerHeight()+30+a(".next",p).outerHeight())}}})}},d={def:{slide:function(b,c,e,f,g,h,i,j,k){var l=c.eq(h.index()),m=l.index(),n=a("img",i).eq(m).attr("src"),o;if(k.pos===m){b.data("anim",false);return false}k.pos=l.index();d[k.type.mode].slideAux(b,c,e,f,g,n,o,k)},slideAux:function(b,c,d,e,f,g,h,i){var j=0;f.css({left:"0px","background-image":"url("+g+")"}).each(function(b){a(this).css("background-position",-b*e+"px 0px")});b.data("anim",false)}},fade:{slide:function(a,b,c,e,f,g,h,i,j){d["def"].slide(a,b,c,e,f,g,h,i,j)},slideAux:function(b,d,e,f,g,h,i,j){var k=0;g.css({left:"0px","background-image":"url("+h+")"}).each(function(g){a(this).hide().css("background-position",-g*f+"px 0px").fadeIn(j.type.speed,j.type.easing,function(){++k;if(k===e){b.data("anim",false);c.setSlideBackground(h,d,f)}})})}},seqFade:{slide:function(b,c,e,f,g,h,i,j,k){var l=c.eq(h.index()),m=l.index(),n=a("img",i).eq(m).attr("src"),o;if(k.pos<m)o=1;else if(k.pos>m)o=-1;else{b.data("anim",false);return false}k.pos=l.index();d[k.type.mode].slideAux(b,c,e,f,g,n,o,k)},slideAux:function(b,d,e,f,g,h,i,j){var k=0,l=j.type.seqfactor,m=b.find(".slide-img");if(i===-1)m=m.reverse();m.css({left:"0px","background-image":"url("+h+")"}).each(function(g){var m=a(this).hide();setTimeout(function(){var a=-g*f;if(i===-1)a=-(e-1-g)*f;m.css("background-position",a+"px 0px").fadeIn(j.type.speed,j.type.easing,function(){++k;if(k===e){b.data("anim",false);c.setSlideBackground(h,d,f)}})},g*l)})}},horizontalSlide:{slide:function(a,b,c,e,f,g,h,i,j){d["seqFade"].slide(a,b,c,e,f,g,h,i,j)},slideAux:function(b,d,e,f,g,h,i,j){var k=0;g.css({left:i*f+"px","background-image":"url("+h+")"}).each(function(g){a(this).css("background-position",-g*f+"px 0px").stop().animate({left:"0px"},j.type.speed,j.type.easing,function(){++k;if(k===e){b.data("anim",false);c.setSlideBackground(h,d,f)}})})}},seqHorizontalSlide:{slide:function(a,b,c,e,f,g,h,i,j){d["seqFade"].slide(a,b,c,e,f,g,h,i,j)},slideAux:function(b,d,e,f,g,h,i,j){var k=0,l=j.type.seqfactor,m=b.find(".slide-img");if(i===1)m=m.reverse();m.css({left:i*f+"px","background-image":"url("+h+")"}).each(function(g){var m=a(this);setTimeout(function(){var a=-g*f;if(i===1)a=-(e-1-g)*f;m.css("background-position",a+"px 0px").stop().animate({left:"0px"},j.type.speed,j.type.easing,function(){++k;if(k===e){b.data("anim",false);c.setSlideBackground(h,d,f)}})},g*l)})}},verticalSlide:{slide:function(a,b,c,e,f,g,h,i,j){d["seqFade"].slide(a,b,c,e,f,g,h,i,j)},slideAux:function(b,d,e,f,g,h,i,j){var k=0;g.css({top:i*j.height+"px","background-image":"url("+h+")"}).each(function(g){a(this).css("background-position",-g*f+"px 0px").stop().animate({top:"0px"},j.type.speed,j.type.easing,function(){++k;if(k===e){b.data("anim",false);c.setSlideBackground(h,d,f)}})})}},seqVerticalSlide:{slide:function(a,b,c,e,f,g,h,i,j){d["seqFade"].slide(a,b,c,e,f,g,h,i,j)},slideAux:function(b,d,e,f,g,h,i,j){var k=0,l=j.type.seqfactor,m=b.find(".slide-img");if(i===1)m=m.reverse();m.css({top:i*j.height+"px","background-image":"url("+h+")"}).each(function(g){var m=a(this);setTimeout(function(){var a=-g*f;if(i===1)a=-(e-1-g)*f;m.css("background-position",a+"px 0px").stop().animate({top:"0px"},j.type.speed,j.type.easing,function(){++k;if(k===e){b.data("anim",false);c.setSlideBackground(h,d,f)}})},g*l)})}},verticalSlideAlt:{slide:function(a,b,c,e,f,g,h,i,j){d["seqFade"].slide(a,b,c,e,f,g,h,i,j)},slideAux:function(b,d,e,f,g,h,i,j){var k=0,l;g.css({"background-image":"url("+h+")"}).each(function(g){if(g%2===0)l=1;else l=-1;a(this).css("top",l*j.height+"px").css("background-position",-g*f+"px 0px").stop().animate({top:"0px"},j.type.speed,j.type.easing,function(){++k;if(k===e){b.data("anim",false);c.setSlideBackground(h,d,f)}})})}},seqVerticalSlideAlt:{slide:function(a,b,c,e,f,g,h,i,j){d["seqFade"].slide(a,b,c,e,f,g,h,i,j)},slideAux:function(b,d,e,f,g,h,i,j){var k=0,l=j.type.seqfactor,m=b.find(".slide-img"),n;if(i===1)m=m.reverse();m.css({top:i*j.height+"px","background-image":"url("+h+")"}).each(function(g){var m=a(this);setTimeout(function(){var a=-g*f;if(i===1)a=-(e-1-g)*f;if(g%2===0)n=1;else n=-1;m.css("top",n*j.height+"px").css("background-position",a+"px 0px").stop().animate({top:"0px"},j.type.speed,j.type.easing,function(){++k;if(k===e){b.data("anim",false);c.setSlideBackground(h,d,f)}})},g*l)})}},responsiveDef:{slide:function(b,c,e,f,g,h,i,j,k,l){var m=c.eq(h.index()),n=m.index(),o=a("img",j).eq(n).attr("src"),p;if(l.pos===n){b.data("anim",false);return false}l.pos=m.index();d["responsiveDef"].slideAux(b,c,e,f,g,i,j,o,p,n,l)},slideAux:function(b,c,d,e,f,g,h,i,j,k,l){var m=0;h.css("height",h.outerHeight());g.stop(true,true).hide().eq(k).stop(true,true).fadeIn(l.type.speed,l.type.easing,function(){a(this).css("display","block");h.css("height","");b.data("anim",false)})}}},e={init:function(e){if(this.length){var f={pos:0,width:940,height:380,contentSpeed:450,contentPosition:"",showContentOnhover:false,hideContent:false,timeout:3e3,pause:true,pauseOnHover:true,hideBottomButtons:false,type:{mode:"def",speed:400,easing:"jswing",seqfactor:100}};return this.each(function(){function C(b,c,e){clearTimeout(p);p=0;clearTimeout(o);o=setTimeout(function(){if(g.data("anim"))return false;g.data("anim",true);if(f.pos>-1&&!b.hasClass("active")){z.stop().animate({left:n*c.index()},f.type.speed*1);k.removeClass("active");b.addClass("active");l.stop(true,true).hide()}if(g.data("randomEffect"))f.type.mode=m[Math.floor(Math.random()*m.length)];if(a(window).width()<960){d["responsiveDef"].slide(g,h,i,n,t,b,j,u,v,f)}else{d[f.type.mode].slide(g,h,i,n,t,b,u,v,f)}e.stop(true,true).fadeIn(f.contentSpeed);x.css("height",e.outerHeight());if(f.contentPosition){var o=e.outerHeight()+parseInt(x.css("padding-top"))+parseInt(x.css("padding-bottom"))}else{var o=(l.eq(c.index()).outerHeight()+parseInt(x.css("padding-top"))+parseInt(x.css("padding-bottom"))-1)/2;a(".next",y).css("bottom",parseInt(a(".prev",y).css("bottom"))+o+1+"px")}a("a",y).css("height",o);var r=h.eq(g.find(".slide-button.active").index()).data("url");h.css("cursor","auto");if(r)h.css("cursor","pointer");if(!g.data("autoPlayStop")&&f.timeout>0&&q!==true)p=setTimeout(B,f.timeout)},100)}function B(){var a=h.eq(g.find(".slide-button.active").index()).next();if(g.find(".slide-button.active").index()===i-1)a=h.first();var b=k.eq(a.index()),c=x.children(".slide-content_"+a.index());C(b,a,c)}if(e){a.extend(f,e)}var g=a(this),h=g.find(".slide"),i=h.length,j=g.find(".slide-bg-image"),k=g.find(".slide-button"),l=g.find(".slide-content"),m=["def","fade","seqFade","horizontalSlide","seqHorizontalSlide","verticalSlide","seqVerticalSlide","verticalSlideAlt","seqVerticalSlideAlt"],n=Math.floor(f.width/i),o,p,q,r;f.height+=k.outerHeight();r=g.width();c.preloadImages(h,i,j);if(f.showContentOnhover)g.addClass("show-content-onhover");if(f.hideContent)g.addClass("hide-content");if(f.hideBottomButtons)g.addClass("hide-bottom-buttons");var s=h.eq(f.pos);f.posBgImage=s.find(j).attr("src");s.find(".slide-button").addClass("active");h.prepend('<div class="slide-img"></div>');var t=g.find(".slide-img");g.append('<div class="slide-images-container"></div>');var u=a(".slide-images-container");g.append('<div class="slides-container"></div>');var v=a(".slides-container");g.append('<div class="buttons-container"></div>');var w=a(".buttons-container");g.append('<div class="content-container"></div>');var x=a(".content-container");g.append('<div class="pagination-container"> <a class="prev">�</a> <a class="next">�</a> </div>');var y=a(".pagination-container");g.append('<div class="active-slide-bar"> </div>');var z=g.find(".active-slide-bar");c.setup(g,h,i,n,t,k,l,j,u,v,w,x,y,z,f);var A=x.children(".slide-content_"+f.pos);A.fadeIn(f.contentSpeed);if(f.type.mode==="random")g.data("randomEffect",true);a(window).load(function(){if(f.timeout>0&&q!==true)p=setTimeout(B,f.timeout)});k.bind("click",function(b){if(f.pause)g.data("autoPlayStop",true);var c=a(this),d=h.eq(c.index()),e=x.children(".slide-content_"+d.index());C(c,d,e);b.preventDefault()});a("a",y).bind("click",function(b){if(f.pause)g.data("autoPlayStop",true);var c=a(this),d=h.eq(g.find(".slide-button.active").index()),e,j;if(c.hasClass("next")){d=d.next()}else if(c.hasClass("prev")){d=d.prev()}if(g.find(".slide-button.active").index()===i-1&&c.hasClass("next"))d=h.first();if(d.index()===-1&&c.hasClass("prev"))d=h.last();e=k.eq(d.index()),j=x.children(".slide-content_"+d.index());if(c.hasClass("next")&&d.index()<i||c.hasClass("prev")&&d.index()>=0){C(e,d,j)}b.preventDefault()});g.on("mouseenter",function(){q=true;if(f.pauseOnHover){clearTimeout(p);p=0}}).on("mouseleave",function(){q=false;if(!g.data("autoPlayStop")&&f.timeout>0)p=setTimeout(B,f.timeout)});v.add(u).click(function(b){q=false;if(a(window).width()<960){var c=j.eq(g.find(".slide-button.active").index())}else{var c=h.eq(g.find(".slide-button.active").index())}var d=c.data("url"),e=c.data("mode"),i=c.data("title"),k=e?e.match(/(iframe|single-image|image-gallery)/g):-1,l,m,n,o,r,s,t,u;if(typeof d!=="undefined"&&d){if(k!==-1&&k!==null){if(k[0]==="iframe"){e="iframe";l=false;m="70%";n="70%";o=800;r=600;s=false;t=false;u=false}else{e="image";l={};m=800;n=600;o=9999;r=9999;s=true;t=true;u=false}a.fancybox({type:e,href:d,title:i,openEffect:"fade",closeEffect:"fade",nextEffect:"fade",prevEffect:"fade",helpers:{title:{type:"inside"},buttons:l},width:m,height:n,maxWidth:o,maxHeight:r,fitToView:s,autoSize:t,closeClick:u,beforeShow:function(){if(g.data("autoPlayStop")||f.timeout===0||f.pause)g.data("sliderStopped",true);g.data({autoPlayStop:true,anim:false})},afterClose:function(){if(!g.data("sliderStopped"))g.removeData("autoPlayStop");if(!g.data("autoPlayStop")&&f.timeout>0&&q!==true)p=setTimeout(B,f.timeout)}})}else{window.location=d}}b.preventDefault()});a(window).resize(function(){if(g.width()!==r){if(g.width()/2===748/2){b.buttonWidthLowRes(k,g)}else{b.buttonWidthHighRes(k,n)}if(a(window).width()<960){var c=j.eq(g.find(".slide-button.active").index()),d=x.children(".slide-content_"+c.index());if(f.contentPosition){var e=d.outerHeight()+parseInt(x.css("padding-top"))+parseInt(x.css("padding-bottom"))}else{var e=(l.eq(c.index()).outerHeight()+parseInt(x.css("padding-top"))+parseInt(x.css("padding-bottom"))-1)/2;a(".next",y).css("bottom",parseInt(a(".prev",y).css("bottom"))+e+1+"px")}x.css("height",d.outerHeight());a(".next",y).css("bottom",parseInt(a(".prev",y).css("bottom"))+e+1+"px");a("a",y).css("height",e);if(c.is(":hidden"))j.hide();c.fadeIn().css("display","block");if(f.contentPosition==="center"){var i=(g.width()-x.outerWidth())/2-a("a",y).outerWidth()-1;a(".prev",y).css("left",i);a(".next",y).css("right",i)}else if(f.contentPosition==="bottom"){x.add(a("a",y)).css("bottom",g.outerHeight()-u.outerHeight());x.css("width",u.outerWidth()-(a("a",y).outerWidth()*2+2)-(parseInt(x.css("padding-left"))+parseInt(x.css("padding-right"))))}else{x.add(a(".prev",y)).css("bottom",g.outerHeight()-u.outerHeight()+30);a(".next",y).css("bottom",g.outerHeight()-u.outerHeight()+30+a(".next",y).outerHeight())}}else{clearTimeout(p);p=0;if(f.pause)g.data("autoPlayStop",true);if(f.contentPosition==="center"){a(".prev",y).css("left","");a(".next",y).css("right","")}else if(f.contentPosition==="bottom"){x.add(a("a",y)).css("bottom","");x.css("width","")}else{x.add(a("a",y)).css("bottom","")}var m=g.find(".slide-button.active"),c=h.eq(m.index()),d=x.children(".slide-content_"+c.index());C(m,c,d)}r=g.width()}})})}}};a.fn.smartStartSlider=function(b){if(e[b]){return e[b].apply(this,Array.prototype.slice.call(arguments,1))}else if(typeof b==="object"||!b){return e.init.apply(this,arguments)}else{a.error("Method "+b+" does not exist on jQuery.smartStartSlider")}}})(jQuery);