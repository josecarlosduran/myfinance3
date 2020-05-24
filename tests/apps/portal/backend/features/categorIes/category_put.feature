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


  Scenario: A valid not existing category with a description with more than 30 characters
    Given I send a PUT request to "/categories/839d13db-e048-4050-a5ed-f1355791368a" with body:
    """
    {
      "description": "Test Category with more than 30 characters"
    }
    """
    Then the response status code should be 400

