<?php class User {

    private $id;
    private $username;
    private $firstName;
    private $lastName;
    private $email;
    
    function User($id, $username, $firstName, $lastName, $email) {
        $this->id = $id;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    /**
     * @return integer
     */
    public function getId() {
        return $this->id;
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