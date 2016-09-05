<?php

namespace Snowfire\Beautymail;

class CssInlinerPlugin implements \Swift_Events_SendListener
{
    /**
     * @var \Pelago\Emogrifier
     */
    protected $inliner;

    /**
     * Initialize the CSS inliner.
     */
    public function __construct()
    {
        $this->inliner = new \Pelago\Emogrifier();
        $this->inliner->disableInvisibleNodeRemoval();
    }

    /**
     * Inline the CSS before an email is sent.
     *
     * @param \Swift_Events_SendEvent $evt
     */
    public function beforeSendPerformed(\Swift_Events_SendEvent $evt)
    {
        $message = $evt->getMessage();

        $properTypes = [
            'text/html',
            'multipart/alternative',
            'multipart/mixed',
        ];

        if ($message->getBody() && in_array($message->getContentType(), $properTypes)) {
            $this->inliner->setHtml($message->getBody());
            $message->setBody($this->inliner->emogrify());
        }

        foreach ($message->getChildren() as $part) {
            if (strpos($part->getContentType(), 'text/html') === 0) {
                $this->inliner->setHtml($part->getBody());
                $message->setBody($this->inliner->emogrify());
            }
        }
    }

    /**
     * Do nothing.
     *
     * @param \Swift_Events_SendEvent $evt
     */
    public function sendPerformed(\Swift_Events_SendEvent $evt)
    {
        // Do Nothing
    }
}
