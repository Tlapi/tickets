<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class Article extends Form
{ 
    public function __construct(EntityManager $em) 
    { 
        parent::__construct('article');
        
        $this->setAttribute('method', 'post'); 
        
        $this->add(array( 
            'name' => 'main_title', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Type something...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Title', 
            ), 
        )); 
        
        $this->add(array( 
            'name' => 'main_description', 
            'type' => 'Zend\Form\Element\Textarea', 
            'attributes' => array( 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Description', 
            ), 
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Save',
                'id' => 'submitbutton',
            ),
        ));   
    } 
} 