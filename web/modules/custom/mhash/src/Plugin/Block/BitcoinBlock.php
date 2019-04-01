<?php

namespace Drupal\mhash\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Form\FormStateInterface;
/**
 * Provides a 'Bitcoin form' block.
 *
 * @Block(
 *   id = "bitcoin_block",
 *   admin_label = @Translation("BITCOIN"),
 *   category = @Translation("shows bitcoin currency calculator")
 * )
 */

class BitcoinBlock extends BlockBase {
    public function blockForm($form, FormStateInterface $form_state) {
        $form['bimage'] = [
            '#type' => 'managed_file',
            '#title' => 'bimage',
            '#upload_location' => 'public://upload/mayur',
        ];
        return $form;
    }
    public function blockSubmit($form, FormStateInterface $form_state) {  
        $c = $form_state->getValues();
        $this->setConfigurationValue('bimage',$c['bimage']);
      }
    public function build() {
        $configs=$this->getConfiguration();
        
        $image=$configs['bimage'];
        $image_uri = \Drupal\file\Entity\File::load($image[0]);
        $image_uri->setPermanent();
        $image_uri->save();    

        $form['title'] = [  
            '#type' => 'label',  
            '#title' => $this->t('Currency Calculator')
          ];
        
        $form['description'] = [    
            '#type' => 'label',
            '#title' => $this->t('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut laboret dolore magna aliquyam erat, sed diam voluptua.'), 
            '#default_value' => $this->t('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut laboret dolore magna aliquyam erat, sed diam voluptua.'),
          ];
        $form['EM1'] = [  
            '#type' => 'textfield',   
            '#placeholder' => t('Enter Amount'),
            '#required' => TRUE  
          ];  
        $form['EM2'] = [  
            '#type' => 'textfield',  
            '#value' => $this->t('0'),
          ];  
         
        $form['type_options1'] = [
            '#type' => 'select',
            '#options' => array('BITCOIN(BTC)' => t('BITCOIN(BTC)'),
                              'BITCOIN(BTS)' => t('BITCOIN(BTS)'),
                              'BITCOINCASH(BCH)' => t('BITCOIN CASH(BCH)')),
            '#value' => $this->t('BITCOIN(BTS)'),               
        ]; 
        $form['type_options2'] = [
            '#type' => 'select',
            '#options' => array('USDOLLAR(USD)' => t('US DOLLAR(USD)'),
                              'INDIA(RS)' => t('INDIA(RS)'),
                              'UKG(UKG)' => t('UKG(UKG)')),
            '#value' => $this->t('INDIA(RS)'),                  
        ];   
        $form['my_button'] = [
            '#type' => 'submit',
            '#value' => t('BUY NOW!'),
        ];
        return $form;
    }  
      
}
