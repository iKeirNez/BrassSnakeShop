<?php class GitUser {
    
    /** @var string */
    private $fullName;
    
    /** @var string */
    private $email;
    
    /** @var null|string */
    private $username;

    /**
     * GitUser constructor.
     * @param string $fullName
     * @param string $email
     * @param string|null $username
     */
    function GitUser($fullName, $email, $username) {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFullName() {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @return null|string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @return bool
     */
    public function isUsernameResolved() {
        return $this->username != null;
    }
}