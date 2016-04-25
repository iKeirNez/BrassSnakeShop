<?php
$lastCommitter = getLastCommitterName();
$commitHash = getLastCommitHash();
?>

<div id="footer" align="center">
    <hr>
    Last Commit by <?= $lastCommitter ?><br />
    <code><a href="<?= GITHUB_COMMIT_PREFIX . $commitHash ?>" target="_blank"><?= $commitHash ?></a></code><br />
</div>