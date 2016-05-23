<?php class User {

    private $userId;
    private $username;
    private $firstName;
    private $lastName;
    private $email;
    
    function User($userId, $username, $firstName, $lastName, $email) {
        $this->userId = $userId;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    /**
     * @return integer
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }
}