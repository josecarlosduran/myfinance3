<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Accounts\Application\Create;

use Myfinance\Portal\Accounts\Application\Create\AccountCreator;
use Myfinance\Portal\Accounts\Application\Create\CreateAccountCommandHandler;
use Myfinance\Portal\Accounts\Domain\AccountDescriptionTooLong;
use Myfinance\Portal\Accounts\Domain\AccountIbanNotValid;
use Myfinance\Tests\Portal\Accounts\AccountsModuleUnitTestCase;
use Myfinance\Tests\Portal\Accounts\Domain\AccountCreatedDomainEventMother;
use Myfinance\Tests\Portal\Accounts\Domain\AccountMother;

/**
 * @group unit
 */
final class CreateAccountCommandHandlerTest extends AccountsModuleUnitTestCase
{

    private CreateAccountCommandHandler $handler;

    /** @test */
    public function it_should_create_a_valid_account(): void
    {
        $command                   = CreateAccountCommandMother::random();
        $account                   = AccountMother::fromCommand($command);
        $accountCreatedDomainEvent = AccountCreatedDomainEventMother::fromAccount($account);

        $this->shouldSave($account);
        $this->shouldPublishDomainEvent($accountCreatedDomainEvent);

        $this->handler->__invoke($command);

    }

    /** @test */
    public function it_should_thrown_AccountIbanNotValid(): void
    {

        $this->expectException(AccountIbanNotValid::class);

        CreateAccountCommandMother::withIncorrectIban();

    }

    /** @test */
    public function it_should_thrown_AccountDescriptionTooLong(): void
    {

        $this->expectException(AccountDescriptionTooLong::class);

        CreateAccountCommandMother::withDescriptionLongerThanMaxLength();

    }


    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateAccountCommandHandler(
            new AccountCreator($this->repository(), $this->eventBus())
        );
    }


}