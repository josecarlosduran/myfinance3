Feature: Find an existing group
  In order to retrieve a Group
  As a user
  I want to find a new group

  Background:
    Given there is a group:
      | id          | c3cd2c17-f8aa-4d88-b294-6a0775721d78 |
      | description | Test Group                           |
      | from        | 01/01/2020                           |
      | until       | 31/10/2020                           |

  Scenario: A valid existing category
    Given I send a GET request to "/groups/c3cd2c17-f8aa-4d88-b294-6a0775721d78"
    Then the response content should be:
    """
    {
      "data":
      {
        "id": "c3cd2c17-f8aa-4d88-b294-6a0775721d78",
        "description": "Test Group",
        "from": "01/01/2020",
        "until": "31/10/2020"
      }

    }
    """

    And the response status code should be 200


