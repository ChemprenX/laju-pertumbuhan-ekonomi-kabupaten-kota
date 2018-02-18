<?php namespace Bantenprov\LpeKabupatenKota\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The LpeKabupatenKota facade.
 *
 * @package Bantenprov\LpeKabupatenKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LpeKabupatenKota extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lpe-kabupaten-kota';
    }
}
