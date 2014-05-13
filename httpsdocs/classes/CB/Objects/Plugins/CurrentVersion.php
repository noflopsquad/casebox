<?php

namespace CB\Objects\Plugins;

use CB\Objects;
use CB\Util;
use CB\User;

class CurrentVersion extends Base
{

    public function getData($id = false)
    {

        $rez = array(
            'success' => true
        );

        parent::getData($id);

        $o = Objects::getCachedObject($this->id);
        $data = $o->getData();

        $data['ago_text'] = Util\formatAgoTime($data['cdate']);
        $data['user'] = User::getDisplayName($data['oid'], true);
        $data['cls'] = 'sel';

        $rez['data'] = array($data);

        return $rez;
    }
}
