<?php

namespace Snowfire\Beautymail;

use Pelago\Emogrifier\CssInliner;

class CssInlinerPlugin implements \Swift_Events_SendListener
{
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
            $message->setBody(
                CssInliner::fromHtml($message->getBody())->inlineCss()->render()
            );
        }

        foreach ($message->getChildren() as $part) {
            if (strpos($part->getContentType(), 'text/html') === 0) {
                $message->setBody(
                    CssInliner::fromHtml($part->getBody())->inlineCss()->render()
                );
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
