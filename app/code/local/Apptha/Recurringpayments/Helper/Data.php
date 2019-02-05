<?php
/**
 * Apptha
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.apptha.com/LICENSE.txt
 *
 * ==============================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * ==============================================================
 * This package designed for Magento COMMUNITY edition
 * Apptha does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * Apptha does not provide extension support in case of
 * incorrect edition usage.
 * ==============================================================
 *
 * @category    Apptha
 * @package     Apptha_Recurringpayments
 * @version     0.1.0
 * @author      Apptha Team <developers@contus.in>
 * @copyright   Copyright (c) 2014 Apptha. (http://www.apptha.com)
 * @license     http://www.apptha.com/LICENSE.txt
 *
 */
/**
 * Recurringpayments_Helper Data Block
 *
 * @category Apptha
 * @package Apptha_Recurringpayments
 * @author Apptha Team <developers@contus.in>
 */
class Apptha_Recurringpayments_Helper_Data extends Mage_Core_Helper_Abstract {
	/**
	 * Function to get the domain key
	 *
	 * Return domain key
	 * 
	 * @return string
	 */
	public function domainKey($tkey) {
		$message = "EM-RECPAYMP0EFIL9XEV8YZAL7KCIUQ6NI5OREH4TSEB3TSRIF2SI1ROTAIDALG-JW";
		$stringLength = strlen ( $tkey );
		for($i = 0; $i < $stringLength; $i ++) {
			$keyArray [] = $tkey [$i];
		}
		$encMessage = "";
		$kPos = 0;
		$charsStr = "WJ-GLADIATOR1IS2FIRST3BEST4HERO5IN6QUICK7LAZY8VEX9LIFEMP0";
		$strLen = strlen ( $charsStr );
		for($i = 0; $i < $strLen; $i ++) {
			$charsArray [] = $charsStr [$i];
		}
		$lenMessage = strlen ( $message );
		$count = count ( $keyArray );
		for($i = 0; $i < $lenMessage; $i ++) {
			$char = substr ( $message, $i, 1 );
			$offset = $this->getOffset ( $keyArray [$kPos], $char );
			$encMessage .= $charsArray [$offset];
			$kPos ++;
			
			if ($kPos >= $count) {
				$kPos = 0;
			}
		}
		return $encMessage;
	}
	/**
	 * Function to get the offset for license key
	 *
	 * Return offset key
	 * 
	 * @return string
	 */
	public function getOffset($start, $end) {
		$charsStr = "WJ-GLADIATOR1IS2FIRST3BEST4HERO5IN6QUICK7LAZY8VEX9LIFEMP0";
		$strLen = strlen ( $charsStr );
		for($i = 0; $i < $strLen; $i ++) {
			$charsArray [] = $charsStr [$i];
		}
		for($i = count ( $charsArray ) - 1; $i >= 0; $i --) {
			$lookupObj [ord ( $charsArray [$i] )] = $i;
		}
		$sNum = $lookupObj [ord ( $start )];
		$eNum = $lookupObj [ord ( $end )];
		$offset = $eNum - $sNum;
		if ($offset < 0) {
			$offset = count ( $charsArray ) + ($offset);
		}
		return $offset;
	}
}