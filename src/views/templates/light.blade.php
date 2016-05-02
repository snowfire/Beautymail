<html>
    <head>
		<title>{{ $senderName or '' }}</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <style type="text/css">{{ file_get_contents(app_path() . '/../vendor/snowfire/beautymail/src/styles/css/light.css') }}</style>
		@if (isset($css))
			<style>{{ $css }}</style>
		@endif
	</head>
    <body>
        <div class="container">
            <div class="email-header">
                @section('header')
                @show
            </div>
            
            <div class="email-content">
                <div class="banner">
                    @section('banner')
                    @show    
                </div>
                
                <div class="row">
                    @section('content')
                    @show
                </div>
                
                <div class="clear"></div>
            </div>
            
            <div class="email-footer">
                @section('footer')
                @show
            </div>
            <!-- Clear to bring height over all content -->
            <div class="clear"></div>
        </div>
    </body>
</html>
