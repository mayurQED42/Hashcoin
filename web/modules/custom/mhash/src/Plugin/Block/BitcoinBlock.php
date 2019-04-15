<?php

namespace Drupal\mhash\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
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
        


        $form = \Drupal::formBuilder()->getForm('Drupal\mhash\Form\BitcoinForm');
        $form['#image'] = $image_uri->getFileUri();
        return $form;
    }
  
}

