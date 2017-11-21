<?php

namespace DieSchittigs\SttgsOpeningtimeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use DieSchittigs\SttgsOpeningtimeBundle\DependencyInjection\SttgsOpeningtimeExtension;

class SttgsOpeningtimeBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new SttgsOpeningtimeExtension();
    }
}
