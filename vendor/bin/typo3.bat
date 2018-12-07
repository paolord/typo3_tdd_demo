@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../typo3/cms-cli/typo3
php "%BIN_TARGET%" %*
