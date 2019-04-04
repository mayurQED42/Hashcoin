<?php
namespace Drupal\mhash\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Serialization\Json;

/**
* Implements a simple form.
*/
class BitcoinForm extends FormBase {

  /**
  * Build the simple form.
  *
  * @param array $form
  *   Default form array structure.
  * @param FormStateInterface $form_state
  *   Object containing current form state.
  */
  public function buildForm(array $form, FormStateInterface $form_state) {

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
        '#ajax' => [
          'event' => 'keyup',
          'callback' => '::amountCallback',
          'wrapper'  => 'result_amount1',
          ],
        '#field_prefix' => '<div id="result_amount2">',
        '#field_suffix' => '</div>',
      ];  
    $form['EM2'] = [  
        '#type' => 'textfield',  
        '#placeholder' => t('Enter Amount'),
        '#ajax' => [
          'event' => 'keyup',
          'callback' => '::amountCallbacks',
          'wrapper'  => 'result_amount2',
          ],
        '#field_prefix' => '<div id="result_amount1">',
        '#field_suffix' => '</div>',
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

  //ajax callback method for EM1 value
  public function amountCallback(array &$form, FormStateInterface $form_state){
      $value = $form_state->getValue('EM1');
      $op1 = $form_state->getValue('type_options1');
      $op2 = $form_state->getValue('type_options2');
      $form['EM2']['#value'] = $value;
      
      return $form['EM2'];
    }  

  //ajax callback method for EM2 value
  public function amountCallbacks(array &$form, FormStateInterface $form_state){
      $value = $form_state->getValue('EM2');
      $op1 = $form_state->getValue('type_options1');
      $op2 = $form_state->getValue('type_options2');
      $form['EM1']['#value'] = $value;
    
      return $form['EM1'];
    }  

  /**
  * Getter method for Form ID.
  *
  * The form ID is used in implementations of hook_form_alter() to allow other
  * modules to alter the render array built by this form controller.  it must
  * be unique site wide. It normally starts with the providing module's name.
  *
  * @return string
  *   The unique ID of the form defined by this class.
  */
  public function getFormId() {
    return 'bitcoin_form';
  }

  
  /**
  * Implements a form submit handler.
  *
  * The submitForm method is the default method called for any submit elements.
  *
  * @param array $form
  *   The render array of the currently built form.
  * @param FormStateInterface $form_state
  *   Object describing the current state of the form.
  */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    /*
    * action taken after submit button
    */
  
  }

}