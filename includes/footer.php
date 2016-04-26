<?php

require_once('git/git.php');

$commitHash = Git::getLastCommitHash();

/** @var $gitUser GitUser */
$gitUser = Git::getLastCommitter();

?>

<div id="footer" align="center">
    <hr>
    Last Commit by <?= Git::getAuthorDisplayCode($gitUser) ?><br />
    <code><a href="<?= GITHUB_COMMIT_PREFIX . $commitHash ?>" target="_blank"><?= $commitHash ?></a></code><br />
    &copy; 2016 <?= WEBSITE_NAME ?>
</div>