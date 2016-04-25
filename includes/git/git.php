<?php

require_once('git_user.php');
Git::init();

class Git  {

    /** @var array */
    protected static $usernameMap = array();

    static function init() {
        $mapFile = new SplFileObject('config/username-mapping.dat');

        if ($mapFile->isFile() && $mapFile->isReadable()) {
            while ($line = trim($mapFile->fgets())) {
                $parts = explode($line, ' ');

                if (count($parts) != 2) {
                    die('Not exactly 2 parts: "' . $line . '"');
                }

                $email = $parts[0];
                $name = $parts[1];

                $usernameMap[$email] = $name;
            }
        }
    }

    static function getLastCommitter() {
        $fullName = self::getLastCommitterName();
        $email = self::getLastCommitterEmail();
        $username = array_key_exists($email, self::$usernameMap) ? self::$usernameMap[$email] : null;
        return new GitUser($fullName, $email, $username);
    }

    /**
     * @return string
     */
    static function getLastCommitHash() {
        return trim(shell_exec('git rev-parse HEAD'));
    }

    /**
     * @param GitUser $gitUser
     * @return string html display code
     */
    static function getAuthorDisplayCode($gitUser) {
        $str = $gitUser->getFullName();
        
        if ($gitUser->isUsernameResolved()) {
            $str = '<a href="' . GITHUB_USER_PREFIX . $gitUser->getUsername() . '" target="_blank">' .$str . ' (' . $gitUser->getUsername() . ')</a>';
        }
        
        return $str;
    }

    /**
     * @return string
     */
    private static function getLastCommitterName() {
        return trim(shell_exec('git log -1 --pretty=%an'));
    }

    /**
     * @return string
     */
    private static function getLastCommitterEmail() {
        return trim(shell_exec('git log -1 --pretty=%ae'));
    }
}