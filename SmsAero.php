<?php


namespace SmsAero;

use Illuminate\Support\Facades\Facade;
use SmsAero\Responses\SmsAeroResponse;

/**
 * Class SmsAero
 * @package SmsAero
 *
 * @method static SmsAeroResponse auth()
 * @method static SmsAeroResponse send(string|array $numbers, string $text, int|null $dateSend = null, string|null $callbackUrl = null, int|null $shortLink = null)
 * @method static SmsAeroResponse status(int $id);
 * @method static SmsAeroResponse statusList(string|null $number = null, string|null $text = null, int|null $page = null)
 * @method static SmsAeroResponse balance()
 * @method static SmsAeroResponse tariffs()
 * @method static SmsAeroResponse cards()
 * @method static SmsAeroResponse addBalance(int $sum, int $cardId)
 * @method static SmsAeroResponse signList(int|null $page = null)
 * @method static SmsAeroResponse addGroup(string $name)
 * @method static SmsAeroResponse deleteGroup(int $id)
 * @method static SmsAeroResponse deleteAllGroups()
 * @method static SmsAeroResponse groupList(string|null $page = null)
 * @method static SmsAeroResponse addContact(string $number, int|null $groupId = null, int|null $birthday = null, string|null $sex = null, string|null $lname = null, string|null $fname = null, string|null $sname = null, string|null $param1 = null, string|null $param2 = null, string|null $param3 = null)
 * @method static SmsAeroResponse deleteContact(int $id)
 * @method static SmsAeroResponse deleteAllContacts()
 * @method static SmsAeroResponse contactList(string|null $number = null, int|null $groupId = null, int|null $birthday = null, string|null $sex = null, string|null $operator = null, string|null $lname = null, string|null $fname = null, string|null $sname = null, int|null $page = null)
 * @method static SmsAeroResponse addToBlacklist(string|array $numbers, int|null $birthday = null, int|null $sex = null, string|null $lname = null, string|null $fname = null, string|null $sname = null, string|null $param1 = null, string|null $param2 = null, string|null $param3 = null)
 * @method static SmsAeroResponse blacklistList(string|null $number = null, int|null $page = null)
 * @method static SmsAeroResponse deleteFromBlacklist(int $id)
 * @method static SmsAeroResponse checkHLR(string|array $numbers)
 * @method static SmsAeroResponse hlrStatus(int $id)
 * @method static SmsAeroResponse numberOperator(string|array $numbers)
 * @method static SmsAeroResponse testSend(string $number, string $text, string $sign)
 * @method static SmsAeroResponse testStatus(int $id)
 * @method static SmsAeroResponse testList(string|null $number = null, string|null $text = null, int|null $page = null)
 */
class SmsAero extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SmsAeroManager::class;
    }
}
