Feature: Find an existing account
  In order to retrieve a Account
  As a user
  I want to find a new account

  Background:
    Given there is an account:
      | id             | 63934730-dc77-4134-944d-b73cbf3eef62 |
      | description    | Test                                 |
      | iban           | ES8434553730724759040309             |
      | savingsAccount | true                                 |


  Scenario: A valid existing account:
    Given I send a GET request to "/accounts/63934730-dc77-4134-944d-b73cbf3eef62"
    Then the response content should be:
    """

    {
      "data":
      {
        "id": "63934730-dc77-4134-944d-b73cbf3eef62",
        "description": "Test",
        "iban": "ES8434553730724759040309",
        "isSavingsAccount": true
      }
    }
    """


    And the response status code should be 200


