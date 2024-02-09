<?php

namespace Snowfire\Beautymail;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Traits\Localizable;

class Beautymail implements Mailer
{
    use Localizable;

    /**
     * Contains settings for emails processed by Beautymail.
     *
     * @var
     */
    private $settings;

    /**
     * The locale to use when sending.
     *
     * @var
     */
    private $locale;

    /**
     * The mailer contract depended upon.
     *
     * @var \Illuminate\Contracts\Mail\Mailer
     */
    private $mailer;

    /**
     * Initialise the settings and mailer.
     *
     * @param $settings
     */
    public function __construct($settings)
    {
        $this->settings = $settings;
        $this->mailer = app()->make('Illuminate\Contracts\Mail\Mailer');
        $this->setLogoPath();
    }

    public function to($users)
    {
        return (new PendingMail($this))->to($users);
    }

    public function bcc($users)
    {
        return (new PendingMail($this))->bcc($users);
    }

    public function cc($users)
    {
        return (new PendingMail($this))->cc($users);
    }

    public function locale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Retrieve the settings.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->settings;
    }

    /**
     * @return \Illuminate\Contracts\Mail\Mailer
     */
    public function getMailer()
    {
        return $this->mailer;
    }

    /**
     * Send a new message using a view.
     *
     * @param string|array    $view
     * @param array           $data
     * @param \Closure|string $callback
     *
     * @return void
     */
    public function send($view, array $data = [], $callback = null)
    {
        $data = array_merge($this->settings, $data);

        $mailer = $this->mailer;

        $this->withLocale($this->locale, function () use ($mailer, $view, $data, $callback) {
            $mailer->send($view, $data, $callback);
        });
    }

    /**
     * Send a new message using the a view via queue.
     *
     * @param string|array    $view
     * @param array           $data
     * @param \Closure|string $callback
     *
     * @return void
     */
    public function queue($view, array $data, $callback)
    {
        $data = array_merge($this->settings, $data);

        $this->mailer->queue($view, $data, $callback);
    }

    /**
     * @param $view
     * @param array $data
     *
     * @return \Illuminate\View\View
     */
    public function view($view, array $data = [])
    {
        $data = array_merge($this->settings, $data);

        return view($view, $data);
    }

    /**
     * Send a new message when only a raw text part.
     *
     * @param string $text
     * @param mixed  $callback
     *
     * @return void
     */
    public function raw($text, $callback)
    {
        return $this->mailer->send(['raw' => $text], [], $callback);
    }

    /**
     * Get the array of failed recipients.
     *
     * @return array
     */
    public function failures()
    {
        return $this->mailer->failures();
    }

    /**
     * @return mixed
     */
    private function setLogoPath()
    {
        $this->settings['logo']['path'] = str_replace(
            '%PUBLIC%',
            \Request::getSchemeAndHttpHost(),
            $this->settings['logo']['path']
        );
    }
}
