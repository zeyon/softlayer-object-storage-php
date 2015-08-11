<?php
/**
 * Used to populate headers via cURL callback mechanism.
 *
 * @package ObjectStorage-Client
 * @copyright  Copyright (c) 2015 ZeyOS GmbH & Co KG. (https://zeyos.com/)
 */
class ObjectStorage_Http_Adapter_CurlHeaderManager {

	/**
	 * @var array
	 */
	public $headers;

	/**
	 * Should be passed as the value to cURL option {@link CURLOPT_HEADERFUNCTION}.
	 *
	 * @param resource $curl
	 * @param string $line
	 * @return int
	 */
	public function callback($curl, $line) {
        $headerChunk = explode(': ', $line);

        if (count($headerChunk) == 2) {
            $this->headers[ucfirst(strtolower($headerChunk[0]))] = trim($headerChunk[1]);
        }

        return strlen($line);
    }

}