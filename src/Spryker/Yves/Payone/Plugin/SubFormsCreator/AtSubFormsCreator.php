<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Yves\Payone\Plugin\SubFormsCreator;

use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Yves\Payone\Plugin\PayoneEPSOnlineTransferSubFormPlugin;

class AtSubFormsCreator extends AbstractSubFormsCreator implements SubFormsCreatorInterface
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param array $params
     *
     * @return \Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginInterface[]
     */
    public function createPaymentMethodsSubForms(QuoteTransfer $quoteTransfer, $params = [])
    {
        return [
            PaymentTransfer::PAYONE_CREDIT_CARD => $this->createPayoneCreditCardSubFormPlugin($quoteTransfer),
            PaymentTransfer::PAYONE_EPS_ONLINE_TRANSFER => $this->createPayoneEPSOnlineTransferSubFormPlugin($quoteTransfer),
        ];
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Spryker\Yves\Payone\Plugin\PayoneEPSOnlineTransferSubFormPlugin
     */
    protected function createPayoneEPSOnlineTransferSubFormPlugin(QuoteTransfer $quoteTransfer)
    {
        return new PayoneEPSOnlineTransferSubFormPlugin();
    }

}
