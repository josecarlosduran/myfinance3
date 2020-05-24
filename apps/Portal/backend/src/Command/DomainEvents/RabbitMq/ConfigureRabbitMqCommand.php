<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Command\DomainEvents\RabbitMq;

use Myfinance\Shared\Infrastructure\Bus\Event\RabbitMq\RabbitMqConfigurer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Traversable;

final class ConfigureRabbitMqCommand extends Command
{
    protected static           $defaultName = 'myfinance:domain-events:rabbitmq:configure';
    private RabbitMqConfigurer $configurer;
    private string             $exchangeName;
    private Traversable        $subscribers;

    public function __construct(RabbitMqConfigurer $configurer, string $exchangeName, Traversable $subscribers)
    {
        parent::__construct();

        $this->configurer   = $configurer;
        $this->exchangeName = $exchangeName;
        $this->subscribers  = $subscribers;
    }

    protected function configure(): void
    {
        $this->setDescription('Configure the RabbitMQ to allow publish & consume domain events');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->configurer->configure($this->exchangeName, ...iterator_to_array($this->subscribers));
        return 0;
    }
}
