Feature: Create a new category
  In order to have categories in the portal
  As a user
  I want to create a new category

  Scenario: A valid not existing category
    Given I send a PUT request to "/categories/89bb510a-812c-4b92-9174-a6bf9e903c49" with body:
    """
    {
      "description": "Test Category"
    }
    """
    Then the response status code should be 201
    And the response should be empty