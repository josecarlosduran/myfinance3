<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Controller\Categories;

use Myfinance\Portal\Categories\Application\Create\CreateCategoryCommand;
use Myfinance\Portal\Categories\Domain\CategoryDescriptionTooLong;
use Myfinance\Shared\Domain\ApiResponse\ApiResponse;
use Myfinance\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CategoriesPutController extends ApiController
{

    public function __invoke(string $id, Request $request): Response
    {
        $description = $request->get('description');
        $this->dispatch(new CreateCategoryCommand($this->extractUserNameFromRequest($request) , $id, $description));
        return ApiResponse::createEmpty(ApiResponse::HTTP_CREATED)->format();
    }

    protected function exceptions(): array
    {
        return [
            CategoryDescriptionTooLong::class => ApiResponse::HTTP_BAD_REQUEST
        ];

    }
}
