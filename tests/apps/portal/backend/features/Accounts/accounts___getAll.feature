Feature: List all active existing accounts
  In order to retrieve all acocunts
  As a user
  I want to list all active accounts

  Background:
    Given there is an account:
      | id             | 63934730-dc77-4134-944d-b73cbf3eef62 |
      | description    | Test                                 |
      | iban           | ES8434553730724759040309             |
      | savingsAccount | true                                 |
    And there is an account:
      | id             | f7c41dce-32a8-4d8e-a4d1-caf7cc3b88c9 |
      | description    | Test 2                               |
      | iban           | ES4701281237476783282489             |
      | savingsAccount | false                                |


  Scenario: A user
    Given I send a GET request to "/accounts"
    Then the response content should be:
    """
    {
      "data":
      [
        {"id":"63934730-dc77-4134-944d-b73cbf3eef62","description":"Test","iban":"ES8434553730724759040309","savingsAccount":true},
        {"id":"f7c41dce-32a8-4d8e-a4d1-caf7cc3b88c9","description":"Test 2","iban":"ES4701281237476783282489","savingsAccount":false}
      ]
    }
    """
    And the response status code should be 200


