<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Payone\Business\Api\Request\Container;

use Spryker\Shared\Payone\PayoneApiConstants;

class GetFileContainer extends AbstractRequestContainer
{

    /**
     * @var string
     */
    protected $request = PayoneApiConstants::REQUEST_TYPE_GETFILE;

    /**
     * @var string
     */
    protected $file_reference;

    /**
     * @var string
     */
    protected $file_type;

    /**
     * @var string
     */
    protected $file_format;

    /**
     * @return string
     */
    public function getFileReference()
    {
        return $this->file_reference;
    }

    /**
     * @param string $file_reference
     *
     * @return void
     */
    public function setFileReference($file_reference)
    {
        $this->file_reference = $file_reference;
    }

    /**
     * @return string
     */
    public function getFileType()
    {
        return $this->file_type;
    }

    /**
     * @param string $file_type
     *
     * @return void
     */
    public function setFileType($file_type)
    {
        $this->file_type = $file_type;
    }

    /**
     * @return string
     */
    public function getFileFormat()
    {
        return $this->file_format;
    }

    /**
     * @param string $file_format
     *
     * @return void
     */
    public function setFileFormat($file_format)
    {
        $this->file_format = $file_format;
    }

}
