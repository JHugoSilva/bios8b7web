<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{$title}}</title>
<style>
    body{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0;
        padding: 20px;
        font-family: Arial, Helvetica, sans-serif;
        color: {{ $font_color }};
        background:{{ $bg }};
    }
    .profileImage img{
        width: auto;
        height: 100px;
    }
    .profileTitle {
        font-size:17px;
        font-weight: bold;
        margin-top:10px;
    }
    .profileDescription{
        font-size:15px;
        margin-top:5px;
    }
    .linkArea{
        width: 100%;
        margin:50px 0;
    }
    .banner a {
        color:{{$font_color}};
    }
    .linkArea a {
        display: block;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        font-size:18px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .linkArea a.linksquare{
        border-radius: 0px;
    }
    .linkArea a.linkrounded{
        border-radius: 50px;
    }
</style>
</head>
<body>
    <div class="profileImage">
    <img src="{{$profile_image}}" alt="" srcset="">
    </div>
<div class="profileTitle">
    {{$title}}
</div>
<div class="profileDescription">
    {{$description}}
</div>
<div class="linkArea">
@forelse ($links as $link)
<a href="{{$link->href}}" class="link{{$link->op_border_type}}" style="background-color:{{$link->op_bg_color}};color:{{$link->op_text_color}};" target="_blank">
    {{$link->title}}
</a>
@empty
    
@endforelse
</div>
<div class="banner">
    Feito com 3 por <a href="https://b7web.com.br">B7Web</a>
</div>

@empty(!$fb_pixel)
    <script>
        !function(f,b,e,v,n,t,s){
            if(f.fbq)return;
            n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)}
            if(!f._fbq)f._fbq=n;n.push=n;n,loaded=!0;n.version='2.0'
            n.queue=[];t=b.createElemnt(e);t.async=!0;
            t.src=v;s=b.createElemnt(e)[0];
            s.parentNode.insertBefore(t,s)
        }(window, document,'script','https://connect.facebook.net/en_US/fbevents.js')
        fbq('init',"{{$fb_pixel}}")
        fbq('track','PageView')
    </script>
    <noscript>
    <img height="1" width="1" style="display: none" src="https://www.facebook.com/tr?id={{$fb_pixel}}&ev=PageView&noscript=1" alt="" srcset="">
    </noscript>
@endempty

</body>
</html>