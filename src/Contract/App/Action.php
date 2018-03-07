<?php

namespace PHPKitchen\Flow\Contract\App;

/**
 * Represents application layer action.
 *
 * @author Dmitry Kolodko <prowwid@gmail.com>
 * @since 1.0
 */
interface Action {
    public function call();
}