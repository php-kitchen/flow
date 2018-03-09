<?php

namespace PHPKitchen\Flow\Domain;

use PHPKitchen\Flow\Contract;

/**
 * Represents implementation of a base domain use-case class.
 *
 * @author Dmitry Kolodko <prowwid@gmail.com>
 * @since 1.0
 */
abstract class UseCase extends Strategy implements Contract\Domain\UseCase {
}