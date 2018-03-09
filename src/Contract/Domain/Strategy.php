<?php

namespace PHPKitchen\Flow\Contract\Domain;

/**
 * Represents basic strategy.
 *
 * @author Dmitry Kolodko <prowwid@gmail.com>
 * @since 1.0
 */
interface Strategy {
    /**
     * Strategy body. This method implements strategy algorithm.
     *
     * @return mixed result of a strategy or void.
     *
     * @since 1.0
     */
    public function do();
}