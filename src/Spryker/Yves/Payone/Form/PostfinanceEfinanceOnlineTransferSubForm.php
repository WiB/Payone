<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Yves\Payone\Form;

use Generated\Shared\Transfer\PaymentTransfer;
use Spryker\Shared\Payone\PayoneApiConstants;
use Symfony\Component\Form\FormBuilderInterface;

class PostfinanceEfinanceOnlineTransferSubForm extends OnlineTransferSubForm
{

    const PAYMENT_METHOD = 'postfinance_efinance_online_transfer';
    const OPTION_BANK_COUNTRIES = 'postfinance efinance online transfer bank countries';

    /**
     * @return string
     */
    public function getName()
    {
        return PaymentTransfer::PAYONE_POSTFINANCE_EFINANCE_ONLINE_TRANSFER;
    }

    /**
     * @return string
     */
    public function getPropertyPath()
    {
        return PaymentTransfer::PAYONE_POSTFINANCE_EFINANCE_ONLINE_TRANSFER;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return \Spryker\Yves\Payone\Form\EpsOnlineTransferSubForm
     */
    public function addOnlineBankTransferType(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            static::FIELD_ONLINE_BANK_TRANSFER_TYPE,
            'hidden',
            [
                'label' => false,
                'data' => PayoneApiConstants::ONLINE_BANK_TRANSFER_TYPE_POSTFINANCE_EFINANCE,
            ]
        );

        return $this;
    }

}