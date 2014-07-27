# Beautymail for Laravel

Beautymail makes it super easy to send beatiful HTML emails. It's made for things like:

* Welcome emails
* Password reminders
* Invoices
* Data exports

## Templates

There are tons of great looking HTML email templates out there. Campaign Monitor and Mailchimp has released hundres for free. It is pretty simple to adapt a template to Beautymail. If you do, please send a PR.

The first included templates is __Widgets__ by [Campaign Monitor](https://www.campaignmonitor.com/templates/all/).

![Widget Template](screenshots/widgets.png?raw=true "Widgets template")


## Installation

Beautymail requires [Laravel Email Inliner](https://github.com/emilsundberg/inliner) to make it fun to work with HTML emails.

Edit your `composer.php` and add:

    "snowfire/beautymail": "1.*"

Edit your `app.php` and add a new Service Provider:

    'Emil\Inliner\InlinerServiceProvider'

Publish assets to your public folder

    php artisan asset:publish --package="Snowfire/Beautymail"

## Send your first Beauty mail

Add this to your `routes.php`

```php
Route::get('/testmail', function()
{
	$data = [
		'senderName' => 'ABC Widget', // Company name
		'reminder' => 'You’re receiving this because you’re an awesome ABC Widgets customer or subscribed via <a href="http://www.abcwidgets.com/" style="color: #a6a6a6">our site</a>',
		'unsubscribe' => null,
		'address' => '87 Street Avenue, California, USA',

		'twitter' => 'http://www.facebook.com/abcwidgets',
		'facebook' => 'http://twitter.com/abcwidgets',
		'flickr' => 'http://www.flickr.com/photos/abcwidgets'
	];

	Mail::send('emails.welcome', $data, function($message)
	{
		$message->to('foo@example.com', 'John Smith')->subject('Welcome!');
	});

});
```

Now create `app/views/emails/welcome.blade.php`

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

That's it! If you have troubles sending emails, have a look at [Laravel Email Inliner on GitHub](https://github.com/emilsundberg/inliner) and check that you have all required Ruby Gems.

## Options

### _Template:_ Widget

Required in `$data`. Please note that you have to pass all variables, but it is okay to set them to null to hide data.

* senderName - __required__
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
