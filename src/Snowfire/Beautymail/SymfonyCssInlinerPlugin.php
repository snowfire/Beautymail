<?php

namespace Snowfire\Beautymail;

use Illuminate\Mail\Events\MessageSending;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Event\MessageEvent;
use Symfony\Component\Mime\Part\AbstractPart;
use Symfony\Component\Mime\Part\AbstractMultipartPart;
use Symfony\Component\Mime\Part\Multipart\AlternativePart;
use Symfony\Component\Mime\Part\Multipart\MixedPart;
use Symfony\Component\Mime\Part\TextPart;
use Pelago\Emogrifier\CssInliner;

class SymfonyCssInlinerPlugin
{
    /**
     * @param \Illuminate\Mail\Events\MessageSending $event
     *
     * @return void
     */
    public function handle(MessageSending $event)
    {
        $message = $event->message;

        if (!$message instanceof Email) {
            return;
        }

        $this->handleSymfonyEmail($message);
    }

    /**
     * @param \Symfony\Component\Mime\Email $message
     *
     * @return void
     */
    private function handleSymfonyEmail(Email $message)
    {
        $body = $message->getBody();

        if ($body === null) {
            return;
        }

        if ($body instanceof TextPart) {
            $message->setBody($this->processPart($body));
        } elseif ($body instanceof AlternativePart || $body instanceof MixedPart) {
            $partType = get_class($body);
            $message->setBody(new $partType(
                ...array_map(
                    function (AbstractPart $part) {
                        return $this->processPart($part);
                    },
                    $body->getParts()
                )
            ));
        }
    }

    /**
     * @param \Symfony\Component\Mime\Part\AbstractPart $part
     *
     * @return \Symfony\Component\Mime\Part\AbstractPart
     */
    private function processPart(AbstractPart $part)
    {
        if ($part instanceof TextPart && $part->getMediaType() === 'text' && $part->getMediaSubtype() === 'html') {
            return $this->processHtmlTextPart($part);
        } else if ($part instanceof AbstractMultipartPart) {
            $partClass = get_class($part);
            $parts = [];

            foreach ($part->getParts() as $childPart) {
                $parts[] = $this->processPart($childPart);
            }

            return new $partClass(...$parts);
        }

        return $part;
    }

    /**
     * @param \Symfony\Component\Mime\Part\TextPart $part
     *
     * @return \Symfony\Component\Mime\Part\TextPart
     */
    private function processHtmlTextPart(TextPart $part)
    {
        return new TextPart(
            CssInliner::fromHtml($part->getBody())->inlineCss()->render(),
            $part->getPreparedHeaders()->getHeaderParameter('Content-Type', 'charset') ?: 'utf-8',
            'html'
        );
    }
}
