<?php

declare(strict_types=1);


namespace Myfinance\Apps\Portal\Frontend\Controller\Home;


use Myfinance\Shared\Infrastructure\Symfony\WebController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


final class HomeGetController extends WebController
{

    public function __invoke(Request $request): Response
    {
        return $this->render('pages/home.html.twig',
            ['title' => 'Myfinance', 'description' => 'Myfinance Pagina de inicio']);
    }

    protected function exceptions(): array
    {
        return [];
    }
}