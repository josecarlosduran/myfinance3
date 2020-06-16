Feature: Create a new account
  In order to have accounts in the portal
  As a user
  I want to create a new account

  Background:
    Given there is an account:
      | id             | 63934730-dc77-4134-944d-b73cbf3eef62 |
      | description    | Test                                 |
      | iban           | ES8434553730724759040309             |
      | savingsAccount | true                                 |
    And there is an account:
      | id             | b3cda121-15b3-40b7-8506-7617f482c577 |
      | description    | Test 2                               |
      | iban           | CR3963023394478980441                |
      | savingsAccount | false                                |

  Scenario: A valid not existing category
    Given I send a PUT request to "/accounts/c4343a51-94f1-4195-9ff1-b919114120d5" with body:
    """
    {
      "description": "Test Account",
      "iban": "ES3421005854995142714291",
      "savingsAccount": false
    }
    """
    Then the response status code should be 201
    And the response should be empty



