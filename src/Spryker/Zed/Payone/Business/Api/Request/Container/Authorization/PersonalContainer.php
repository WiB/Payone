<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Payone\Business\Api\Request\Container\Authorization;

use Spryker\Zed\Payone\Business\Api\Request\Container\AbstractContainer;

class PersonalContainer extends AbstractContainer
{

    /**
     * Merchant's customer ID (Permitted symbols: 0-9, a-z, A-Z, .,-,_,/)
     *
     * @var string
     */
    protected $customerid;

    /**
     * PAYONE debtor ID
     *
     * @var int
     */
    protected $userid;

    /**
     * @var string
     */
    protected $salutation;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var string
     */
    protected $company;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var string
     */
    protected $addressaddition;

    /**
     * @var string
     */
    protected $zip;

    /**
     * @var string
     */
    protected $city;

    /**
     * Country (ISO-3166)
     *
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $telephonenumber;

    /**
     * Date of birth (YYYYMMDD)
     *
     * @var int
     */
    protected $birthday;

    /**
     * Language indicator (ISO639)
     *
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $vatid;

    /**
     * @var string
     */
    protected $gender;

    /**
     * @var string
     */
    protected $personalid;

    /**
     * @var string
     */
    protected $ip;

    /**
     * @param string $addressaddition
     *
     * @return void
     */
    public function setAddressAddition($addressaddition)
    {
        $this->addressaddition = $addressaddition;
    }

    /**
     * @return string|null
     */
    public function getAddressAddition()
    {
        return $this->addressaddition;
    }

    /**
     * @param string $birthday
     *
     * @return void
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param string $city
     *
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $company
     *
     * @return void
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string|null
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $country
     *
     * @return void
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $customerid
     *
     * @return void
     */
    public function setCustomerId($customerid)
    {
        $this->customerid = $customerid;
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customerid;
    }

    /**
     * @param string $email
     *
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $firstname
     *
     * @return void
     */
    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstname;
    }

    /**
     * @param string $ip
     *
     * @return void
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return string|null
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $language
     *
     * @return void
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $lastname
     *
     * @return void
     */
    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastname;
    }

    /**
     * @param string $salutation
     *
     * @return void
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
    }

    /**
     * @return string|null
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * @param string $state
     *
     * @return void
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string|null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $street
     *
     * @return void
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string|null
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $telephonenumber
     *
     * @return void
     */
    public function setTelephoneNumber($telephonenumber)
    {
        $this->telephonenumber = $telephonenumber;
    }

    /**
     * @return string|null
     */
    public function getTelephoneNumber()
    {
        return $this->telephonenumber;
    }

    /**
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $userid
     *
     * @return void
     */
    public function setUserId($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userid;
    }

    /**
     * @param string $vatid
     *
     * @return void
     */
    public function setVatId($vatid)
    {
        $this->vatid = $vatid;
    }

    /**
     * @return string
     */
    public function getVatId()
    {
        return $this->vatid;
    }

    /**
     * @param string $gender
     *
     * @return void
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $personalid
     *
     * @return void
     */
    public function setPersonalid($personalid)
    {
        $this->personalid = $personalid;
    }

    /**
     * @return string
     */
    public function getPersonalid()
    {
        return $this->personalid;
    }

    /**
     * @param string $zip
     *
     * @return void
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

}
