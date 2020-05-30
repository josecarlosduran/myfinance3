<?php

declare(strict_types=1);


namespace Myfinance\Apps\Portal\Frontend\Controller\Categories;


use Myfinance\Shared\Domain\ValueObject\Uuid;
use Myfinance\Shared\Infrastructure\Symfony\WebController;
use Symfony\Component\HttpFoundation\Response;

final class NewCategoryFormController extends WebController
{

    public function __invoke(): Response
    {
        return $this->render('pages/categories/new_category.html.twig',
            [
                'section_title' => 'Nueva Categoria',
                'new_category_id' => Uuid::random()->value(),
            ]);
    }

    protected function exceptions(): array
    {
        return [];
    }

}