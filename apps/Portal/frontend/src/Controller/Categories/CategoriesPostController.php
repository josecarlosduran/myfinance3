<?php

declare(strict_types=1);


namespace Myfinance\Apps\Portal\Frontend\Controller\Categories;


use Myfinance\Portal\Categories\Application\CreateCategoryCommand;
use Myfinance\Shared\Infrastructure\Symfony\WebController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

final class CategoriesPostController extends WebController
{
    public function __invoke(Request $request): RedirectResponse
    {

        $validationErrors = $this->validateRequest($request);

        return $validationErrors->count()
            ? $this->redirectWithErrors('new_category_form', $validationErrors, $request)
            : $this->createCategory($request);


    }

    private function validateRequest(Request $request): ConstraintViolationListInterface
    {
        $constraint = new Assert\Collection(
            [
                'id' => new Assert\Uuid(),
                'description' => [new Assert\NotBlank(), new Assert\Length(['min' => 3, 'max' => 30])],
            ]
        );

        $input = $request->request->all();

        return Validation::createValidator()->validate($input, $constraint);
    }


    protected function exceptions(): array
    {
        return [];
    }

    private function createCategory(Request $request): RedirectResponse
    {
        $id          = $request->request->get('id');
        $description = $request->request->get('description');

        $this->dispatch(new CreateCategoryCommand($id, $description));

        return $this->redirectWithMessage('categories', ' 👍🏻 Categoria creada correctamente');
    }
}