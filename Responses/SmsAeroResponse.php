<?php


namespace SmsAero\Responses;

/**
 * Class SmsAeroResponse
 * @property boolean $success
 * @property null|mixed $data
 * @property string|null $message
 */
class SmsAeroResponse
{
    public $success;
    public $data;
    public $message;

    /**
     * SmsAeroResponse constructor.
     * @param array $array
     */
    public function __construct($array)
    {
        $this->success = $array['success'];
        $this->data = $array['data'];
        $this->message = $array['message'];
    }
}
