# Beautymail for Laravel

Beautymail makes it super easy to send beautiful responsive HTML emails. It's made for things like:

* Welcome emails
* Password reminders
* Invoices
* Data exports

If you're on Laravel 4, use the `1.x` branch.

### Index:

- [Templates](#templates)
- [Installation](#installation)
- [Send your first Beauty mail](#send-your-first-beauty-mail)
- [Options](#options)
- [Lumen support](#lumen-support)

## Templates

There are tons of great looking HTML email templates out there. Campaign Monitor and Mailchimp has released hundreds for free. It is pretty simple to adapt a template to Beautymail. If you do, please send a PR.

__Widgets__ by [Campaign Monitor](https://www.campaignmonitor.com/templates/all/):

![Widget Template](screenshots/widgets.png?raw=true "Widgets template")

__Minty__ by __Stamplia__:

![Widget Template](screenshots/minty.png?raw=true "Widgets template")

__Sunny__

![Widget Template](screenshots/sunny.png?raw=true "Sunny template")

## Installation

Add the package to your `composer.json` by running:

    composer require snowfire/beautymail

When it's installed, publish assets to your public folder

    php artisan vendor:publish --provider="Snowfire\Beautymail\BeautymailServiceProvider"
    
Configure your settings such as logo url and social links in `config/beautymail.php`

## Send your first Beauty mail

Add this to your `routes/web.php`

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

## Lumen support

In order to get this working on Lumen follow the installation instructions except for the `artisan vendor:publish` command, since Lumen does not provide this command. Instead you have to copy the assets folder from `vendor/snowfire/beautymail/public/` to the public folder in your Lumen project manually.

Make sure to also put the `beautymail.php` config file in the `config` folder (default available in `src/config/settings.php`)

### Enable mailing in Lumen

After this you will need to install and configure `illuminate/mailer` with: 

    composer require illuminate/mail
   
and add this to your `bootstrap/app.php`:

    $app->withFacades();
    $app->register(App\Providers\AppServiceProvider::class);

See [this blog post](https://medium.com/@edwardsteven/using-lumen-and-laravel-mail-with-mailgun-270415daed37) for more details and how to use different mail libraries in lumen:

### Configure Beautymail classes and configuration parameters

In order to get Beautymail working on Lumen you need to add the following to your `bootstrap/app.php` in order to resolve missing config files, parameters and classes (before you register `BeautymailServiceProvider`):

    // Provide required path variables
    $app->instance('path.config', env("STORAGE_DIR", app()->basePath()) . DIRECTORY_SEPARATOR . 'config');
    $app->instance('path.public', env("STORAGE_DIR", app()->basePath()) . DIRECTORY_SEPARATOR . 'public');

    // Enable config for beautymail
    $app->configure('beautymail');
    
    // Provide class alliases to resolve Request and Config
    class_alias(\Illuminate\Support\Facades\Request::class, "\Request");
    class_alias(\Illuminate\Support\Facades\Config::class, "\Config");

### Start using Beautymail

Congratulations, you can know start using bBautmail in Lumen. See: [Send your first Beauty mail](#send-your-first-beauty-mail) on what to do next.
