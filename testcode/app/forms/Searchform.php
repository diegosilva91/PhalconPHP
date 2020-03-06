<?php
namespace  App\Forms;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;

class SearchForm extends Form{
    public function initialize(){
        $this->add(
            new Text('seachInput',[
                'class'   => 'col s12 m6 l6',
                'maxlength'   => 30,
                'required'=>'',
            ])
        );
    }
}