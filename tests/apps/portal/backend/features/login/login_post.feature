Feature: Login a user
  In order to obtain a token
  As a user
  I want to login in the system

  Background:
    Given there is a user:
      | username  | test-user        |
      | password  | 123456           |
      | firstname | John             |
      | surname   | Doe              |
      | email     | johndoe@test.com |
      | active    | 1                |
      | role      | ROLE_USER        |

  Scenario: A valid user / password
    Given I send a POST request to "/login" with body:
    """
    {
      "username": "test-user",
      "password": "123456"
    }
    """
    Then the response status code should be 201



