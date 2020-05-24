<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Command\DomainEvents\MySql;

use Myfinance\Shared\Domain\Bus\Event\DomainEvent;
use Myfinance\Shared\Infrastructure\Bus\Event\DomainEventSubscriberLocator;
use Myfinance\Shared\Infrastructure\Bus\Event\MySql\MySqlDoctrineDomainEventsConsumer;
use Myfinance\Shared\Infrastructure\Doctrine\DatabaseConnections;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use function Lambdish\Phunctional\pipe;

final class ConsumeMySqlDomainEventsCommand extends Command
{
    protected static                          $defaultName = 'myfinance:domain-events:mysql:consume';
    private MySqlDoctrineDomainEventsConsumer $consumer;
    private DomainEventSubscriberLocator      $subscriberLocator;
    private DatabaseConnections               $connections;

    public function __construct(
        MySqlDoctrineDomainEventsConsumer $consumer,
        DatabaseConnections $connections,
        DomainEventSubscriberLocator $subscriberLocator
    ) {
        $this->consumer          = $consumer;
        $this->subscriberLocator = $subscriberLocator;
        $this->connections       = $connections;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Consume domain events from MySql')
            ->addArgument('quantity', InputArgument::REQUIRED, 'Quantity of events to process');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $quantityEventsToProcess = (int)$input->getArgument('quantity');

        $consumer = pipe($this->consumer(), $this->clearConnections());

        $this->consumer->consume($consumer, $quantityEventsToProcess);
        return 0;
    }

    private function consumer(): callable
    {
        return function (DomainEvent $domainEvent) {
            $subscribers = $this->subscriberLocator->allSubscribedTo(get_class($domainEvent));

            foreach ($subscribers as $subscriber) {
                $subscriber($domainEvent);
            }
        };
    }

    private function clearConnections(): callable
    {
        return function () {
            $this->connections->clear();
        };
    }
}
