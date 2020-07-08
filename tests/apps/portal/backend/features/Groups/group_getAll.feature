Feature: List all active existing groups
  In order to retrieve all Group
  As a user
  I want to list all active group

  Background:
    Given there is a group:
      | id          | c3cd2c17-f8aa-4d88-b294-6a0775721d78 |
      | description | Test Group                           |
      | from        | 01/01/2020                           |
      | until       | 31/10/2020                           |
    And there is a group:
      | id          | 379fae9e-2423-4b68-b10e-ea4f2cf7c938 |
      | description | Test Group 2                         |
      | from        | 01/09/2020                           |
      | until       | 31/12/2020                           |


  Scenario: A user
    Given I send a GET request to "/groups"
    Then the response content should be:
    """
    {
      "data":
      [
        {"id":"379fae9e-2423-4b68-b10e-ea4f2cf7c938","description":"Test Group 2","from":"01/09/2020","until":"31/12/2020"},
        {"id":"c3cd2c17-f8aa-4d88-b294-6a0775721d78","description":"Test Group","from":"01/01/2020","until":"31/10/2020"}
      ]
    }
    """
    And the response status code should be 200


