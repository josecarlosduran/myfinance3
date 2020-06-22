Feature: Create a new group
  In order to have groups in the portal
  As a user
  I want to create a new group

  Scenario: A valid not existing group
    Given I send a PUT request to "/groups/00ffb128-0e9f-47a4-b5d3-23313638e53c" with body:
    """
    {
      "description": "Test group",
      "from": "01/01/2020",
      "until": "31/12/2020"
    }
    """
    Then the response status code should be 201
    And the response should be empty




