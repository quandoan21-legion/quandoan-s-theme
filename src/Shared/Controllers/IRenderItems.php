<?php

namespace Src\Shared\Controllers;

interface IRenderItems
{
    public function renderHtml(object $oThis, array $aNeededVal);
}
