<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Payone\Business\Api\Request\Container;

use Spryker\Shared\Payone\PayoneApiConstants;
use Spryker\Zed\Payone\Business\Api\Request\Container\Authorization\AbstractAuthorizationContainer;
use Spryker\Zed\Payone\Business\Api\Request\Container\Authorization\BusinessContainer;

class AuthorizationContainer extends AbstractAuthorizationContainer
{

    /**
     * @var string
     */
    protected $request = PayoneApiConstants::REQUEST_TYPE_AUTHORIZATION;

    /**
     * @var \Spryker\Zed\Payone\Business\Api\Request\Container\Authorization\BusinessContainer
     */
    protected $business;

    /**
     * @param \Spryker\Zed\Payone\Business\Api\Request\Container\Authorization\BusinessContainer $business
     *
     * @return $this
     */
    public function setBusiness(BusinessContainer $business)
    {
        $this->business = $business;

        return $this;
    }

    /**
     * @return \Spryker\Zed\Payone\Business\Api\Request\Container\Authorization\BusinessContainer
     */
    public function getBusiness()
    {
        return $this->business;
    }

}
