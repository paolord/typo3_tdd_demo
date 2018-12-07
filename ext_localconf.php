<?php
defined('TYPO3_MODE') || die();

if (TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_FE) {
    // Register request handler for API
    \TYPO3\CMS\Core\Core\Bootstrap::getInstance()->registerRequestHandlerImplementation(\Angelo\TddDemo\Http\ApiRequestHandler::class);
}