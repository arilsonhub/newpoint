<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_XmlRpc
 * @subpackage Value
 * @copyright  Copyright (c) 2006 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */


/**
 * Zend_XmlRpc_Value
 */
require_once 'Zend/XmlRpc/Value.php';


/**
 * @category   Zend
 * @package    Zend_XmlRpc
 * @subpackage Value
 * @copyright  Copyright (c) 2006 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_XmlRpc_Value_String extends Zend_XmlRpc_Value_Scalar
{

    /**
     * Set the value of a string native type
     *
     * @param string $value
     */
    public function __construct($value)
    {
        $this->_type = self::XMLRPC_TYPE_STRING;
        $this->_value = $this->_xml_entities((string)$value);    // Make sure this value is string and all XML characters are encoded
    }

    /**
     * Return the value of this object, convert the XML-RPC native string value into a PHP string
     * Decode all encoded risky XML entities back to normal characters
     *
     * @return string
     */
    public function getValue()
    {
        return html_entity_decode($this->_value);
    }

    /**
     * Make sure a string will be safe for XML, convert risky characters to HTML entities
     *
     * @param string $str
     * @return string
     */
    private function _xml_entities($str)
    {
        $chars = array();
        $risky_chars = array('"',"'",'&','<','>');
        foreach ($risky_chars as $char) {
            $chars[$char] = htmlentities($char, ENT_QUOTES);
        }

        return strtr($str, $chars);
    }

}

