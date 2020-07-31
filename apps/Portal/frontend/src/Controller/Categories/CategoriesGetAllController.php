<?php

declare(strict_types=1);


namespace Myfinance\Apps\Portal\Frontend\Controller\Categories;


use Myfinance\Portal\Categories\Application\SearchAll\AllCategoriesSearcherResponse;
use Myfinance\Portal\Categories\Application\SearchAll\SearchAllCategoryQuery;
use Myfinance\Shared\Infrastructure\Symfony\WebController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CategoriesGetAllController extends WebController
{

    public function __invoke(Request $request): Response
    {
        /** @var  AllCategoriesSearcherResponse $category */
        $categories = $this->ask(new SearchAllCategoryQuery());
        return $this->render('pages/categories/categories.html.twig',
            [
                'section_title' => 'Categorias',
                'section_subtitle' => 'Listado',
                'description' => 'Myfinance Pagina de inicio',
                'categories' => $categories->toPrimitives()
            ]);
    }

    protected function exceptions(): array
    {
        return [];
    }

}