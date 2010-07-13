<?php
/* SVN FILE: $Id: app_model.php 7847 2008-11-08 02:54:07Z renan.saddam $ */

/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision: 7847 $
 * @modifiedby    $LastChangedBy: renan.saddam $
 * @lastmodified  $Date: 2008-11-07 21:54:07 -0500 (Fri, 07 Nov 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppModel extends Model {
  var $actsAs = array('Containable');
  
   /*****************************************************************
    * Defines superlist as an option..  Based on teknoids implementation link.
    * 
    * Example: 
    * $customers = $this->Customer->find('superlist', array(
    *  'fields' => array('Customer.id', 'Customer.last_name', 'Customer.first_name'),
    *  'separator' => ', '
    * ));
    * 
    * $customers = $this->Customer->find('superlist', array(
    *  'fields' => array('Customer.id', 'Customer.last_name', 'Customer.first_name'),
    *  'format' => '%s, %s'
    * ));  //Same as Above.
    *
    * $customers = $this->Customer->find('superlist', array(
    *  'fields' => array('Customer.id', 'Customer.last_name', 'Customer.first_name', 'Customer.phone'),
    *  'format' => '%s, %s -- %s'
    * ));  //Custom Format.
    * 
    * @link http://teknoid.wordpress.com/2008/09/04/findlist-with-three-or-combined-fields/#
    */
   function find($type, $options = array()) {
      switch ($type) {
        case 'superlist':
          $total_fields = count($options['fields']);
          
          if(!isset($options['fields']) || $total_fields < 3){
            return parent::find('list', $options);
          }

          if(!isset($options['separator'])){
            $options['separator'] = ' ';
          }
          
          if(!isset($options['format'])){
            $options['format'] = '%s';
            for($i = 2; $i<$total_fields;$i++){
              $options['format'] .= "{$options['separator']}%s";
            }
          }

          $options['recursive'] = -1;              
          $list = parent::find('all', $options);
          
          $formatVals = array();
          $formatVals[0] = $options['format'];
          for($i = 1; $i < $total_fields; $i++){
            $formatVals[$i] = "{n}.{$this->alias}.".str_replace("{$this->alias}.", '', $options['fields'][$i]);
          }
          
          return Set::combine(
            $list,
            "{n}.{$this->alias}.{$this->primaryKey}",
            $formatVals
          );
        break;                       

        default:              
          return parent::find($type, $options);
        break;
      }
    }

}
?>
