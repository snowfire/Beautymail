# Beautymail for Laravel 5

Beautymail makes it super easy to send beatiful responsive HTML emails. It's made for things like:

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

## Installation

Beautymail requires [Laravel Email Inliner](https://github.com/emilsundberg/inliner) to make it fun to work with HTML emails.

Edit your `composer.json` and add:

    "snowfire/beautymail": "dev-master"

Run `composer update` and edit your `app.php` and add a new Service Provider:

    'Snowfire\Beautymail\BeautymailServiceProvider',

Publish assets to your public folder

    php artisan vendor:publish

## Send your first Beauty mail

Add this to your `routes.php`

```php
Route::get('/test', function()
{
	$beautymail = app()->make('Snowfire\Beautymail\Beautymail');
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

Pass these trough the mail `$data` field or create defaults in `config/beautymail.php`.

* senderName
* logo['width']
* logo['height']
* reminder
* unsubscribe
* address
* twitter
* facebook
* flickr

To change colours for the different segments, pass a colour variable:

```php
@include('beautymail::templates.widgets.articleStart', ['color' => '#0000FF'])
```

### _Template:_ Minty

Pass these trough the mail `$data` field or create defaults in `config/beautymail.php`.

* senderName
* unsubscribe

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


### _Template:_ Ark

Pass these trough the mail `$data` field or create defaults in `config/beautymail.php`.

* senderName - __required__
* logo['width'] - __required__
* logo['height'] - __required__
* reminder
* twitter
* facebook

#### Ark template example

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
