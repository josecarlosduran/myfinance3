Feature: Login a user
  In order to obtain a token
  As a user
  I want to login in the system

  Scenario: A valid user / password
    Given I send a POST request to "/login" with body:
    """
    {
      "username": "test-user",
      "password": "123456"
    }
    """
    Then the response status code should be 201



