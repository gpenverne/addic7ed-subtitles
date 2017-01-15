<?php

namespace Gpenverne\Addic7edSubtitlesBundle;

use Gpenverne\Addic7edSubtitlesBundle\DependencyInjection\Addic7edSubtitlesExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class Addic7edSubtitlesBundle extends Bundle
{
    /**
     * @return Addic7edSubtitlesExtension
     */
    public function getContainerExtension()
    {
        return new Addic7edSubtitlesExtension();
    }
}
