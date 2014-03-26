<?php

namespace Wb\Bundle\BigRegisterBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Wb\Bundle\BigRegisterBundle\DependencyInjection\Compiler\BigRegisterCompilerPass;

class WbBigRegisterBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new BigRegisterCompilerPass());
    }

}
