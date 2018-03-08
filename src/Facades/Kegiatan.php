<?php

namespace Bantenprov\Kegiatan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The Kegiatan facade.
 *
 * @package Bantenprov\Kegiatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class KegiatanFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'kegiatan';
    }
}
