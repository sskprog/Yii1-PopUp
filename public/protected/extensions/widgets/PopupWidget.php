<?php
class PopupWidget extends CWidget
{
    public $id;
    public function run()
    {
        $popup = Popup::model()->findByPk($this->id);
        if ((!$popup) || (!$popup->is_active)) {
            return false;
        }
        $popup->counter++;
        $popup->save();
        //var_dump($popup->counter); die;
        return $this->render('popup', ['popup' => $popup]);
    }
}
