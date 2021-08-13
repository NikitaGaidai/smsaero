<?php


namespace SmsAero\Contracts;

use SmsAero\Responses\SmsAeroResponse;

/**
 * Interface ApiContract
 * @see https://smsaero.ru/description/api/
 */
Interface ApiContract
{
    /*
     * There is a list of API methods below
     */

    /**
     * @return SmsAeroResponse
     */
    public function auth();

    /**
     * @param string|array $numbers
     * @param string $text
     * @param null|int $dateSend
     * @param null|string $callbackUrl
     * @param null|int $shortLink
     * @return SmsAeroResponse
     */
    public function send($numbers, $text, $dateSend = null, $callbackUrl = null, $shortLink = null);

    /**
     * @param int $id
     * @return SmsAeroResponse
     */
    public function status($id);

    /**
     * @param string|null $number
     * @param string|null $text
     * @param int|null $page
     * @return SmsAeroResponse
     */
    public function statusList($number = null, $text = null, $page = null);

    /**
     * @return SmsAeroResponse
     */
    public function balance();

    /**
     * @return SmsAeroResponse
     */
    public function tariffs();

    /**
     * @return SmsAeroResponse
     */
    public function cards();

    /**
     * @param int $sum
     * @param int $cardId
     * @return SmsAeroResponse
     */
    public function addBalance($sum, $cardId);

    /**
     * @param int|null $page
     * @return SmsAeroResponse
     */
    public function signList($page = null);

    /**
     * @param string $name
     * @return SmsAeroResponse
     */
    public function addGroup($name);

    /**
     * @param int $id
     * @return SmsAeroResponse
     */
    public function deleteGroup($id);

    /**
     * @return SmsAeroResponse
     */
    public function deleteAllGroups();

    /**
     * @param string|null $page
     * @return SmsAeroResponse
     */
    public function groupList($page = null);

    /**
     *
     * @param string $number
     * @param int|null $groupId
     * @param int|null $birthday
     * @param string|null $sex
     * @param string|null $lname
     * @param string|null $fname
     * @param string|null $sname
     * @param string|null $param1
     * @param string|null $param2
     * @param string|null $param3
     * @return SmsAeroResponse
     */
    public function addContact($number, $groupId = null, $birthday = null, $sex = null, $lname = null, $fname = null, $sname = null, $param1 = null, $param2 = null, $param3 = null);

    /**
     * @param int $id
     * @return SmsAeroResponse
     */
    public function deleteContact($id);

    /**
     * @return SmsAeroResponse
     */
    public function deleteAllContacts();

    /**
     * @param string|null $number
     * @param int|null $groupId
     * @param int|null $birthday
     * @param string|null $sex
     * @param string|null $operator
     * @param string|null $lname
     * @param string|null $fname
     * @param string|null $sname
     * @param int|null $page
     * @return SmsAeroResponse
     */
    public function contactList($number = null, $groupId = null, $birthday = null, $sex = null, $operator = null, $lname = null, $fname = null, $sname = null, $page = null);

    /**
     * @param string|array $numbers
     * @param int|null $birthday
     * @param string|null $sex
     * @param string|null $lname
     * @param string|null $fname
     * @param string|null $sname
     * @param string|null $param1
     * @param string|null $param2
     * @param string|null $param3
     * @return SmsAeroResponse
     */
    public function addToBlacklist($numbers, $birthday = null, $sex = null, $lname = null, $fname = null, $sname = null, $param1 = null, $param2 = null, $param3 = null);

    /**
     * @param int $id
     * @return SmsAeroResponse
     */
    public function deleteFromBlacklist($id);

    /**
     * @param string|null $number
     * @param int|null $page
     * @return SmsAeroResponse
     */
    public function blacklistList($number = null, $page = null);

    /**
     * @param string|array $numbers
     * @return SmsAeroResponse
     */
    public function checkHLR($numbers);

    /**
     * @param int $id
     * @return SmsAeroResponse
     */
    public function hlrStatus($id);

    /**
     * @param string|array $numbers
     * @return SmsAeroResponse
     */
    public function numberOperator($numbers);

    /**
     * @param string $number
     * @param string $text
     * @param string $sign
     * @return SmsAeroResponse
     */
    public function testSend($number, $text, $sign);

    /**
     * @param int $id
     * @return SmsAeroResponse
     */
    public function testStatus($id);

    /**
     * @param string|null $number
     * @param string|null $text
     * @param int|null $page
     * @return SmsAeroResponse
     */
    public function testList($number = null, $text = null, $page = null);
}
