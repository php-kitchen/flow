<?php

namespace PHPKitchen\Flow\Contract\Domain;

/**
 * Represents basic strategy.
 *
 * @author Dmitry Kolodko <prowwid@gmail.com>
 * @since 1.0
 */
interface Strategy {
    public function call();
}