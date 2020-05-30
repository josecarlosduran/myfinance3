Feature: List all active existing category
  In order to retrieve all Category
  As a user
  I want to list all active category

  Scenario: A user
    Given I send a GET request to "/categories"
    Then the response content should be:
    """
      [
      {"id":"379fae9e-2423-4b68-b10e-ea4f2cf7c938","description":"Test2"},
      {"id":"e575b4cf-cf43-42b7-9368-c4cb82f39589","description":"Test"}
      ]

    """

    And the response status code should be 200


