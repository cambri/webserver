<?php

namespace HynMe\Webserver\Contracts;

use HynMe\Framework\Contracts\BaseRepositoryContract;
use Laraflock\MultiTenant\Models\Hostname;

interface SslRepositoryContract extends BaseRepositoryContract
{
    /**
     * @param Hostname $hostname
     *
     * @return \HynMe\Webserver\Models\SslCertificate
     */
    public function findByHostname(Hostname $hostname);
}
