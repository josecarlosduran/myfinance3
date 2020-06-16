Feature: Find an existing category
  In order to retrieve a Category
  As a user
  I want to find a new category

  Background:
    Given there is a category:
      | id          | e575b4cf-cf43-42b7-9368-c4cb82f39589 |
      | description | Test                                 |

  Scenario: A valid existing category
    Given I send a GET request to "/categories/e575b4cf-cf43-42b7-9368-c4cb82f39589"
    Then the response content should be:
    """
    {
      "data":
      {
        "id": "e575b4cf-cf43-42b7-9368-c4cb82f39589",
        "description": "Test"
      }

    }
    """

    And the response status code should be 200


