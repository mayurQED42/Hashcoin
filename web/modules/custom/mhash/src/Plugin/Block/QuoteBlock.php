<?php

namespace Drupal\mhash\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Form\FormStateInterface;
/**
 * Provides a 'Quote form' block.
 *
 * @Block(
 *   id = "quote_block",
 *   admin_label = @Translation("GET A"),
 *   category = @Translation("send your Question/queries")
 * )
 */

class QuoteBlock extends BlockBase {
    public function blockForm($form, FormStateInterface $form_state) {
        $form['qimage'] = [
            '#type' => 'managed_file',
            '#title' => 'qimage',
            '#upload_location' => 'public://upload/mayur',
        ];
        return $form;
    }
    public function blockSubmit($form, FormStateInterface $form_state) {  
        $c = $form_state->getValues();
        $this->setConfigurationValue('qimage',$c['qimage']);
      }
    public function build() {
        $configs=$this->getConfiguration();
        
        $image=$configs['qimage'];
        $image_uri = \Drupal\file\Entity\File::load($image[0]);
        $image_uri->setPermanent();
        $image_uri->save();    

        $form['title'] = [  
            '#type' => 'label',  
            '#title' => $this->t('Free Quote')
          ];
        $form['FN'] = [  
            '#type' => 'textfield',   
            '#placeholder' => t('FULL NAME'),
            '#required' => TRUE  
          ];  
        $form['EA'] = [  
            '#type' => 'textfield', 
            '#placeholder' => t('EMAIL ADDRESS'), 
            '#required' => TRUE
          ]; 
        $form['YS'] = [  
            '#type' => 'textfield', 
            '#placeholder' => t('YOUR SUBJECT'), 
            '#required' => TRUE
          ]; 
        $form['YQ'] = [  
            '#type' => 'textarea',
            '#placeholder' => t('YOUR QUESTION'), 
            '#required' => TRUE
          ]; 
        $form['my_button'] = [
            '#type' => 'submit',
            '#value' => t('SEND NOW'),
        ];
        return $form;
    }  
      
}
