# Beautymail for Laravel 5

Beautymail makes it super easy to send beautiful responsive HTML emails. It's made for things like:

* Welcome emails
* Password reminders
* Invoices
* Data exports

If you're on Laravel 4, use the `1.x` branch.

## Templates

There are tons of great looking HTML email templates out there. Campaign Monitor and Mailchimp has released hundreds for free. It is pretty simple to adapt a template to Beautymail. If you do, please send a PR.

__Widgets__ by [Campaign Monitor](https://www.campaignmonitor.com/templates/all/):

![Widget Template](screenshots/widgets.png?raw=true "Widgets template")

__Minty__ by __Stamplia__:

![Widget Template](screenshots/minty.png?raw=true "Widgets template")

__Sunny__

![Widget Template](screenshots/sunny.png?raw=true "Sunny template")

__Light__ by [emforce](https://github.com/emforce)

![Light template](screenshots/light.png?raw=true "Light Tempalte")

## Installation

Add the package to your `composer.json` by running:

    composer require snowfire/beautymail dev-master

When it's installed, add it to the providers list in `config/app.php`

	Snowfire\Beautymail\BeautymailServiceProvider::class,

Publish assets to your public folder

    php artisan vendor:publish --provider="Snowfire\Beautymail\BeautymailServiceProvider"

## Send your first Beauty mail

Add this to your `routes.php`

```php
Route::get('/test', function()
{
	$beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
    $beautymail->send('emails.welcome', [], function($message)
    {
        $message
			->from('bar@example.com')
			->to('foo@example.com', 'John Smith')
			->subject('Welcome!');
    });

});
```

Now create `resources/views/emails/welcome.blade.php`

```html
@extends('beautymail::templates.widgets')

@section('content')

	@include('beautymail::templates.widgets.articleStart')

		<h4 class="secondary"><strong>Hello World</strong></h4>
		<p>This is a test</p>

	@include('beautymail::templates.widgets.articleEnd')


	@include('beautymail::templates.widgets.newfeatureStart')

		<h4 class="secondary"><strong>Hello World again</strong></h4>
		<p>This is another test</p>

	@include('beautymail::templates.widgets.newfeatureEnd')

@stop
```

That's it!

## Options

### _Template:_ Widgets

To change colours for the different segments, pass a colour variable:

```php
@include('beautymail::templates.widgets.articleStart', ['color' => '#0000FF'])
```

#### Minty template example

```html
@extends('beautymail::templates.minty')

@section('content')

	@include('beautymail::templates.minty.contentStart')
		<tr>
			<td class="title">
				Welcome Steve
			</td>
		</tr>
		<tr>
			<td width="100%" height="10"></td>
		</tr>
		<tr>
			<td class="paragraph">
				This is a paragraph text
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
		<tr>
			<td class="title">
				This is a heading
			</td>
		</tr>
		<tr>
			<td width="100%" height="10"></td>
		</tr>
		<tr>
			<td class="paragraph">
				More paragraph text.
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
		<tr>
			<td>
				@include('beautymail::templates.minty.button', ['text' => 'Sign in', 'link' => '#'])
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
	@include('beautymail::templates.minty.contentEnd')

@stop
```

### Ark template example

```html
@extends('beautymail::templates.ark')

@section('content')

    @include('beautymail::templates.ark.heading', [
		'heading' => 'Hello World!',
		'level' => 'h1'
	])

    @include('beautymail::templates.ark.contentStart')

        <h4 class="secondary"><strong>Hello World</strong></h4>
        <p>This is a test</p>

    @include('beautymail::templates.ark.contentEnd')

    @include('beautymail::templates.ark.heading', [
		'heading' => 'Another headline',
		'level' => 'h2'
	])

    @include('beautymail::templates.ark.contentStart')

        <h4 class="secondary"><strong>Hello World again</strong></h4>
        <p>This is another test</p>

    @include('beautymail::templates.ark.contentEnd')

@stop
```

#### Sunny template example

```html
@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Hello!',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

        <p>Today will be a great day!</p>

    @include('beautymail::templates.sunny.contentEnd')

    @include('beautymail::templates.sunny.button', [
        	'title' => 'Click me',
        	'link' => 'http://google.com'
    ])

@stop
```

#### Light template example

```html
@extends('beautymail::templates.light')

@section('header')
<h2>Beautymail Newsletter</h2>
@stop

@section('banner')
<h3>Interesting Points:</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates quas repellat harum officiis temporibus est, veniam omnis inventore reiciendis suscipit labore aliquid quia nihil tenetur magni consequuntur error, ea esse.</p>
@stop

@section('content')
<h3>Latest Articles:</h3>
<div class="col6">
    <div class="article">
        <div class="image">
            <img src="http://lorempixel.com/g/300/100/" alt="test image">
        </div>
        <div class="description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nobis maxime autem perspiciatis tempore incidunt consectetur, debitis, sunt ullam dignissimos, unde dolore illo doloribus exercitationem necessitatibus aspernatur est nam? Eius.</p>
            <a href="#">Read More</a>
        </div>
    </div>
</div>

<div class="col6">
    <div class="article">
        <div class="image">
            <img src="http://lorempixel.com/g/300/100/" alt="test image">
        </div>
        <div class="description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus a aliquid nihil doloremque officia illum dolores sequi repellendus aspernatur aperiam vitae dolore odit cum, quibusdam reiciendis, autem quos ut numquam?</p>
            <a href="#">Read More</a>
        </div>
    </div>
</div>
@stop

@section('footer')
<div class="row">
    <div class="col12">
        <p>Copyright &copy; Light Theme BeautyMail</p>
    </div>
    
    <div class="col6">
        <h4>Our Offices:</h4>
        <ul>
            <li>123 ABC Avenue</li>
            <li>Office Block 23</li>
            <li>California.</li>
        </ul>
    </div>
    <div class="col6 pull-right">
        <ul>
            <li><a href="#">Check out our Facebook Page</a></li>
            <li><a href="#">Follow us on Twitter</a></li>
            <li><a href="#">Unsubscribe</a></li>
        </ul>
    </div>
</div>
@stop


```