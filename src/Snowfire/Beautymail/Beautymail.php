<?php namespace Snowfire\Beautymail;

use Illuminate\Contracts\Mail\Mailer;

class Beautymail
{
    private $settings;
    private $mailer;

    public function __construct($settings)
    {
        $this->settings = $settings;
        $this->mailer = app()->make('Illuminate\Contracts\Mail\Mailer');
    }

    public function getData()
    {
        return $this->settings;
    }

    /**
     * Send a new message using a view.
     *
     * @param  string|array  $view
     * @param  array  $data
     * @param  \Closure|string  $callback
     * @return mixed
     */
    public function send($view, $data, $callback)
    {
        $this->settings['logo']['path'] = str_replace(
            '%PUBLIC%',
            \Request::getSchemeAndHttpHost(),
            $this->settings['logo']['path']
        );

        $data = $data + $this->settings;

        $this->mailer->send($view, $data, $callback);
    }
}