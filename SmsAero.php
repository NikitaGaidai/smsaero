<?php


namespace SmsAero;

use App\SmsAero\Contracts\ApiContract;
use App\SmsAero\Responses\SmsAeroResponse;
use Illuminate\Support\Facades\Http;

/**
 * Class SmsAero
 * @see https://smsaero.ru/description/api/
 */
class SmsAero implements ApiContract
{
    private $domain;

    public function __construct()
    {
        $this->domain = 'https://' . config('smsaero.email') . ':' . config('smsaero.api_key') . '@gate.smsaero.ru/v2';
    }

    /**
     * @inheritDoc
     */
    public function auth()
    {
        $request = Http::post($this->domain . '/auth');
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function send($numbers, $text, $dateSend = null, $callbackUrl = null, $shortLink = null)
    {
        is_array($numbers) ? $data['numbers'] = $numbers : $data['number'] = $numbers;
        $data['text'] = $text;
        $data['sign'] = config('smsaero.sign');

        if (!is_null($dateSend)) $data['dateSend'] = $dateSend;
        if (!is_null($callbackUrl)) $data['callbackUrl'] = $callbackUrl;
        if (!is_null($shortLink)) $data['shortLink'] = $shortLink;

        $request = Http::post($this->domain . '/sms/send', $data);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function status($id)
    {
        $request = Http::post($this->domain . '/sms/status', ['id' => $id]);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function statusList($number = null, $text = null, $page = null)
    {
        if (!is_null($number)) $data['number'] = $number;
        if (!is_null($text)) $data['text'] = $text;
        if (!is_null($page)) $data['page'] = $page;

        $request = Http::get($this->domain . '/sms/list', isset($data) ? $data : []);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function balance()
    {
        $request = Http::post($this->domain . '/balance');
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function tariffs()
    {
        $request = Http::post($this->domain . '/tariffs');
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function cards()
    {
        $request = Http::post($this->domain . '/cards');
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function addBalance($sum, $cardId)
    {
        $data['sum'] = $sum;
        $data['cardId'] = $cardId;

        $request = Http::post($this->domain . '/balance/add', $data);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function signList($page = null)
    {
        if (!is_null($page)) $data['page'] = $page;

        $request = Http::get($this->domain . '/sign/list', isset($data) ? $data : []);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function addGroup($name)
    {
        $request = Http::post($this->domain . '/group/add', ['name' => $name]);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function deleteGroup($id)
    {
        $request = Http::post($this->domain . '/group/delete', ['id' => $id]);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function deleteAllGroups()
    {
        $request = Http::post($this->domain . '/group/delete-all');
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function groupList($page = null)
    {
        if (!is_null($page)) $data['page'] = $page;

        $request = Http::get($this->domain . '/group/list', isset($data) ? $data : []);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function addContact($number, $groupId = null, $birthday = null, $sex = null, $lname = null, $fname = null, $sname = null, $param1 = null, $param2 = null, $param3 = null)
    {
        $data['number'] = $number;

        if (!is_null($groupId)) $data['groupId'] = $groupId;
        if (!is_null($birthday)) $data['birthday'] = $birthday;
        if (!is_null($sex)) $data['sex'] = $sex;
        if (!is_null($lname)) $data['lname'] = $lname;
        if (!is_null($fname)) $data['fname'] = $fname;
        if (!is_null($sname)) $data['sname'] = $sname;
        if (!is_null($param1)) $data['param1'] = $param1;
        if (!is_null($param2)) $data['param2'] = $param2;
        if (!is_null($param3)) $data['param3'] = $param3;

        $request = Http::post($this->domain . '/contact/add', $data);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function deleteContact($id)
    {
        $request = Http::post($this->domain . '/contact/delete', ['id' => $id]);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function deleteAllContacts()
    {
        $request = Http::post($this->domain . '/contact/delete-all');
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function contactList($number = null, $groupId = null, $birthday = null, $sex = null, $operator = null, $lname = null, $fname = null, $sname = null, $page = null)
    {
        if (!is_null($number)) $data['number'] = $number;
        if (!is_null($groupId)) $data['groupId'] = $groupId;
        if (!is_null($birthday)) $data['birthday'] = $birthday;
        if (!is_null($sex)) $data['sex'] = $sex;
        if (!is_null($operator)) $data['operator'] = $operator;
        if (!is_null($lname)) $data['lname'] = $lname;
        if (!is_null($fname)) $data['fname'] = $fname;
        if (!is_null($sname)) $data['sname'] = $sname;
        if (!is_null($page)) $data['page'] = $page;

        $request = Http::get($this->domain . '/contact/list', isset($data) ? $data : []);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function addToBlacklist($numbers, $birthday = null, $sex = null, $lname = null, $fname = null, $sname = null, $param1 = null, $param2 = null, $param3 = null)
    {
        is_array($numbers) ? $data['numbers'] = $numbers : $data['number'] = $numbers;

        if (!is_null($birthday)) $data['birthday'] = $birthday;
        if (!is_null($sex)) $data['sex'] = $sex;
        if (!is_null($lname)) $data['lname'] = $lname;
        if (!is_null($fname)) $data['fname'] = $fname;
        if (!is_null($sname)) $data['sname'] = $sname;
        if (!is_null($param1)) $data['param1'] = $param1;
        if (!is_null($param2)) $data['param2'] = $param2;
        if (!is_null($param3)) $data['param3'] = $param3;

        $request = Http::post($this->domain . '/blacklist/add', $data);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function deleteFromBlacklist($id)
    {
        $request = Http::post($this->domain . '/blacklist/delete', ['id' => $id]);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function blacklistList($number = null, $page = null)
    {
        if (!is_null($number)) $data['number'] = $number;
        if (!is_null($page)) $data['page'] = $page;

        $request = Http::get($this->domain . '/blacklist/list', isset($data) ? $data : []);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function checkHLR($numbers)
    {
        is_array($numbers) ? $data['numbers'] = $numbers : $data['number'] = $numbers;

        $request = Http::post($this->domain . '/hlr/check', $data);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function hlrStatus($id)
    {
        $request = Http::post($this->domain . '/hlr/status', ['id' => $id]);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function numberOperator($numbers)
    {
        is_array($numbers) ? $data['numbers'] = $numbers : $data['number'] = $numbers;

        $request = Http::post($this->domain . '/number/operator', $data);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function testSend($number, $text, $sign)
    {
        $data['number'] = $number;
        $data['text'] = $text;
        $data['sign'] = $sign;

        $request = Http::post($this->domain . '/sms/testsend', $data);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function testStatus($id)
    {
        $request = Http::post($this->domain . '/sms/teststatus', ['id' => $id]);
        return new SmsAeroResponse($request->json());
    }

    /**
     * @inheritDoc
     */
    public function testList($number = null, $text = null, $page = null)
    {
        if (!is_null($number)) $data['number'] = $number;
        if (!is_null($text)) $data['text'] = $text;
        if (!is_null($page)) $data['page'] = $page;

        $request = Http::get($this->domain . '/sms/testlist', isset($data) ? $data : []);
        return new SmsAeroResponse($request->json());
    }
}
