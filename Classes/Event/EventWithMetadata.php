<?php
namespace Neos\EventSourcing\Event;

/*
 * This file is part of the Neos.EventSourcing package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Utility\Arrays;

/**
 * Event wrapper which provides metadata additional to the event
 */
final class EventWithMetadata implements EventInterface
{
    /**
     * @var EventInterface
     */
    private $event;

    /**
     * @var array
     */
    private $metadata;

    /**
     * EventWithMetadata constructor.
     *
     * @param EventInterface $event
     * @param array $metadata
     */
    public function __construct(EventInterface $event, array $metadata)
    {
        $this->event = $event;
        $this->metadata = ($event instanceof EventWithMetadata) ? Arrays::arrayMergeRecursiveOverrule($event->getMetadata(), $metadata) : $metadata;
    }

    /**
     * @return EventInterface
     */
    public function getEvent(): EventInterface
    {
        return $this->event;
    }

    /**
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }
}
