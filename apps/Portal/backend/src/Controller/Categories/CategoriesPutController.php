<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Controller\Categories;

use Myfinance\Portal\Categories\Application\CategoryCreator;
use Myfinance\Portal\Categories\Application\CreateCategoryRequest;
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

        $this->creator->__invoke(new CreateCategoryRequest($id, $description));
        return new Response('', Response::HTTP_CREATED);
    }
}