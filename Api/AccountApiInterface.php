<?php
namespace Sauce\App\Api;

interface AccountApiInterface
{
    /**
     * Save the Sauce account ID.
     *
     * @param string $accountID The account ID to be saved.
     * @return bool Returns true if the account ID was successfully saved.
     */
    public function saveAccountID($accountID);

    /**
     * Retrieve the stored Sauce Account ID
     *
     * @return string Account ID
     */
    public function getAccountID();

    /**
     * Retrieve Sauce extension version
     *
     * @return string The Sauce version
     */
    public function getSauceVersion();
}
