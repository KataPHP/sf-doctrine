<?php
namespace AppBundle\StaticModel;

/**
 * Class OrderStatus
 *
 * @author Florent DESPIERRES <florent.despierres.ext@francetv.fr>
 */
final class OrderStatus
{
    /**
     * @const
     */
    const CREATED = 'created';

    /**
     * @const
     */
    const PAYED = 'payed';

    /**
     * @const
     */
    const COMPLETED = 'completed';
}
