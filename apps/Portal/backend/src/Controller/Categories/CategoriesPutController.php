<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Controller\Categories;

use Myfinance\Portal\Categories\Application\CategoryCreator;
use Myfinance\Portal\Categories\Application\CreateCategoryRequest;
use Myfinance\Portal\Categories\Domain\CategoryDescriptionTooLong;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CategoriesPutController
{

    private $creator;

    public function __construct(CategoryCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(string $id, Request $request): Response
    {
        $description = $request->get('description');

        try {
            $this->creator->__invoke(new CreateCategoryRequest($id, $description));
        } catch (CategoryDescriptionTooLong $error) {
            return new Response ($error->getMessage(), Response::HTTP_BAD_REQUEST);
        }
        return new Response('', Response::HTTP_CREATED);
    }
}
