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
 * @method static SmsAeroResponse status($id);
 * @method static SmsAeroResponse statusList($number = null, $text = null, $page = null);
 * @method static SmsAeroResponse balance()
 * @method static SmsAeroResponse tariffs()
 * @method static SmsAeroResponse cards()
 * @method static SmsAeroResponse addBalance($sum, $cardId)
 * @method static SmsAeroResponse signList($page = null)
 * @method static SmsAeroResponse addGroup($name)
 * @method static SmsAeroResponse deleteGroup($id)
 * @method static SmsAeroResponse deleteAllGroups()
 * @method static SmsAeroResponse groupList($page = null)
 * @method static SmsAeroResponse addContact($number, $groupId = null, $birthday = null, $sex = null, $lname = null, $fname = null, $sname = null, $param1 = null, $param2 = null, $param3 = null)
 * @method static SmsAeroResponse deleteContact($id)
 * @method static SmsAeroResponse deleteAllContacts()
 * @method static SmsAeroResponse contactList($number = null, $groupId = null, $birthday = null, $sex = null, $operator = null, $lname = null, $fname = null, $sname = null, $page = null)
 * @method static SmsAeroResponse addToBlacklist($numbers, $birthday = null, $sex = null, $lname = null, $fname = null, $sname = null, $param1 = null, $param2 = null, $param3 = null)
 * @method static SmsAeroResponse blacklistList($number = null, $page = null)
 * @method static SmsAeroResponse checkHLR($numbers)
 * @method static SmsAeroResponse hlrStatus($id)
 * @method static SmsAeroResponse numberOperator($numbers)
 * @method static SmsAeroResponse testSend($number, $text, $sign)
 * @method static SmsAeroResponse testStatus($id)
 * @method static SmsAeroResponse testList($number = null, $text = null, $page = null)
 */
class SmsAero extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SmsAeroManager::class;
    }
}
