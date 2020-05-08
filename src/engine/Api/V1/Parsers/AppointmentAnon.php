<?php

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2018, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.2.0
 * ---------------------------------------------------------------------------- */

namespace EA\Engine\Api\V1\Parsers;

/**
 * AppointmentAnon Parser
 *
 * This class will handle the encoding and decoding from the API requests.
 */
class AppointmentAnon implements ParsersInterface {
    const KEY_CREATE_DATE= 'createDate';
    const KEY_ZIP = 'zip';
    const KEY_DOCTOR_NPI = 'doctorNpi';
    const KEY_CALLER_TYPE = 'callerType';

    /**
     * Encode Response Array
     *
     * @param array &$response The response to be encoded.
     */
    public function encode(array &$response)
    {
        // Massage data
        $tmpData = [
            self::KEY_CREATE_DATE => $response['book_datetime'] ?? null,
            self::KEY_ZIP => substr($response['zip_code'] ?? null, 0, 3),
            self::KEY_DOCTOR_NPI => $response['doctor_npi'] ?? null,
            self::KEY_CALLER_TYPE => $response['caller'] ?? null,
        ];
        $response = $tmpData;
    }

    /**
     * Decode Request
     *
     * @param array &$request The request to be decoded.
     * @param array $base Optional (null), if provided it will be used as a base array.
     */
    public function decode(array &$request, array $base = NULL)
    {

    }
}
