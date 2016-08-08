<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Yves\Payone\Form\Constraint;

use Generated\Shared\Transfer\QuoteTransfer;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class BankAccountValidator extends ConstraintValidator
{

    /**
     * @param string $value
     * @param \Symfony\Component\Validator\Constraint|\Spryker\Yves\Payone\Form\Constraint\BankAccount $constraint
     *
     * @return void
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof BankAccount) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__ . '\BankAccount');
        }

        if (null === $value || '' === $value) {
            return;
        }

        /* @var $root Form */
        $root = $this->context->getRoot();

        /* @var $data \Generated\Shared\Transfer\QuoteTransfer */
        $data = $root->getData();

        $validationMessages = $this->validateBankAccount($data, $constraint);

        if (count($validationMessages) > 0) {
            foreach ($validationMessages as $validationMessage) {
                $this->buildViolation($validationMessage)
                    ->addViolation();
            }
        }
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $data
     * @param \Spryker\Yves\Payone\Form\Constraint\BankAccount $constraint
     *
     * @return array|string[]
     */
    protected function validateBankAccount(QuoteTransfer $data, BankAccount $constraint)
    {
        $response = $constraint->getPayoneClient()->bankAccountCheck($data);
        if ($response->getStatus() == 'ERROR' || $response->getStatus() == 'INVALID') {
            return [$response->getCustomerErrorMessage()];
        }
        return [];
    }

}