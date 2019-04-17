<?php

namespace Spacha\FinnishZips\Exceptions;

use Exception;

class ZipValidationException extends Exception
{
    /**
     * The zip code that failed validation.
     *
     * @var mixed
     */
    public $zip;

    /**
     * Create a new exception instance.
     *
     * @param  string $message
     * @param  mixed $zip
     * @return void
     */
    public function __construct(string $message, $zip = null)
    {
        parent::__construct($message);

        $this->zip = $zip;
    }
}
